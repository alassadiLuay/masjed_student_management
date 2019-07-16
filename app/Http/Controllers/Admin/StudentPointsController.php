<?php namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\StudentPoint\IndexStudentPoint;
use App\Http\Requests\Admin\StudentPoint\StoreStudentPoint;
use App\Http\Requests\Admin\StudentPoint\UpdateStudentPoint;
use App\Http\Requests\Admin\StudentPoint\DestroyStudentPoint;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\StudentPoint;
use App\Models\Semester;

class StudentPointsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexStudentPoint $request
     * @return Response|array
     */
    public function index(IndexStudentPoint $request)
    {
        // create and AdminListing instance for a specific model and
        //DB::enableQueryLog();

        $data = AdminListing::create(StudentPoint::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'teachers.teacher_name', 'courses.course_name' , 'semesters.semester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone','point_types.type_name','point_configs.point_name','point_configs.point_value','created_at'],

            // set columns to searchIn
            ['teachers.teacher_name','courses.course_name' , 'semesters.semester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone','point_types.type_name','point_configs.point_name','point_configs.point_value','created_at']
            ,
            function($query) use ($request){
                    // Point Tables
                $query->join('point_configs','point_configs.id','=','point_id')
                      ->join('point_types','point_types.id','=','point_type_id')
                    // Student Info Tables
                      ->join('course_students','course_students.id', '=', 'student_points.student_id')
                      ->join('students','students.id', '=', 'course_students.student_id')
                    // Course Info Tables  
                      ->join('courses','courses.id', '=', 'course_students.course_id')
                    // Teacher Info Tables   
                      ->leftJoin('teacher_courses','teacher_courses.course_id', '=', 'courses.id')    
                      ->leftJoin('teachers','teachers.id', '=', 'teacher_courses.teacher_id') 
                    // Semester Info Tables     
                      ->join('semesters','semesters.id', '=', 'courses.semester_id')
                      ->orderBy('student_points.id','desc')
                ->get();
            }
        );

/*
            # your laravel query builder goes here

            $laQuery = DB::getQueryLog();

            $lcWhatYouWant = $laQuery[0]['query']; # <-------

            var_dump($lcWhatYouWant);


            # optionally disable the query log:
            DB::disableQueryLog();
            die();*/
        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.student-point.index', ['data' => $data]);

    }

    public function report(){
        return view('admin.student-point.report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.student-point.create');
        $semesters    = Semester::where('enabled',true)->get();
        return view('admin.student-point.create',compact('semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStudentPoint $request
     * @return Response|array
     */
    public function store(StoreStudentPoint $request)
    {
        // Sanitize input
        //$sanitized = $request->validated();
        $student_ids = $request->get('student_id');
        $point_ids = $request->get('point_id');
        for ($i=0; $i < sizeof($student_ids); $i++) { 
            # code...
            for ($j=0; $j < sizeof($point_ids); $j++) { 
                $pointObject['student_id'] = $student_ids[$i]['s_id'];
                $pointObject['point_id']   = $point_ids[$j]['id'];
                
                $studentPoint = StudentPoint::create($pointObject);
            }
        }
        // Store the StudentPoint
        //$studentPoint = StudentPoint::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-points'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-points');
    }

    /**
     * Display the specified resource.
     *
     * @param  StudentPoint $studentPoint
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(StudentPoint $studentPoint)
    {
        $this->authorize('admin.student-point.show', $studentPoint);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StudentPoint $studentPoint
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(StudentPoint $studentPoint)
    {
        $this->authorize('admin.student-point.edit', $studentPoint);

        $course_name = DB::table('course_students')->join('courses','courses.id','=','course_id')->where(['course_students.id'=>$studentPoint->student_id])->get()->toArray()[0];
        //var_dump(expression)
        $semester_name = DB::table('courses')->join('semesters','semesters.id','=','semester_id')->where(['courses.id'=>$course_name->id])->get()->toArray()[0];
        $student = DB::table('students')->where(['id'=>$course_name->student_id])->get()->toArray()[0];

        return view('admin.student-point.edit', [
            'studentPoint' => $studentPoint,
            'semester_name' => $semester_name->semester_name,
            'student_name' => $student->student_fname.' '.$student->student_lname,
            'course_name' => $course_name->course_name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStudentPoint $request
     * @param  StudentPoint $studentPoint
     * @return Response|array
     */
    public function update(UpdateStudentPoint $request, StudentPoint $studentPoint)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values StudentPoint
        $studentPoint->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-points'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-points');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyStudentPoint $request
     * @param  StudentPoint $studentPoint
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyStudentPoint $request, StudentPoint $studentPoint)
    {
        $studentPoint->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
