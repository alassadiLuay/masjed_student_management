<?php namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\ListenedSubject\IndexListenedSubject;
use App\Http\Requests\Admin\ListenedSubject\StoreListenedSubject;
use App\Http\Requests\Admin\ListenedSubject\UpdateListenedSubject;
use App\Http\Requests\Admin\ListenedSubject\DestroyListenedSubject;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\ListenedSubject;
use App\Models\Semester;

class ListenedSubjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexListenedSubject $request
     * @return Response|array
     */
    public function index(IndexListenedSubject $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ListenedSubject::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'student_id', 'students.student_fname','students.student_lname' , 'students.father_phone' , 'student_course_id', 'subject_id', 'subject_type' , 'subject_type as subject' , 'courses.course_name' , 'semesters.semester_name' , 'created_at' ],

            // set columns to searchIn
            /*['id', 'students.student_fname','students.student_lname' , 'students.father_phone' , 'subject_id', 'subject_type' , 'subject_type as subject' , 'courses.course_name' , 'semesters.semester_name' , 'created_at' ],*/
            ['id', 'students.student_fname','students.student_lname' , 'students.father_phone' , 'subject_id', 'subject_type' ,'courses.course_name' , 'semesters.semester_name' , 'created_at' ],
            function($query) use ($request){
                    
                 $query->join('course_students','course_students.id', '=', 'student_course_id')
                    // Student Info Tables
                      ->join('students','students.id', '=', 'course_students.student_id')
                    // Course Info Tables  
                      ->join('courses','courses.id', '=', 'course_students.course_id')
                    // Semester Info Tables     
                      ->join('semesters','semesters.id', '=', 'courses.semester_id')
                ->get();
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

        return view('admin.listened-subject.index', ['data' => json_encode($result)]);

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
        $this->authorize('admin.listened-subject.create');
        $semesters = Semester::get();
        return view('admin.listened-subject.create',compact('semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreListenedSubject $request
     * @return Response|array
     */
    public function store(StoreListenedSubject $request)
    {
        // Sanitize input
        $sanitized = $request->validated();
        $ListenedObj['subject_type'] = $request->get('subject_type');
        $ListenedObj['subject_id']   = $request->get('subject_id')['id'];
        $ListenedObj['student_id'] = $request->get('student_id')['id'];
        $ListenedObj['student_course_id'] = $request->get('student_id')['s_id'];
        $ListenedObj['created_at'] = $request->get('created_at');

        // Store the ListenedSubject
        $listenedSubject = ListenedSubject::create($ListenedObj);

        if ($request->ajax()) {
            return ['redirect' => url('admin/listened-subjects'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/listened-subjects');
    }

    /**
     * Display the specified resource.
     *
     * @param  ListenedSubject $listenedSubject
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(ListenedSubject $listenedSubject)
    {
        $this->authorize('admin.listened-subject.show', $listenedSubject);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ListenedSubject $listenedSubject
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(ListenedSubject $listenedSubject)
    {
        $this->authorize('admin.listened-subject.edit', $listenedSubject);
        $semesters = Semester::get();
        return view('admin.listened-subject.edit', [
            'listenedSubject' => $listenedSubject,
            'semesters' => $semesters
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateListenedSubject $request
     * @param  ListenedSubject $listenedSubject
     * @return Response|array
     */
    public function update(UpdateListenedSubject $request, ListenedSubject $listenedSubject)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values ListenedSubject
        $listenedSubject->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/listened-subjects'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/listened-subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyListenedSubject $request
     * @param  ListenedSubject $listenedSubject
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyListenedSubject $request, ListenedSubject $listenedSubject)
    {
        $listenedSubject->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
