<?php namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\StudentNote\IndexStudentNote;
use App\Http\Requests\Admin\StudentNote\StoreStudentNote;
use App\Http\Requests\Admin\StudentNote\UpdateStudentNote;
use App\Http\Requests\Admin\StudentNote\DestroyStudentNote;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\StudentNote;

class StudentNotesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexStudentNote $request
     * @return Response|array
     */
    public function index(IndexStudentNote $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(StudentNote::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id','students.student_fname','students.student_lname' , 'students.father_phone' ,'notes','created_at'],

            // set columns to searchIn
            ['students.student_fname','students.student_lname' , 'students.father_phone' ,'notes','created_at'],

            function($query) use ($request){
                $query->join('students','students.id', '=', 'student_id')
                ->get();
            }
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.student-note.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.student-note.create');

        return view('admin.student-note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStudentNote $request
     * @return Response|array
     */
    public function store(StoreStudentNote $request)
    {
        // Sanitize input
        //$sanitized = $request->validated();

        // Store the StudentNote
        $noteStd['student_id'] = $request->get('student_id')['id'];
        $noteStd['notes']   = $request->get('notes');
        var_dump($noteStd);
        $studentNote = StudentNote::create($noteStd);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-notes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  StudentNote $studentNote
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(StudentNote $studentNote)
    {
        $this->authorize('admin.student-note.show', $studentNote);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StudentNote $studentNote
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(StudentNote $studentNote)
    {
        $this->authorize('admin.student-note.edit', $studentNote);
        $student = DB::table('students')->where(['id'=>$studentNote->student_id])->get()->toArray()[0];
        return view('admin.student-note.edit', [
            'studentNote' => $studentNote,
            'student_name' => $student->student_fname.' '.$student->student_lname
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStudentNote $request
     * @param  StudentNote $studentNote
     * @return Response|array
     */
    public function update(UpdateStudentNote $request, StudentNote $studentNote)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values StudentNote
        $studentNote->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-notes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyStudentNote $request
     * @param  StudentNote $studentNote
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyStudentNote $request, StudentNote $studentNote)
    {
        $studentNote->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
