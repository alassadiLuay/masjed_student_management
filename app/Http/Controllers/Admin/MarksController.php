<?php namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Mark\IndexMark;
use App\Http\Requests\Admin\Mark\StoreMark;
use App\Http\Requests\Admin\Mark\UpdateMark;
use App\Http\Requests\Admin\Mark\DestroyMark;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Mark;
use App\Models\Semester;

class MarksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexMark $request
     * @return Response|array
     */
    public function index(IndexMark $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Mark::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'teachers.teacher_name', 'courses.course_name' , 'semesters.semester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone','exams.exam_name','exams.exam_min_num','marks.mark','marks.notes','created_at'],

            // set columns to searchIn
            ['teachers.teacher_name', 'courses.course_name' , 'semesters.semester_name' , 'students.student_fname','students.student_lname' , 'students.father_phone','exams.exam_name','exams.exam_min_num','marks.mark','marks.notes','created_at']
            ,
            function($query) use ($request){
                    // exams Tables
                $query->join('exams','exams.id','=','exam_id')
                    // Student Info Tables
                      ->join('course_students','course_students.id', '=', 'course_student_id')
                      ->join('students','students.id', '=', 'course_students.student_id')
                    // Course Info Tables  
                      ->join('courses','courses.id', '=', 'course_students.course_id')
                    // Teacher Info Tables   
                      ->leftJoin('teacher_courses','teacher_courses.course_id', '=', 'courses.id')    
                      ->leftJoin('teachers','teachers.id', '=', 'teacher_courses.teacher_id') 
                    // Semester Info Tables     
                      ->join('semesters','semesters.id', '=', 'courses.semester_id')
                ->get();
            }
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.mark.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.mark.create');
        $semesters    = Semester::where('enabled',true)->get();
        return view('admin.mark.create',compact('semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMark $request
     * @return Response|array
     */
    public function store(StoreMark $request)
    {
        // Sanitize input
        //$sanitized = $request->validated();

        $exam = $request->get('exam_id');
        $student_id = $request->get('student_id');

        $markObj['exam_id'] = $exam['id'];
        $markObj['student_id'] = $student_id['id'];
        $markObj['course_student_id'] = $student_id['s_id'];
        $markObj['mark'] = $request->get('mark');
        $markObj['notes'] = $request->get('notes');

        $mark = Mark::create($markObj);

        // Store the Mark
        //$mark = Mark::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/marks'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/marks');
    }

    /**
     * Display the specified resource.
     *
     * @param  Mark $mark
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Mark $mark)
    {
        $this->authorize('admin.mark.show', $mark);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Mark $mark
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Mark $mark)
    {
        $this->authorize('admin.mark.edit', $mark);
        //$semesters    = Semester::where('enabled',true)->get();
        $selected_exam = DB::table('exams')->where(['id'=>$mark->exam_id])->get()->toArray();
        $student = DB::table('students')->where(['id'=>$mark->student_id])->get()->toArray()[0];
        return view('admin.mark.edit', [
            'mark' => $mark,
            'selected_exam' => $selected_exam[0]->exam_name,
            'student_name' => $student->student_fname.' '.$student->student_lname
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateMark $request
     * @param  Mark $mark
     * @return Response|array
     */
    public function update(UpdateMark $request, Mark $mark)
    {
        // Sanitize input
        //$sanitized = $request->validated();
        $markObj['mark'] = $request->get('mark');
        $markObj['notes'] = $request->get('notes');

        //$mark = Mark::create($markObj);

        // Update changed values Mark
        $mark->update($markObj);

        if ($request->ajax()) {
            return ['redirect' => url('admin/marks'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/marks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyMark $request
     * @param  Mark $mark
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyMark $request, Mark $mark)
    {
        $mark->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
