<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\TeacherCourse\IndexTeacherCourse;
use App\Http\Requests\Admin\TeacherCourse\StoreTeacherCourse;
use App\Http\Requests\Admin\TeacherCourse\UpdateTeacherCourse;
use App\Http\Requests\Admin\TeacherCourse\DestroyTeacherCourse;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\TeacherCourse;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Semester;

class TeacherCourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexTeacherCourse $request
     * @return Response|array
     */
    public function index(IndexTeacherCourse $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TeacherCourse::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'teacher_id', 'course_id' , 'teachers.teacher_name' , 'teachers.teacher_mobile' , 'courses.course_name' , 'courses.semester_id' , 'semesters.semester_name' , 'courses.enabled' ],

            // set columns to searchIn
            ['id' , 'teachers.teacher_name' , 'teachers.teacher_mobile' , 'courses.course_name' , 'semesters.semester_name'],
            // With Semesters / Courses / teachers
            function($query) use ($request){
                $query->join('teachers','teachers.id', '=', 'teacher_id')
                      ->join('courses','courses.id', '=', 'course_id')
                      ->join('semesters','semesters.id', '=', 'semester_id')
                ->get();
            }
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.teacher-course.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.teacher-course.create');
        $semesters = Semester::get();
        $teachers = Teacher::get();
        return view('admin.teacher-course.create',compact('semesters','teachers'));
    }

     /**
     * Get the related courses to specifi semester by Ajax
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function semester_courses(Request $request)
    {
        $this->authorize('admin.teacher-course.create');
        $courses = Course::where(["semester_id"=>$request->get('semester_id')])->get();
        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded') , 'data' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTeacherCourse $request
     * @return Response|array
     */
    public function store(StoreTeacherCourse $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the TeacherCourse
        $teacherCourse = TeacherCourse::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/teacher-courses'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/teacher-courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  TeacherCourse $teacherCourse
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(TeacherCourse $teacherCourse)
    {
        $this->authorize('admin.teacher-course.show', $teacherCourse);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  TeacherCourse $teacherCourse
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(TeacherCourse $teacherCourse)
    {
        $this->authorize('admin.teacher-course.edit', $teacherCourse);
        $semesters = Semester::get();
        $teachers = Teacher::get();
        $selected_semester = TeacherCourse::with('course')->where(['teacher_courses.id'=>$teacherCourse->id])->get();
        $semester_id = $selected_semester[0]->course->semester_id;
        $courses = Course::where(['semester_id'=>$semester_id])->get();
/*        echo $selected_semester[0]->course->semester_id;
        echo $semesters->toArray()[0]['id'];
        die();*/
        return view('admin.teacher-course.edit', [
            'teacherCourse' => $teacherCourse,
            'semester_id' => $semester_id,
            'semesters' => $semesters,
            'teachers' => $teachers,
            'courses'=>$courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTeacherCourse $request
     * @param  TeacherCourse $teacherCourse
     * @return Response|array
     */
    public function update(UpdateTeacherCourse $request, TeacherCourse $teacherCourse)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values TeacherCourse
        $teacherCourse->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/teacher-courses'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/teacher-courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyTeacherCourse $request
     * @param  TeacherCourse $teacherCourse
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyTeacherCourse $request, TeacherCourse $teacherCourse)
    {
        $teacherCourse->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
