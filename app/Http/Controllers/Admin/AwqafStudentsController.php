<?php namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\AwqafStudent\IndexAwqafStudent;
use App\Http\Requests\Admin\AwqafStudent\StoreAwqafStudent;
use App\Http\Requests\Admin\AwqafStudent\UpdateAwqafStudent;
use App\Http\Requests\Admin\AwqafStudent\DestroyAwqafStudent;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\AwqafStudent;

class AwqafStudentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexAwqafStudent $request
     * @return Response|array
     */
    public function index(IndexAwqafStudent $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AwqafStudent::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id','awqafs.test_name', 'awqafs.date', 'awqafs.place', 'awqafs.tester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone' , 'student_mark' ,'is_passed','full_mark','created_at','subject_type','subject_id' ,'subject_type as subject'],

            // set columns to searchIn
            ['test_name', 'date', 'place', 'tester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone' ]
            ,
            function($query) use ($request){
                $q_surah = $query->join('awqafs','awqafs.id','=','awqaf_id')
                                // Student Info Tables
                                  ->join('students','students.id', '=', 'student_id')->get();
            }
        );

        $surah = $this->arrayToMap(DB::table('surah')->get()->toArray());
        $juza = $this->arrayToMap(DB::table('juza')->get()->toArray());
        $page = $this->arrayToMap(DB::table('page')->get()->toArray());

        $result = $data->toArray();
        for ($i=0; $i < sizeof($result["data"]); $i++) { 
            # code...
            switch ($result["data"][$i]['subject_type']) {
                case 'juza':
                    $result["data"][$i]['subject'] = $juza[$result["data"][$i]['subject_id']];
                    break;
                case 'surah':
                    $result["data"][$i]['subject'] = $surah[$result["data"][$i]['subject_id']];
                    break;
                case 'page':
                    $result["data"][$i]['subject'] = $page[$result["data"][$i]['subject_id']];
                    break;
                default:
                    $subjects = [];
            }
        }
        
        if ($request->ajax()) {
            return ['data' => $result];
        }
        

        return view('admin.awqaf-student.index', ['data' => json_encode($result)]);

    }

    function arrayToMap($dataArray)
    {
        # code...
        $data = [];
        for ($i=0; $i < sizeof($dataArray); $i++) { 
            # code...
            $data[$dataArray[$i]->id] = $dataArray[$i];
        }
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.awqaf-student.create');

        return view('admin.awqaf-student.create');
    }

    public function subjects(IndexAwqafStudent $request)
    {
        # code...
        $subject_id = $request->get('subject_id');
        switch ($subject_id) {
            case 'juza':
                $subjects = DB::table('juza')->get();
                break;
            case 'surah':
                $subjects = DB::table('surah')->get();
                break;
            case 'page':
                $subjects = DB::table('page')->get();
                break;
            default:
                $subjects = [];
        }

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded') , 'data' => $subjects]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAwqafStudent $request
     * @return Response|array
     */
    public function store(StoreAwqafStudent $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        $AwqafStudent['awqaf_id']  = $request->get('awqaf_id')['id'];
        $AwqafStudent['full_mark']   = $request->get('full_mark');
        $AwqafStudent['student_id'] = $request->get('student_id')['id'];
        $AwqafStudent['created_at']   = $request->get('created_at');
        $AwqafStudent['is_passed']   = $request->get('is_passed');
        $AwqafStudent['student_mark']   = $request->get('student_mark');
        $AwqafStudent['subject_type']   = $request->get('subject_type');
        $AwqafStudent['subject_id']   = $request->get('subject_id')['id'];

        // Store the AwqafStudent
        $awqafStudent = AwqafStudent::create($AwqafStudent);

        if ($request->ajax()) {
            return ['redirect' => url('admin/awqaf-students'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/awqaf-students');
    }

    /**
     * Display the specified resource.
     *
     * @param  AwqafStudent $awqafStudent
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(AwqafStudent $awqafStudent)
    {
        $this->authorize('admin.awqaf-student.show', $awqafStudent);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AwqafStudent $awqafStudent
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(AwqafStudent $awqafStudent)
    {
        $this->authorize('admin.awqaf-student.edit', $awqafStudent);

        return view('admin.awqaf-student.edit', [
            'awqafStudent' => $awqafStudent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAwqafStudent $request
     * @param  AwqafStudent $awqafStudent
     * @return Response|array
     */
    public function update(UpdateAwqafStudent $request, AwqafStudent $awqafStudent)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values AwqafStudent
        $awqafStudent->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/awqaf-students'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/awqaf-students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyAwqafStudent $request
     * @param  AwqafStudent $awqafStudent
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyAwqafStudent $request, AwqafStudent $awqafStudent)
    {
        $awqafStudent->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
