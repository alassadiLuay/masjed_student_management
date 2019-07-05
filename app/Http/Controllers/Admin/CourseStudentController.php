<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\CourseStudent\IndexCourseStudent;
use App\Http\Requests\Admin\CourseStudent\StoreCourseStudent;
use App\Http\Requests\Admin\CourseStudent\UpdateCourseStudent;
use App\Http\Requests\Admin\CourseStudent\DestroyCourseStudent;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\CourseStudent;
use App\Models\Course;
use App\Models\Semester;
use App\Models\StudentClass;
use App\Models\Student;

class CourseStudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexCourseStudent $request
     * @return Response|array
     */
    public function index(IndexCourseStudent $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CourseStudent::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'teachers.teacher_name' , 'courses.course_name' , 'semesters.semester_name' , 'courses.enabled' , 'students.student_fname','students.student_lname' , 'students.father_phone' , 'student_classes.class_name'],

            // set columns to searchIn
            ['id', 'teachers.teacher_name' , 'courses.course_name' , 'semesters.semester_name' , 'courses.enabled' , 'students.student_fname','students.student_lname' , 'students.father_phone' , 'student_classes.class_name'],
            // With Semesters / Courses / teachers / Students / Classes
            function($query) use ($request){
                $query->join('courses','courses.id', '=', 'course_id')
                      ->leftJoin('teacher_courses','teacher_courses.course_id', '=', 'courses.id')    
                      ->leftJoin('teachers','teachers.id', '=', 'teacher_courses.teacher_id')  
                      ->join('semesters','semesters.id', '=', 'courses.semester_id')
                      ->join('student_classes','student_classes.id', '=', 'class_id')
                      ->join('students','students.id', '=', 'student_id')
                ->get();
            }
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.course-student.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {   
        $this->authorize('admin.course-student.create');
        $semesters = Semester::get();
        $classes = StudentClass::get();
        $students = Student::get();
        return view('admin.course-student.create',compact('semesters','classes','students'));
    }

    /**
     * Show the form for creating a new list of resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    
    public function createMulti()
    {
        $this->authorize('admin.course-student.create');
        $semesters = Semester::get();
        $classes = StudentClass::get();
        $students = Student::get();
        return view('admin.course-student.create-multi',compact('semesters','classes','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCourseStudent $request
     * @return Response|array
     */
    public function store(StoreCourseStudent $request)
    {
        // Sanitize input
        $courseStd['course_id']  = $request->get('course_id');
        $courseStd['class_id']   = $request->get('class_id');
        $courseStd['student_id'] = $request->get('student_id')['id'];
        $courseStd['note']   = $request->get('note');
        $exist = CourseStudent::where(['student_id'=>$courseStd['student_id'],'course_id'=>$courseStd['course_id']])->get()->toArray();
        //$sanitized = $request->validated();

        // Check If Student Already Assigned 
        if(sizeof($exist) == 0)
            // Store the CourseStudent
            $courseStudent = CourseStudent::create($courseStd);

        if ($request->ajax()) {
            return ['redirect' => url('admin/course-students'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/course-students');
    }

    public function storeMulti(StoreCourseStudent $request)
    {
        $data = $request->get('student_id');
        
        $courseStd['course_id']  = $request->get('course_id');
        $courseStd['class_id']   = $request->get('class_id');
        for ($i=0; $i < sizeof($data); $i++) { 
            # code...
            info($data[$i]);

            $courseStd['student_id'] = $data[$i]['id'];
            $exist = CourseStudent::where(['student_id'=>$courseStd['student_id'],'course_id'=>$courseStd['course_id']])->get()->toArray();
            // Check If Student Already Assigned 
            if(sizeof($exist) == 0)
                // Store the CourseStudent
                CourseStudent::create($courseStd);
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/course-students'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/course-students');
    }

    /**
     * Display the specified resource.
     *
     * @param  CourseStudent $courseStudent
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(CourseStudent $courseStudent)
    {
        $this->authorize('admin.course-student.show', $courseStudent);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CourseStudent $courseStudent
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(CourseStudent $courseStudent)
    {
        $this->authorize('admin.course-student.edit', $courseStudent);
        $semesters = Semester::get();
        $selected_semester = CourseStudent::with('courseDetails')->get();
        $semester_id = $selected_semester[0]->courseDetails->semester_id;
        //echo $semester_id;
        /*var_dump($selected_semester[0]->courseDetails->semester_id);
        die();*/
        $classes = StudentClass::get();
        $students = Student::get();
        return view('admin.course-student.edit', [
            'courseStudent' => $courseStudent,
            'semesters' => $semesters,
            'classes' => $classes,
            'students' => $students,
            'semester_id' => $semester_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCourseStudent $request
     * @param  CourseStudent $courseStudent
     * @return Response|array
     */
    public function update(UpdateCourseStudent $request, CourseStudent $courseStudent)
    {
        // Sanitize input
        $courseStd['course_id']  = $request->get('course_id');
        $courseStd['class_id']   = $request->get('class_id');
        $courseStd['student_id'] = $request->get('student_id');
        $courseStd['note']   = $request->get('note');
        //$courseStudent = CourseStudent::create($courseStd);

        //$sanitized = $request->validated();

        // Update changed values CourseStudent
        $courseStudent->update($courseStd);

        if ($request->ajax()) {
            return ['redirect' => url('admin/course-students'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/course-students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyCourseStudent $request
     * @param  CourseStudent $courseStudent
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyCourseStudent $request, CourseStudent $courseStudent)
    {
        $courseStudent->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
