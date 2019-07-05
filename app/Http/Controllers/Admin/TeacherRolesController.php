<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\TeacherRole\IndexTeacherRole;
use App\Http\Requests\Admin\TeacherRole\StoreTeacherRole;
use App\Http\Requests\Admin\TeacherRole\UpdateTeacherRole;
use App\Http\Requests\Admin\TeacherRole\DestroyTeacherRole;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\TeacherRole;

class TeacherRolesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexTeacherRole $request
     * @return Response|array
     */
    public function index(IndexTeacherRole $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TeacherRole::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'role_name', 'notes'],

            // set columns to searchIn
            ['id', 'role_name', 'notes']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.teacher-role.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.teacher-role.create');

        return view('admin.teacher-role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTeacherRole $request
     * @return Response|array
     */
    public function store(StoreTeacherRole $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the TeacherRole
        $teacherRole = TeacherRole::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/teacher-roles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/teacher-roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  TeacherRole $teacherRole
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(TeacherRole $teacherRole)
    {
        $this->authorize('admin.teacher-role.show', $teacherRole);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  TeacherRole $teacherRole
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(TeacherRole $teacherRole)
    {
        $this->authorize('admin.teacher-role.edit', $teacherRole);

        return view('admin.teacher-role.edit', [
            'teacherRole' => $teacherRole,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTeacherRole $request
     * @param  TeacherRole $teacherRole
     * @return Response|array
     */
    public function update(UpdateTeacherRole $request, TeacherRole $teacherRole)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values TeacherRole
        $teacherRole->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/teacher-roles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/teacher-roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyTeacherRole $request
     * @param  TeacherRole $teacherRole
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyTeacherRole $request, TeacherRole $teacherRole)
    {
        $teacherRole->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
