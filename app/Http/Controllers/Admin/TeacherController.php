<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Teacher\IndexTeacher;
use App\Http\Requests\Admin\Teacher\StoreTeacher;
use App\Http\Requests\Admin\Teacher\UpdateTeacher;
use App\Http\Requests\Admin\Teacher\DestroyTeacher;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexTeacher $request
     * @return Response|array
     */
    public function index(IndexTeacher $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Teacher::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'username' , 'teacher_name', 'teacher_address', 'teacher_study', 'teacher_speciality', 'teacher_work', 'teacher_extras', 'teacher_note', 'teacher_mobile', 'teacher_phone', 'birthdate'],

            // set columns to searchIn
            ['id', 'username', 'teacher_name', 'teacher_address', 'teacher_study', 'teacher_speciality', 'teacher_work', 'teacher_extras', 'teacher_note', 'teacher_mobile', 'teacher_phone']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.teacher.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.teacher.create');

        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTeacher $request
     * @return Response|array
     */
    public function store(StoreTeacher $request)
    {
        // Sanitize input
        $sanitized = $request->validated();
        $checkUserName = Teacher::where(['username'=>$request->get('username')])->get()->toArray();
        if(sizeof($checkUserName) > 0)
            return ['code'      =>  422, 'Status Code' => '422' , 'message' => 'Duplicate username', "errors" => ["username"=>["The username in used."]] ];
        else{
            $sanitized['password'] = Hash::make($sanitized['password']);
            $teacher = Teacher::create($sanitized);
            if ($request->ajax()) {
                return ['redirect' => url('admin/teachers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
            }

            return redirect('admin/teachers');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Teacher $teacher
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Teacher $teacher)
    {
        $this->authorize('admin.teacher.show', $teacher);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Teacher $teacher
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Teacher $teacher)
    {
        $this->authorize('admin.teacher.edit', $teacher);

        return view('admin.teacher.edit', [
            'teacher' => $teacher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTeacher $request
     * @param  Teacher $teacher
     * @return Response|array
     */
    public function update(UpdateTeacher $request, Teacher $teacher)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Teacher
        $teacher->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/teachers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/teachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyTeacher $request
     * @param  Teacher $teacher
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyTeacher $request, Teacher $teacher)
    {
        $teacher->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
