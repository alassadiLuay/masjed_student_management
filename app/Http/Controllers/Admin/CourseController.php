<?php namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Course\IndexCourse;
use App\Http\Requests\Admin\Course\StoreCourse;
use App\Http\Requests\Admin\Course\UpdateCourse;
use App\Http\Requests\Admin\Course\DestroyCourse;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Course;
use App\Models\Semester;
class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexCourse $request
     * @return Response|array
     */
    public function index(IndexCourse $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Course::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'semester_id' , 'semesters.semester_name' , 'course_name', 'started_at', 'end_at', 'session_number', 'enabled'],

            // set columns to searchIn
            ['id', 'course_name', 'description' , 'semesters.semester_name'],

            // With Semesters 
            function($query) use ($request){
                $query->join('semesters','semesters.id', '=', 'semester_id')->get();
            }
        );

        $course_counts = DB::table('course_students')
                             ->select('course_id', DB::raw('count(*) as total'))
                             ->groupBy('course_id')
                             ->get()->toArray();
        // Refactor Count Results
        for ($i=0; $i < sizeof($course_counts); $i++) { 
             # code...
            $_course_counts[$course_counts[$i]->course_id]=$course_counts[$i]->total;
         }

        for ($i=0; $i < sizeof($data); $i++) { 
             # code...
            if(isset($_course_counts[$data[$i]->id]))
                $data[$i]['count_std'] = $_course_counts[$data[$i]->id];
            else
                $data[$i]['count_std'] = 0;
        }

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.course.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.course.create');
        $semesters = Semester::get();
        return view('admin.course.create',compact('semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCourse $request
     * @return Response|array
     */
    public function store(StoreCourse $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Course
        $course = Course::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/courses'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  Course $course
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Course $course)
    {
        $this->authorize('admin.course.show', $course);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Course $course
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Course $course)
    {
        $this->authorize('admin.course.edit', $course);
        $semesters = Semester::get();
        return view('admin.course.edit', [
            'course' => $course,
            'semesters' => $semesters
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCourse $request
     * @param  Course $course
     * @return Response|array
     */
    public function update(UpdateCourse $request, Course $course)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Course
        $course->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/courses'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyCourse $request
     * @param  Course $course
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyCourse $request, Course $course)
    {
        $course->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
