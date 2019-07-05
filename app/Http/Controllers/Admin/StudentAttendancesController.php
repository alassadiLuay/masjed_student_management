<?php namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\StudentAttendance\IndexStudentAttendance;
use App\Http\Requests\Admin\StudentAttendance\StoreStudentAttendance;
use App\Http\Requests\Admin\StudentAttendance\UpdateStudentAttendance;
use App\Http\Requests\Admin\StudentAttendance\DestroyStudentAttendance;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\StudentAttendance;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

class StudentAttendancesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexStudentAttendance $request
     * @return Response|array
     */
    public function index(IndexStudentAttendance $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(StudentAttendance::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'courses.course_name' , 'semesters.semester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone','is_late','created_at'],

            // set columns to searchIn
            ['courses.course_name' , 'semesters.semester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone','is_late','created_at']
            ,
            function($query) use ($request){
                    // Student Info Tables
                $query->join('course_students','course_students.id', '=', 'student_course_id')
                      ->join('students','students.id', '=', 'course_students.student_id')
                    // Course Info Tables  
                      ->join('courses','courses.id', '=', 'course_students.course_id')
                    // Semester Info Tables     
                      ->join('semesters','semesters.id', '=', 'courses.semester_id')
                ->get();
            }
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.student-attendance.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.student-attendance.create');
        $semesters    = Semester::where('enabled',true)->get();
        return view('admin.student-attendance.create',compact('semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStudentAttendance $request
     * @return Response|array
     */
    public function store(StoreStudentAttendance $request)
    {
        // Sanitize input
        //$sanitized = $request->validated();        
        $student_id = $request->get('student_id');

        $Obj['student_id'] = $student_id['id'];
        $Obj['student_course_id'] = $student_id['s_id'];
        $Obj['is_late'] = $request->get('is_late');
        $Obj['created_at'] = $request->get('created_at');

        // Store the StudentAttendance
        $studentAttendance = StudentAttendance::create($Obj);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-attendances'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-attendances');
    }

    /**
     * Display the specified resource.
     *
     * @param  StudentAttendance $studentAttendance
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(StudentAttendance $studentAttendance)
    {
        $this->authorize('admin.student-attendance.show', $studentAttendance);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StudentAttendance $studentAttendance
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(StudentAttendance $studentAttendance)
    {
        $this->authorize('admin.student-attendance.edit', $studentAttendance);
        $course_name = DB::table('course_students')->join('courses','courses.id','=','course_id')->where(['course_students.id'=>$studentAttendance->student_course_id])->get()->toArray()[0];
        //var_dump(expression)
        $semester_name = DB::table('courses')->join('semesters','semesters.id','=','semester_id')->where(['courses.id'=>$course_name->id])->get()->toArray()[0];
        $student = DB::table('students')->where(['id'=>$studentAttendance->student_id])->get()->toArray()[0];
        return view('admin.student-attendance.edit', [
            'studentAttendance' => $studentAttendance,
            'semester_name' => $semester_name->semester_name,
            'student_name' => $student->student_fname.' '.$student->student_lname,
            'course_name' => $course_name->course_name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStudentAttendance $request
     * @param  StudentAttendance $studentAttendance
     * @return Response|array
     */
    public function update(UpdateStudentAttendance $request, StudentAttendance $studentAttendance)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values StudentAttendance
        $studentAttendance->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-attendances'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-attendances');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyStudentAttendance $request
     * @param  StudentAttendance $studentAttendance
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyStudentAttendance $request, StudentAttendance $studentAttendance)
    {
        $studentAttendance->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    public function today_absance_report(IndexStudentAttendance $request){
        $originalDate = Date("d-m-Y");
        $newDate = date("d-m-Y", strtotime($originalDate));

        $course_id = $request->get('course_id');
        $created_at = $request->get('created_at');
        
        $whereCond = ["courses.enabled"=>true];
        if($course_id)
            $whereCond = ["courses.id"=>$course_id];
        if($created_at)
            $newDate = date("d-m-Y", strtotime($created_at));

        //DB::enableQueryLog();
        $data = AdminListing::create(Student::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'courses.course_name' , 'semesters.semester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone'],

            // set columns to searchIn
            ['courses.course_name' , 'semesters.semester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone']
            ,
            function($query) use ($request,$newDate,$whereCond){
                    // Student Info Tables
                $query->join('course_students','course_students.student_id', '=', 'students.id')
                    // Course Info Tables  
                      ->join('courses','courses.id', '=', 'course_students.course_id')
                    // Semester Info Tables     
                      ->join('semesters','semesters.id', '=', 'courses.semester_id')
                      ->where($whereCond)
                      ->whereNotIn('students.id', function($q) use ($newDate){
                                $q->select('student_attendances.student_id')->from('student_attendances')
                                  ->whereRaw("DATE_FORMAT(student_attendances.created_at, '%d-%m-%Y') = '".$newDate."'");
                        })
                ->get();
            }
        );

        
        /*dd(DB::getQueryLog());
        die();*/
        $semesters    = Semester::get();
        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.student-attendance.whatsapp_index', ['data' => $data ,'attend'=>0, 'semesters' => $semesters,'course_id'=>$course_id,'date'=>$newDate]);
    }

        public function today_attend_report(IndexStudentAttendance $request){
        $originalDate = Date("d-m-Y");
        $newDate = date("d-m-Y", strtotime($originalDate));
        
        $course_id = $request->get('course_id');
        $created_at = $request->get('created_at');
        
        $whereCond = ["courses.enabled"=>true];
        if($course_id)
            $whereCond = ["courses.id"=>$course_id];
        if($created_at)
            $newDate = date("d-m-Y", strtotime($created_at));
        //DB::enableQueryLog();
        $data = AdminListing::create(Student::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'courses.course_name' , 'semesters.semester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone' , 'student_attendances.created_at'],

            // set columns to searchIn
            ['courses.course_name' , 'semesters.semester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone', 'student_attendances.created_at']
            ,
            function($query) use ($request,$newDate,$whereCond){
                    // Student Info Tables
                $query->join('course_students','course_students.student_id', '=', 'students.id')
                    // Course Info Tables  
                      ->join('courses','courses.id', '=', 'course_students.course_id')
                    // Semester Info Tables     
                      ->join('semesters','semesters.id', '=', 'courses.semester_id')
                    //Student Attend
                      ->join('student_attendances','student_attendances.student_id','=','students.id')  
                      ->where($whereCond)
                      ->whereRaw("DATE_FORMAT(student_attendances.created_at, '%d-%m-%Y') = '".$newDate."'")
                ->get();
            }
        );

        
        //dd(DB::getQueryLog());
        //die();
        $semesters    = Semester::get();
        if ($request->ajax()) {
            return ['data' => $data ];
        }

        return view('admin.student-attendance.whatsapp_index', ['data' => $data, 'attend'=>1, 'semesters' => $semesters, 'course_id'=>$course_id,'date'=>$newDate]);
    }

    public function send_whatsapp_messages(IndexStudentAttendance $request){
      $originalDate = Date("d-m-Y");
      $newDate = date("d-m-Y", strtotime($originalDate));
      
      $course_id = $request->get('course_id');
      $created_at = $request->get('created_at');
      $attend     = $request->get('attend');

      $whereCond = ["courses.enabled"=>true];
      if($course_id)
          $whereCond = ["courses.id"=>$course_id];
      if($created_at)
          $newDate = date("d-m-Y", strtotime($created_at));
      if($attend)  
        $report_data = DB::table('students')->join('course_students','course_students.student_id', '=', 'students.id')
                    // Course Info Tables  
                      ->join('courses','courses.id', '=', 'course_students.course_id')
                    // Semester Info Tables     
                      ->join('semesters','semesters.id', '=', 'courses.semester_id')
                    //Student Attend
                      ->join('student_attendances','student_attendances.student_id','=','students.id')  
                      ->where($whereCond)
                      ->whereRaw("DATE_FORMAT(student_attendances.created_at, '%d-%m-%Y') = '".$newDate."'")
                ->get()->toArray();
      else
        $report_data = DB::table('students')->join('course_students','course_students.student_id', '=', 'students.id')
                    // Course Info Tables  
                      ->join('courses','courses.id', '=', 'course_students.course_id')
                    // Semester Info Tables     
                      ->join('semesters','semesters.id', '=', 'courses.semester_id')
                      ->where($whereCond)
                      ->whereNotIn('students.id', function($q) use ($newDate){
                                $q->select('student_attendances.student_id')->from('student_attendances')
                                  ->whereRaw("DATE_FORMAT(student_attendances.created_at, '%d-%m-%Y') = '".$newDate."'");
                        })
                ->get();        
      $resultOfSending = [];
      for ($i=0; $i < sizeof($report_data); $i++) { 
        # code...
        $item = $report_data[$i];
        if(!$attend){
            $message = "السلام عليكم ورحمة الله وبركاته \n";
            $message .= " لم يحضر الطالب  ".$item->student_fname ." ".$item->student_lname." \n";
            $message .= "تاريخ ".$newDate." \n";
            $message .= " إدارة مسجد بدر \n";
          }
        else{
            $message = "السلام عليكم ورحمة الله وبركاته \n";
            $message .= "نود إعلامكم بحضور الطالب ".$item->student_fname ." ".$item->student_lname." \n";
            $message .= "تاريخ ".$newDate." \n";
            $message .= "إدارة مسجد بدر  ";
        }
        $number1 = $item->father_phone;
        $number2 = $item->student_phone;
        if( isset($number1) || isset($number2) ){
          if(strlen($number1) > 8 && !$this->startsWith($number1,'011') ){
              $this->wassenger_send_message($message,$number1);
              $resultOfSending[] = array('student_name' => $item->student_fname ." ".$item->student_lname , 'status_id'=> 200, 'sent' => $number1, 'status' => 'نجح الإرسال');
          }
          else if (!$this->startsWith($number2,'011') && strlen($number2)> 8){
              $this->wassenger_send_message($message,$number2);
              $resultOfSending[] = array('student_name' => $item->student_fname ." ".$item->student_lname , 'status_id'=> 200, 'sent' => $number2, 'status' => 'نجح الإرسال');
          }
          else
              $resultOfSending[] = array('student_name' => $item->student_fname ." ".$item->student_lname , 'status_id'=> 500, 'f_sent' => array($number1,$number2) , 'status' => 'فشل الإرسال'); 
        }
        else
              $resultOfSending[] = array('student_name' => $item->student_fname ." ".$item->student_lname , 'status_id'=> 500, 'f_sent' => array($number1,$number2) , 'status' => 'فشل الإرسال'); 
      }          
      Session::flash('whats_app_message_report',$resultOfSending);

      if($attend)
        return redirect('admin/student-attendances/today_attend_report');
      else
        return redirect('admin/student-attendances/today_absance_report');
    }

    function wassenger_send_message($message,$phone){
    // create a new cURL resource
      $ch = curl_init();
      if(!$this->startsWith($phone,'+963') && $this->startsWith($phone,'09'))
        $phone = '+963'.substr($phone, 1);
      else if (!$this->startsWith($phone,'+963') && $this->startsWith($phone,'9'))
        $phone = '+963'.$phone;
      // set URL and other appropriate options
        echo "http://manartiapp.com/test.php?phone=".$phone."&message=".$message."&password=123987456HHE";
      curl_setopt($ch, CURLOPT_URL, "http://manartiapp.com/test.php?phone=".urlencode(utf8_encode($phone))."&message=".urlencode(utf8_encode($message))."&password=123987456HHE");
      curl_setopt($ch, CURLOPT_HEADER, 0);

      // grab URL and pass it to the browser
      curl_exec($ch);

      // close cURL resource, and free up system resources
      curl_close($ch);
      }

      function startsWith($haystack, $needle)
    {
         $length = strlen($needle);
         return (substr($haystack, 0, $length) === $needle);
    }

    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
}
