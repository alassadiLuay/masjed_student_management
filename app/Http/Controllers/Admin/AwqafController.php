<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Awqaf\IndexAwqaf;
use App\Http\Requests\Admin\Awqaf\StoreAwqaf;
use App\Http\Requests\Admin\Awqaf\UpdateAwqaf;
use App\Http\Requests\Admin\Awqaf\DestroyAwqaf;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Awqaf;

class AwqafController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexAwqaf $request
     * @return Response|array
     */
    public function index(IndexAwqaf $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Awqaf::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'test_name', 'date', 'place'],

            // set columns to searchIn
            ['id', 'date', 'place']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.awqaf.index', ['data' => $data]);

    }

    public function awqaf_json(IndexAwqaf $request)
    {
        # code...
        $awqaf = Awqaf::get();
        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded') , 'data' => $awqaf]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.awqaf.create');

        return view('admin.awqaf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAwqaf $request
     * @return Response|array
     */
    public function store(StoreAwqaf $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Awqaf
        $awqaf = Awqaf::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/awqafs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/awqafs');
    }

    /**
     * Display the specified resource.
     *
     * @param  Awqaf $awqaf
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Awqaf $awqaf)
    {
        $this->authorize('admin.awqaf.show', $awqaf);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Awqaf $awqaf
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Awqaf $awqaf)
    {
        $this->authorize('admin.awqaf.edit', $awqaf);

        return view('admin.awqaf.edit', [
            'awqaf' => $awqaf,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAwqaf $request
     * @param  Awqaf $awqaf
     * @return Response|array
     */
    public function update(UpdateAwqaf $request, Awqaf $awqaf)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Awqaf
        $awqaf->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/awqafs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/awqafs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyAwqaf $request
     * @param  Awqaf $awqaf
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyAwqaf $request, Awqaf $awqaf)
    {
        $awqaf->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
