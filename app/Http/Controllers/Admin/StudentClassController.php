<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\StudentClass\IndexStudentClass;
use App\Http\Requests\Admin\StudentClass\StoreStudentClass;
use App\Http\Requests\Admin\StudentClass\UpdateStudentClass;
use App\Http\Requests\Admin\StudentClass\DestroyStudentClass;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\StudentClass;

class StudentClassController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexStudentClass $request
     * @return Response|array
     */
    public function index(IndexStudentClass $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(StudentClass::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [   'id', 
                 'class_name'],

            // set columns to searchIn
            [    'id',
                 'class_name']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.student-class.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.student-class.create');

        return view('admin.student-class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStudentClass $request
     * @return Response|array
     */
    public function store(StoreStudentClass $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the StudentClass
        $studentClass = StudentClass::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-classes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-classes');
    }

    /**
     * Display the specified resource.
     *
     * @param  StudentClass $studentClass
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(StudentClass $studentClass)
    {
        $this->authorize('admin.student-class.show', $studentClass);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StudentClass $studentClass
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(StudentClass $studentClass)
    {
        $this->authorize('admin.student-class.edit', $studentClass);

        return view('admin.student-class.edit', [
            'studentClass' => $studentClass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStudentClass $request
     * @param  StudentClass $studentClass
     * @return Response|array
     */
    public function update(UpdateStudentClass $request, StudentClass $studentClass)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values StudentClass
        $studentClass->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-classes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-classes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyStudentClass $request
     * @param  StudentClass $studentClass
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyStudentClass $request, StudentClass $studentClass)
    {
        $studentClass->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
