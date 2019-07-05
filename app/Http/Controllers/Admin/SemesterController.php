<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Semester\IndexSemester;
use App\Http\Requests\Admin\Semester\StoreSemester;
use App\Http\Requests\Admin\Semester\UpdateSemester;
use App\Http\Requests\Admin\Semester\DestroySemester;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Semester;

class SemesterController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexSemester $request
     * @return Response|array
     */
    public function index(IndexSemester $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Semester::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'semester_name', 'started_at', 'end_at', 'enabled'],

            // set columns to searchIn
            ['id', 'semester_name', 'description']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.semester.index', ['data' => $data]);

    }

    public function all(IndexSemester $request)
    {
        # code...
        $semesters = Semester::get();
        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded') , 'data' => $semesters]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.semester.create');

        return view('admin.semester.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSemester $request
     * @return Response|array
     */
    public function store(StoreSemester $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Semester
        $semester = Semester::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/semesters'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/semesters');
    }

    /**
     * Display the specified resource.
     *
     * @param  Semester $semester
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Semester $semester)
    {
        $this->authorize('admin.semester.show', $semester);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Semester $semester
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Semester $semester)
    {
        $this->authorize('admin.semester.edit', $semester);

        return view('admin.semester.edit', [
            'semester' => $semester,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSemester $request
     * @param  Semester $semester
     * @return Response|array
     */
    public function update(UpdateSemester $request, Semester $semester)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Semester
        $semester->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/semesters'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/semesters');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroySemester $request
     * @param  Semester $semester
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroySemester $request, Semester $semester)
    {
        $semester->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
