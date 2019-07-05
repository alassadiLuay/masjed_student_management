<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Class::class, function (Faker\Generator $faker) {
    return [
        'school_name' => $faker->sentence,
        'class_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Course::class, function (Faker\Generator $faker) {
    return [
        'course_name' => $faker->sentence,
        'description' => $faker->text(),
        'started_at' => $faker->date(),
        'end_at' => $faker->date(),
        'session_number' => $faker->randomNumber(5),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Exam::class, function (Faker\Generator $faker) {
    return [
        'course_id' => $faker->randomNumber(5),
        'exam_name' => $faker->sentence,
        'exam_max_num' => $faker->randomNumber(5),
        'exam_min_num' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Semester::class, function (Faker\Generator $faker) {
    return [
        'semester_name' => $faker->sentence,
        'description' => $faker->text(),
        'started_at' => $faker->date(),
        'end_at' => $faker->date(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Student::class, function (Faker\Generator $faker) {
    return [
        'student_fname' => $faker->sentence,
        'student_lname' => $faker->sentence,
        'student_father_name' => $faker->sentence,
        'student_address' => $faker->sentence,
        'student_father_job' => $faker->sentence,
        'student_nationality' => $faker->sentence,
        'father_phone' => $faker->sentence,
        'student_phone' => $faker->sentence,
        'home_phone' => $faker->sentence,
        'transportation' => $faker->sentence,
        'student_photo' => $faker->sentence,
        'note' => $faker->sentence,
        'status' => $faker->boolean(),
        'has_id' => $faker->boolean(),
        'student_birthdate' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Teacher::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->randomNumber(5),
        'teacher_name' => $faker->sentence,
        'teacher_address' => $faker->sentence,
        'teacher_study' => $faker->sentence,
        'teacher_speciality' => $faker->sentence,
        'teacher_work' => $faker->sentence,
        'teacher_extras' => $faker->sentence,
        'teacher_note' => $faker->sentence,
        'teacher_mobile' => $faker->sentence,
        'teacher_phone' => $faker->sentence,
        'birthdate' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\StdClass::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Stdclass::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\StudentClass::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CourseStudent::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TeacherRole::class, function (Faker\Generator $faker) {
    return [
        'role_name' => $faker->sentence,
        'notes' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TeacherCourse::class, function (Faker\Generator $faker) {
    return [
        'teacher_id' => $faker->randomNumber(5),
        'course_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PointType::class, function (Faker\Generator $faker) {
    return [
        'type_name' => $faker->sentence,
        'notes' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PointConfig::class, function (Faker\Generator $faker) {
    return [
        'point_name' => $faker->sentence,
        'point_value' => $faker->sentence,
        'notes' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PointConfig::class, function (Faker\Generator $faker) {
    return [
        'point_type_id' => $faker->randomNumber(5),
        'point_name' => $faker->sentence,
        'point_value' => $faker->sentence,
        'notes' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Teacher::class, function (Faker\Generator $faker) {
    return [
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Teacher::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Awqaf::class, function (Faker\Generator $faker) {
    return [
        'test_name' => $faker->randomNumber(5),
        'date' => $faker->sentence,
        'place' => $faker->sentence,
        'tester_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AwqafStudent::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Mark::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\StudentNote::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\StudentAttendance::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\StudentPoint::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ListenedSubject::class, function (Faker\Generator $faker) {
    return [
        'student_id' => $faker->randomNumber(5),
        'student_course_id' => $faker->randomNumber(5),
        'subject_id' => $faker->randomNumber(5),
        'subject_type' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\admin_users::class, function (Faker\Generator $faker) {
    return [
        
    ];
});

