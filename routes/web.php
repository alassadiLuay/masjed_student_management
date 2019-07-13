<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/student_semester_attend','Reports\ReportsController@student_semester_attend');

/* Auto-generated admin routes */
/*Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/classes',                                'Admin\ClassController@index');
    Route::get('/admin/classes/create',                         'Admin\ClassController@create');
    Route::post('/admin/classes',                               'Admin\ClassController@store');
    Route::get('/admin/classes/{class}/edit',                   'Admin\ClassController@edit')->name('admin/classes/edit');
    Route::post('/admin/classes/{class}',                       'Admin\ClassController@update')->name('admin/classes/update');
    Route::delete('/admin/classes/{class}',                     'Admin\ClassController@destroy')->name('admin/classes/destroy');
});*/

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/courses',                                'Admin\CourseController@index');
    Route::get('/admin/courses/create',                         'Admin\CourseController@create');
    Route::post('/admin/courses',                               'Admin\CourseController@store');
    Route::get('/admin/courses/{course}/edit',                  'Admin\CourseController@edit')->name('admin/courses/edit');
    Route::post('/admin/courses/{course}',                      'Admin\CourseController@update')->name('admin/courses/update');
    Route::delete('/admin/courses/{course}',                    'Admin\CourseController@destroy')->name('admin/courses/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/exams',                                  'Admin\ExamController@index');
    Route::get('/admin/exams/exams_json',                       'Admin\ExamController@exams_json');
    Route::get('/admin/exams/create',                           'Admin\ExamController@create');
    Route::post('/admin/exams',                                 'Admin\ExamController@store');
    Route::get('/admin/exams/{exam}/edit',                      'Admin\ExamController@edit')->name('admin/exams/edit');
    Route::post('/admin/exams/{exam}',                          'Admin\ExamController@update')->name('admin/exams/update');
    Route::delete('/admin/exams/{exam}',                        'Admin\ExamController@destroy')->name('admin/exams/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/semesters',                              'Admin\SemesterController@index');
    Route::get('/admin/semesters/all',                              'Admin\SemesterController@all');
    Route::get('/admin/semesters/create',                       'Admin\SemesterController@create');
    Route::post('/admin/semesters',                             'Admin\SemesterController@store');
    Route::get('/admin/semesters/{semester}/edit',              'Admin\SemesterController@edit')->name('admin/semesters/edit');
    Route::post('/admin/semesters/{semester}',                  'Admin\SemesterController@update')->name('admin/semesters/update');
    Route::delete('/admin/semesters/{semester}',                'Admin\SemesterController@destroy')->name('admin/semesters/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/students',                               'Admin\StudentController@index');
    Route::get('/admin/students/student_numbers',                               'Admin\StudentController@student_numbers');
    Route::post('/admin/upload_student',                               'Admin\StudentController@upload_student');
    Route::get('/admin/whatsapp',                               'Admin\WhatsappController@index');
    Route::get('/admin/whatsapp/multiCast',                               'Admin\WhatsappController@multiCast');
    Route::get('/admin/students/student_json',                               'Admin\StudentController@student_json');
    Route::get('/admin/students/create',                        'Admin\StudentController@create');
    Route::post('/admin/students',                              'Admin\StudentController@store');
    Route::get('/admin/students/{student}/edit',                'Admin\StudentController@edit')->name('admin/students/edit');
    Route::post('/admin/students/{student}',                    'Admin\StudentController@update')->name('admin/students/update');
    Route::delete('/admin/students/{student}',                  'Admin\StudentController@destroy')->name('admin/students/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/teachers',                               'Admin\TeacherController@index');
    Route::get('/admin/teachers/create',                        'Admin\TeacherController@create');
    Route::post('/admin/teachers',                              'Admin\TeacherController@store');
    Route::get('/admin/teachers/{teacher}/edit',                'Admin\TeacherController@edit')->name('admin/teachers/edit');
    Route::post('/admin/teachers/{teacher}',                    'Admin\TeacherController@update')->name('admin/teachers/update');
    Route::delete('/admin/teachers/{teacher}',                  'Admin\TeacherController@destroy')->name('admin/teachers/destroy');
});

/* Auto-generated admin routes */
/*Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/classes',                                'Admin\ClassesController@index');
    Route::get('/admin/classes/create',                         'Admin\ClassesController@create');
    Route::post('/admin/classes',                               'Admin\ClassesController@store');
    Route::get('/admin/classes/{class}/edit',                   'Admin\ClassesController@edit')->name('admin/classes/edit');
    Route::post('/admin/classes/{class}',                       'Admin\ClassesController@update')->name('admin/classes/update');
    Route::delete('/admin/classes/{class}',                     'Admin\ClassesController@destroy')->name('admin/classes/destroy');
});*/

/* Auto-generated admin routes */
/*Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/std-classes',                            'Admin\StdClassController@index');
    Route::get('/admin/std-classes/create',                     'Admin\StdClassController@create');
    Route::post('/admin/std-classes',                           'Admin\StdClassController@store');
    Route::get('/admin/std-classes/{stdClass}/edit',            'Admin\StdClassController@edit')->name('admin/std-classes/edit');
    Route::post('/admin/std-classes/{stdClass}',                'Admin\StdClassController@update')->name('admin/std-classes/update');
    Route::delete('/admin/std-classes/{stdClass}',              'Admin\StdClassController@destroy')->name('admin/std-classes/destroy');
});*/

/* Auto-generated admin routes */
/*Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/stdclasses',                             'Admin\StdclassController@index');
    Route::get('/admin/stdclasses/create',                      'Admin\StdclassController@create');
    Route::post('/admin/stdclasses',                            'Admin\StdclassController@store');
    Route::get('/admin/stdclasses/{stdclass}/edit',             'Admin\StdclassController@edit')->name('admin/stdclasses/edit');
    Route::post('/admin/stdclasses/{stdclass}',                 'Admin\StdclassController@update')->name('admin/stdclasses/update');
    Route::delete('/admin/stdclasses/{stdclass}',               'Admin\StdclassController@destroy')->name('admin/stdclasses/destroy');
});*/

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/student-classes',                        'Admin\StudentClassController@index');
    Route::get('/admin/student-classes/create',                 'Admin\StudentClassController@create');
    Route::post('/admin/student-classes',                       'Admin\StudentClassController@store');
    Route::get('/admin/student-classes/{studentClass}/edit',    'Admin\StudentClassController@edit')->name('admin/student-classes/edit');
    Route::post('/admin/student-classes/{studentClass}',        'Admin\StudentClassController@update')->name('admin/student-classes/update');
    Route::delete('/admin/student-classes/{studentClass}',      'Admin\StudentClassController@destroy')->name('admin/student-classes/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/course-students',                'Admin\CourseStudentController@index');
    Route::get('/admin/course-students/create',         'Admin\CourseStudentController@create');
    Route::get('/admin/course-students/create-multi',         'Admin\CourseStudentController@createMulti');
    Route::post('/admin/course-students',               'Admin\CourseStudentController@store');
    Route::post('/admin/course-students/multi',               'Admin\CourseStudentController@storeMulti');
    Route::get('/admin/course-students/{courseStudent}/edit','Admin\CourseStudentController@edit')->name('admin/course-students/edit');
    Route::post('/admin/course-students/{courseStudent}','Admin\CourseStudentController@update')->name('admin/course-students/update');
    Route::delete('/admin/course-students/{courseStudent}','Admin\CourseStudentController@destroy')->name('admin/course-students/destroy');
    Route::get('/admin/course-students/semester_courses',                        'Admin\TeacherCourseController@semester_courses');
    Route::get('/admin/course-students/{id}/semester_courses',                        'Admin\TeacherCourseController@semester_courses');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/teacher-roles',                          'Admin\TeacherRolesController@index');
    Route::get('/admin/teacher-roles/create',                   'Admin\TeacherRolesController@create');
    Route::post('/admin/teacher-roles',                         'Admin\TeacherRolesController@store');
    Route::get('/admin/teacher-roles/{teacherRole}/edit',       'Admin\TeacherRolesController@edit')->name('admin/teacher-roles/edit');
    Route::post('/admin/teacher-roles/{teacherRole}',           'Admin\TeacherRolesController@update')->name('admin/teacher-roles/update');
    Route::delete('/admin/teacher-roles/{teacherRole}',         'Admin\TeacherRolesController@destroy')->name('admin/teacher-roles/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/teacher-courses',                        'Admin\TeacherCourseController@index');
    Route::get('/admin/teacher-courses/create',                 'Admin\TeacherCourseController@create');
    Route::post('/admin/teacher-courses',                       'Admin\TeacherCourseController@store');
    Route::get('/admin/teacher-courses/{teacherCourse}/edit',   'Admin\TeacherCourseController@edit')->name('admin/teacher-courses/edit');
    Route::post('/admin/teacher-courses/{teacherCourse}',       'Admin\TeacherCourseController@update')->name('admin/teacher-courses/update');
    Route::delete('/admin/teacher-courses/{teacherCourse}',     'Admin\TeacherCourseController@destroy')->name('admin/teacher-courses/destroy');
    Route::get('/admin/teacher-courses/semester_courses',                        'Admin\TeacherCourseController@semester_courses');
    Route::get('/admin/teacher-courses/{id}/semester_courses',                        'Admin\TeacherCourseController@semester_courses');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/point-types',                            'Admin\PointTypesController@index');
    Route::get('/admin/point-types/create',                     'Admin\PointTypesController@create');
    Route::post('/admin/point-types',                           'Admin\PointTypesController@store');
    Route::get('/admin/point-types/{pointType}/edit',           'Admin\PointTypesController@edit')->name('admin/point-types/edit');
    Route::post('/admin/point-types/{pointType}',               'Admin\PointTypesController@update')->name('admin/point-types/update');
    Route::delete('/admin/point-types/{pointType}',             'Admin\PointTypesController@destroy')->name('admin/point-types/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/point-configs',                          'Admin\PointConfigsController@index');
    Route::get('/admin/point-configs/point_json',                          'Admin\PointConfigsController@point_json');
    Route::get('/admin/point-configs/create',                   'Admin\PointConfigsController@create');
    Route::post('/admin/point-configs',                         'Admin\PointConfigsController@store');
    Route::get('/admin/point-configs/{pointConfig}/edit',       'Admin\PointConfigsController@edit')->name('admin/point-configs/edit');
    Route::post('/admin/point-configs/{pointConfig}',           'Admin\PointConfigsController@update')->name('admin/point-configs/update');
    Route::delete('/admin/point-configs/{pointConfig}',         'Admin\PointConfigsController@destroy')->name('admin/point-configs/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/teachers',                               'Admin\UsersController@index');
    Route::get('/admin/teachers/create',                        'Admin\UsersController@create');
    Route::post('/admin/teachers',                              'Admin\UsersController@store');
    Route::get('/admin/teachers/{teacher}/edit',                'Admin\UsersController@edit')->name('admin/teachers/edit');
    Route::post('/admin/teachers/{teacher}',                    'Admin\UsersController@update')->name('admin/teachers/update');
    Route::delete('/admin/teachers/{teacher}',                  'Admin\UsersController@destroy')->name('admin/teachers/destroy');
    Route::get('/admin/teachers/{teacher}/resend-activation',   'Admin\UsersController@resendActivationEmail')->name('admin/teachers/resendActivationEmail');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/users',                                  'Admin\UsersController@index');
    Route::get('/admin/users/create',                           'Admin\UsersController@create');
    Route::post('/admin/users',                                 'Admin\UsersController@store');
    Route::get('/admin/users/{user}/edit',                      'Admin\UsersController@edit')->name('admin/users/edit');
    Route::post('/admin/users/{user}',                          'Admin\UsersController@update')->name('admin/users/update');
    Route::delete('/admin/users/{user}',                        'Admin\UsersController@destroy')->name('admin/users/destroy');
    Route::get('/admin/users/{user}/resend-activation',         'Admin\UsersController@resendActivationEmail')->name('admin/users/resendActivationEmail');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/teachers',                               'Admin\TeacherController@index');
    Route::get('/admin/teachers/create',                        'Admin\TeacherController@create');
    Route::post('/admin/teachers',                              'Admin\TeacherController@store');
    Route::get('/admin/teachers/{teacher}/edit',                'Admin\TeacherController@edit')->name('admin/teachers/edit');
    Route::post('/admin/teachers/{teacher}',                    'Admin\TeacherController@update')->name('admin/teachers/update');
    Route::delete('/admin/teachers/{teacher}',                  'Admin\TeacherController@destroy')->name('admin/teachers/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/awqafs',                                 'Admin\AwqafController@index');
    Route::get('/admin/awqafs/awqaf_json',                                 'Admin\AwqafController@awqaf_json');
    Route::get('/admin/awqafs/create',                          'Admin\AwqafController@create');
    Route::post('/admin/awqafs',                                'Admin\AwqafController@store');
    Route::get('/admin/awqafs/{awqaf}/edit',                    'Admin\AwqafController@edit')->name('admin/awqafs/edit');
    Route::post('/admin/awqafs/{awqaf}',                        'Admin\AwqafController@update')->name('admin/awqafs/update');
    Route::delete('/admin/awqafs/{awqaf}',                      'Admin\AwqafController@destroy')->name('admin/awqafs/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/awqaf-students',                         'Admin\AwqafStudentsController@index');
    Route::get('/admin/subjects',                         'Admin\AwqafStudentsController@subjects');
    Route::get('/admin/awqaf-students/create',                  'Admin\AwqafStudentsController@create');
    Route::post('/admin/awqaf-students',                        'Admin\AwqafStudentsController@store');
    Route::get('/admin/awqaf-students/{awqafStudent}/edit',     'Admin\AwqafStudentsController@edit')->name('admin/awqaf-students/edit');
    Route::post('/admin/awqaf-students/{awqafStudent}',         'Admin\AwqafStudentsController@update')->name('admin/awqaf-students/update');
    Route::delete('/admin/awqaf-students/{awqafStudent}',       'Admin\AwqafStudentsController@destroy')->name('admin/awqaf-students/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/marks',                                  'Admin\MarksController@index');
    Route::get('/admin/marks/create',                           'Admin\MarksController@create');
    Route::post('/admin/marks',                                 'Admin\MarksController@store');
    Route::get('/admin/marks/{mark}/edit',                      'Admin\MarksController@edit')->name('admin/marks/edit');
    Route::post('/admin/marks/{mark}',                          'Admin\MarksController@update')->name('admin/marks/update');
    Route::delete('/admin/marks/{mark}',                        'Admin\MarksController@destroy')->name('admin/marks/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/student-notes',                          'Admin\StudentNotesController@index');
    Route::get('/admin/student-notes/create',                   'Admin\StudentNotesController@create');
    Route::post('/admin/student-notes',                         'Admin\StudentNotesController@store');
    Route::get('/admin/student-notes/{studentNote}/edit',       'Admin\StudentNotesController@edit')->name('admin/student-notes/edit');
    Route::post('/admin/student-notes/{studentNote}',           'Admin\StudentNotesController@update')->name('admin/student-notes/update');
    Route::delete('/admin/student-notes/{studentNote}',         'Admin\StudentNotesController@destroy')->name('admin/student-notes/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/student-attendances',                    'Admin\StudentAttendancesController@index');
    Route::get('/admin/student-attendances/today_absance_report',                    'Admin\StudentAttendancesController@today_absance_report');
    Route::get('/admin/student-attendances/today_attend_report',                    'Admin\StudentAttendancesController@today_attend_report');
        Route::get('/admin/student-attendances/send_whatsapp_messages',                    'Admin\StudentAttendancesController@send_whatsapp_messages');
    Route::get('/admin/student-attendances/create',             'Admin\StudentAttendancesController@create');
    Route::post('/admin/student-attendances',                   'Admin\StudentAttendancesController@store');
    Route::post('/admin/whatsapp/send_message',                   'Admin\WhatsappController@send_message');
    Route::post('/admin/whatsapp/send_multi_message',                   'Admin\WhatsappController@send_multi_message');
    Route::get('/admin/student-attendances/{studentAttendance}/edit','Admin\StudentAttendancesController@edit')->name('admin/student-attendances/edit');
    Route::post('/admin/student-attendances/{studentAttendance}','Admin\StudentAttendancesController@update')->name('admin/student-attendances/update');
    Route::delete('/admin/student-attendances/{studentAttendance}','Admin\StudentAttendancesController@destroy')->name('admin/student-attendances/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/student-points',                         'Admin\StudentPointsController@index');
    Route::get('/admin/student-points/report',                         'Admin\StudentPointsController@report');
    Route::get('/admin/student-points/create',                  'Admin\StudentPointsController@create');
    Route::post('/admin/student-points',                        'Admin\StudentPointsController@store');
    Route::get('/admin/student-points/{studentPoint}/edit',     'Admin\StudentPointsController@edit')->name('admin/student-points/edit');
    Route::post('/admin/student-points/{studentPoint}',         'Admin\StudentPointsController@update')->name('admin/student-points/update');
    Route::delete('/admin/student-points/{studentPoint}',       'Admin\StudentPointsController@destroy')->name('admin/student-points/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/listened-subjects',                      'Admin\ListenedSubjectsController@index');
    Route::get('/admin/listened-subjects/create',               'Admin\ListenedSubjectsController@create');
    Route::post('/admin/listened-subjects',                     'Admin\ListenedSubjectsController@store');
    Route::get('/admin/listened-subjects/{listenedSubject}/edit','Admin\ListenedSubjectsController@edit')->name('admin/listened-subjects/edit');
    Route::post('/admin/listened-subjects/{listenedSubject}',   'Admin\ListenedSubjectsController@update')->name('admin/listened-subjects/update');
    Route::delete('/admin/listened-subjects/{listenedSubject}', 'Admin\ListenedSubjectsController@destroy')->name('admin/listened-subjects/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/users',                                  'Admin\UsersController@index');
    Route::get('/admin/users/create',                           'Admin\UsersController@create');
    Route::post('/admin/users',                                 'Admin\UsersController@store');
    Route::get('/admin/users/{user}/edit',                      'Admin\UsersController@edit')->name('admin/users/edit');
    Route::post('/admin/users/{user}',                          'Admin\UsersController@update')->name('admin/users/update');
    Route::delete('/admin/users/{user}',                        'Admin\UsersController@destroy')->name('admin/users/destroy');
    Route::get('/admin/users/{user}/resend-activation',         'Admin\UsersController@resendActivationEmail')->name('admin/users/resendActivationEmail');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/admin_users',                            'Admin\UsersController@index');
    Route::get('/admin/admin_users/create',                     'Admin\UsersController@create');
    Route::post('/admin/admin_users',                           'Admin\UsersController@store');
    Route::get('/admin/admin_users/{admin_user}/edit',          'Admin\UsersController@edit')->name('admin/admin_users/edit');
    Route::post('/admin/admin_users/{admin_user}',              'Admin\UsersController@update')->name('admin/admin_users/update');
    Route::delete('/admin/admin_users/{admin_user}',            'Admin\UsersController@destroy')->name('admin/admin_users/destroy');
    Route::get('/admin/admin_users/{admin_user}/resend-activation','Admin\UsersController@resendActivationEmail')->name('admin/admin_users/resendActivationEmail');
});