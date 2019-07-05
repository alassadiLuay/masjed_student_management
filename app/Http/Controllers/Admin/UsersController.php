<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\admin_users\Indexadmin_users;
use App\Http\Requests\Admin\admin_users\Storeadmin_users;
use App\Http\Requests\Admin\admin_users\Updateadmin_users;
use App\Http\Requests\Admin\admin_users\Destroyadmin_users;
use Brackets\AdminListing\Facades\AdminListing;
use App\admin_users;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  Indexadmin_users $request
     * @return Response|array
     */
    public function index(Indexadmin_users $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(admin_users::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['first_name','last_name', 'email'],

            // set columns to searchIn
            ['first_name','last_name', 'email']
        );

        if ($request->ajax()) {
            return ['data' => $data, 'activation' => Config::get('admin-auth.activation_enabled')];
        }

        return view('admin.admin-user.index', ['data' => $data, 'activation' => Config::get('admin-auth.activation_enabled')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.admin-user.create');

        return view('admin.admin-user.create',[
            'activation' => Config::get('admin-auth.activation_enabled'),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Storeadmin_users $request
     * @return Response|array
     */
    public function store(Storeadmin_users $request)
    {
        // Sanitize input
        $sanitized = $request->getModifiedData();

        // Store the admin_users
        $admin_user = admin_users::create($sanitized);

        // But we do have a roles, so we need to attach the roles to the admin_user
        $admin_user->roles()->sync(collect($request->input('roles', []))->map->id->toArray());

        if ($request->ajax()) {
            return ['redirect' => url('admin/admin_users'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/admin_users');
    }

    /**
     * Display the specified resource.
     *
     * @param  admin_users $admin_user
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(admin_users $admin_user)
    {
        $this->authorize('admin.admin-user.show', $admin_user);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  admin_users $admin_user
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(admin_users $admin_user)
    {
        $this->authorize('admin.admin-user.edit', $admin_user);

        $admin_user->load('roles');

        return view('admin.admin-user.edit', [
            'admin_user' => $admin_user,
            'activation' => Config::get('admin-auth.activation_enabled'),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Updateadmin_users $request
     * @param  admin_users $admin_user
     * @return Response|array
     */
    public function update(Updateadmin_users $request, admin_users $admin_user)
    {
        // Sanitize input
        $sanitized = $request->getModifiedData();

        // Update changed values admin_users
        $admin_user->update($sanitized);

        // But we do have a roles, so we need to attach the roles to the admin_user
        if($request->input('roles')) {
            $admin_user->roles()->sync(collect($request->input('roles', []))->map->id->toArray());
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/admin_users'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/admin_users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Destroyadmin_users $request
     * @param  admin_users $admin_user
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(Destroyadmin_users $request, admin_users $admin_user)
    {
        $admin_user->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    
    
}
