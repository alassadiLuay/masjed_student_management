<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\PointConfig\IndexPointConfig;
use App\Http\Requests\Admin\PointConfig\StorePointConfig;
use App\Http\Requests\Admin\PointConfig\UpdatePointConfig;
use App\Http\Requests\Admin\PointConfig\DestroyPointConfig;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\PointConfig;
use App\Models\PointType;


class PointConfigsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexPointConfig $request
     * @return Response|array
     */
    public function index(IndexPointConfig $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PointConfig::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'point_type_id', 'point_types.type_name', 'point_name', 'point_value', 'notes'],

            // set columns to searchIn
            ['id', 'point_name','point_types.type_name',  'point_value', 'notes'],

            function($query) use ($request){
                $query->join('point_types','point_types.id', '=', 'point_type_id')->get();
            }

        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.point-config.index', ['data' => $data]);

    }

    public function point_json(IndexPointConfig $request)
    {
            // pass the request with params
        $pointType = PointConfig::with('pointType')->get();
        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded') , 'data' => $pointType]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.point-config.create');
        $point_types = PointType::get();
        return view('admin.point-config.create',compact('point_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePointConfig $request
     * @return Response|array
     */
    public function store(StorePointConfig $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        $pointConfig = PointConfig::create($sanitized);
        // Store the PointConfig

        if ($request->ajax()) {
            return ['redirect' => url('admin/point-configs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/point-configs');
    }

    /**
     * Display the specified resource.
     *
     * @param  PointConfig $pointConfig
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(PointConfig $pointConfig)
    {
        $this->authorize('admin.point-config.show', $pointConfig);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PointConfig $pointConfig
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(PointConfig $pointConfig)
    {
        $this->authorize('admin.point-config.edit', $pointConfig);
        $point_types = PointType::get();
        return view('admin.point-config.edit', [
            'pointConfig' => $pointConfig,
            'point_types' => $point_types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePointConfig $request
     * @param  PointConfig $pointConfig
     * @return Response|array
     */
    public function update(UpdatePointConfig $request, PointConfig $pointConfig)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values PointConfig
        $pointConfig->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/point-configs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/point-configs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyPointConfig $request
     * @param  PointConfig $pointConfig
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyPointConfig $request, PointConfig $pointConfig)
    {
        $pointConfig->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
