<?php namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Student\IndexStudent;
use App\Http\Requests\Admin\Student\StoreStudent;
use App\Http\Requests\Admin\Student\UpdateStudent;
use App\Http\Requests\Admin\Student\DestroyStudent;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Student;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexStudent $request
     * @return Response|array
     */
    public function index(IndexStudent $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Student::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'student_fname', 'student_lname', 'student_father_name', 'student_address', 'student_father_job', 'student_nationality', 'father_phone', 'student_phone', 'home_phone', 'transportation', 'student_photo', 'note', 'status', 'has_id', 'student_birthdate'],

            // set columns to searchIn
            ['id', 'student_fname', 'student_lname', 'student_father_name', 'student_address', 'student_father_job', 'student_nationality', 'father_phone', 'student_phone', 'home_phone', 'transportation', 'student_photo', 'note']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.student.index', ['data' => $data]);

    }

    public function student_json(IndexStudent $request)
    {
            // pass the request with params
        $student_name = $request->get('studnet_name');
        $student_number = $request->get('student_number');
        $course_id = $request->get('course_id');
        if(isset($course_id))
            $students = DB::table('students')->select(['students.id as id', 'students.id as student_id', 'student_fname' , 'student_lname' , 'student_address' ,'father_phone', 'course_students.id as s_id'])->join('course_students', 'student_id', '=', 'students.id')->where(['course_id'=>$course_id])->get();
        else if(isset($student_name)){
            $students_raw_data = DB::table('students')->where('student_fname','like','%'.$student_name.'%')->take(10)->get();
            for ($i=0; $i < sizeof($students_raw_data); $i++) { 
                $studentObj['student_fname'] = $students_raw_data[$i]->student_fname;
                $studentObj['student_father_name'] = $students_raw_data[$i]->student_father_name;
                $studentObj['father_phone'] = $students_raw_data[$i]->father_phone;
                if(isset($studentObj['father_phone']) && $studentObj['father_phone'] != null && strlen($studentObj['father_phone']) > 8)
                    $students[] = $studentObj;
                $studentObj['father_phone'] = $students_raw_data[$i]->student_phone;
                if(isset($studentObj['father_phone']) && $studentObj['father_phone'] != null && strlen($studentObj['father_phone']) > 8)
                    $students[] = $studentObj;
            }
        }
        else if(!isset($student_number))
            $students = Student::get();
        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded') , 'data' => $students]);
    }

/*    public function student_numbers(IndexStudent $request)
    {
            // pass the request with params
        $student_name = $request->get('studnet_name');
        $students = [];
        if(isset($student_name))
            $students = DB::table('students')->where('student_fname','like','%'.$student_name.'%')->take(10)->get();

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded') , 'data' => $students]);
    }*/
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.student.create');

        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStudent $request
     * @return Response|array
     */
    public function store(StoreStudent $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Student
        $student = Student::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/students'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  Student $student
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Student $student)
    {
        $this->authorize('admin.student.show', $student);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Student $student
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Student $student)
    {
        $this->authorize('admin.student.edit', $student);

        return view('admin.student.edit', [
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStudent $request
     * @param  Student $student
     * @return Response|array
     */
    public function update(UpdateStudent $request, Student $student)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Student
        $student->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/students'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyStudent $request
     * @param  Student $student
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyStudent $request, Student $student)
    {
        $student->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    public function upload_student(IndexStudent $request)
    {
          $file = $request->file('student_csv');

          // File Details 
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $tempPath = $file->getRealPath();
          $fileSize = $file->getSize();
          $mimeType = $file->getMimeType();

          // Valid File Extensions
          $valid_extension = array("csv");

          // 2MB in Bytes
          $maxFileSize = 2097152; 

          // Check file extension
          if(in_array(strtolower($extension),$valid_extension)){

            // Check file size
            if($fileSize <= $maxFileSize){

              // File upload location
              $location = 'uploads';

              // Upload file
              $file->move($location,$filename);

              // Import CSV to Database
              $filepath = public_path($location."/".$filename);

              // Reading file
              $file = fopen($filepath,"r");

              $importData_arr = array();
              $i = 0;
              while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                 $num = count($filedata );
                 
                 // Skip first row (Remove below comment if you want to skip the first row)
                 /*if($i == 0){
                    $i++;
                    continue; 
                 }*/
                 //$filedata = array_map("utf8_encode", $filedata);
                 for ($c=0; $c < $num; $c++) {
                    //$importData_arr[$i][] = $filedata [$c];
                    $importData_arr[$i][] = $filedata [$c];
                 }
                 $i++;
              }
              fclose($file);
              // Insert to MySQL database
              foreach($importData_arr as $importData){
                //var_dump($importData);
                $insertData = array(
                   "student_fname" => chr(239) . chr(187) . chr(191) .$importData[1],
                    "student_lname" => chr(239) . chr(187) . chr(191) .$importData[2],
                    "student_father_job" => chr(239) . chr(187) . chr(191) .$importData[3],
                    "student_birthdate" => date("Y-m-d",strtotime( $importData[4])),
                    "student_nationality" => chr(239) . chr(187) . chr(191) .$importData[5],
                    "school_name" => chr(239) . chr(187) . chr(191) .$importData[6],
                    "father_phone" => chr(239) . chr(187) . chr(191) .$importData[7],
                    "student_phone" => chr(239) . chr(187) . chr(191) .$importData[8],
                    "home_phone" => chr(239) . chr(187) . chr(191) .$importData[9],
                    "student_address" => chr(239) . chr(187) . chr(191) .$importData[10]
                );
                if(isset($importData[11]))
                    $insertData["note"] = chr(239) . chr(187) . chr(191) .$importData[11];
/*                header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
                var_dump($insertData);   
                die(); */
                //var_dump($insertData);   
                $student = Student::create($insertData);
              }
              //die();
              Session::flash('message','Import Successful.');
            }else{
              Session::flash('message','File too large. File must be less than 2MB.');
            }

          }else{
             Session::flash('message','Invalid File Extension.');
          }

        return redirect('admin/students');
    }
}
