<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\PointType\IndexPointType;
use App\Http\Requests\Admin\PointType\StorePointType;
use App\Http\Requests\Admin\PointType\UpdatePointType;
use App\Http\Requests\Admin\PointType\DestroyPointType;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\PointType;

class PointTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexPointType $request
     * @return Response|array
     */
    public function index(IndexPointType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PointType::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'type_name', 'notes'],

            // set columns to searchIn
            ['id', 'type_name', 'notes']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.point-type.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.point-type.create');

        return view('admin.point-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePointType $request
     * @return Response|array
     */
    public function store(StorePointType $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the PointType
        $pointType = PointType::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/point-types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/point-types');
    }

    /**
     * Display the specified resource.
     *
     * @param  PointType $pointType
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(PointType $pointType)
    {
        $this->authorize('admin.point-type.show', $pointType);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PointType $pointType
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(PointType $pointType)
    {
        $this->authorize('admin.point-type.edit', $pointType);

        return view('admin.point-type.edit', [
            'pointType' => $pointType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePointType $request
     * @param  PointType $pointType
     * @return Response|array
     */
    public function update(UpdatePointType $request, PointType $pointType)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values PointType
        $pointType->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/point-types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/point-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyPointType $request
     * @param  PointType $pointType
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyPointType $request, PointType $pointType)
    {
        $pointType->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
