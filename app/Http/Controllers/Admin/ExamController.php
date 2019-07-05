<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Exam\IndexExam;
use App\Http\Requests\Admin\Exam\StoreExam;
use App\Http\Requests\Admin\Exam\UpdateExam;
use App\Http\Requests\Admin\Exam\DestroyExam;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Exam;
use App\Models\Course;
class ExamController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexExam $request
     * @return Response|array
     */
    public function index(IndexExam $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Exam::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'course_id', 'courses.course_name', 'exam_name', 'exam_max_num', 'exam_min_num'],

            // set columns to searchIn
            ['id', 'exam_name', 'courses.course_name'],

            // With course 
            function($query) use ($request){
                $query->join('courses','courses.id', '=', 'course_id')->get();
            }
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.exam.index', ['data' => $data]);

    }

    public function exams_json(IndexExam $request){
        $exams = Exam::where(['course_id'=>$request->get('course_id')])->get();
        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded') , 'data' => $exams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.exam.create');
        $courses = Course::get();
        return view('admin.exam.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreExam $request
     * @return Response|array
     */
    public function store(StoreExam $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Exam
        $exam = Exam::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/exams'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/exams');
    }

    /**
     * Display the specified resource.
     *
     * @param  Exam $exam
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Exam $exam)
    {
        $this->authorize('admin.exam.show', $exam);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Exam $exam
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Exam $exam)
    {
        $this->authorize('admin.exam.edit', $exam);
        $courses = Course::get();
        return view('admin.exam.edit', [
            'exam' => $exam,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateExam $request
     * @param  Exam $exam
     * @return Response|array
     */
    public function update(UpdateExam $request, Exam $exam)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Exam
        $exam->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/exams'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/exams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyExam $request
     * @param  Exam $exam
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyExam $request, Exam $exam)
    {
        $exam->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
