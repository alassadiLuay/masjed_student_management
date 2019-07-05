<?php

return [
    'class' => [
        'title' => 'Class',

        'actions' => [
            'index' => 'Class',
            'create' => 'New Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'school_name' => "School name",
            'class_name' => "Class name",
            
        ],
    ],

    'course' => [
        'title' => 'Course',

        'actions' => [
            'index' => 'Course',
            'create' => 'New Course',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'course_name' => "Course name",
            'description' => "Description",
            'started_at' => "Started at",
            'end_at' => "End at",
            'session_number' => "Session number",
            'enabled' => "Enabled",
            
        ],
    ],

    'exam' => [
        'title' => 'Exam',

        'actions' => [
            'index' => 'Exam',
            'create' => 'New Exam',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'course_id' => "Course",
            'exam_name' => "Exam name",
            'exam_max_num' => "Exam max num",
            'exam_min_num' => "Exam min num",
            
        ],
    ],

    'semester' => [
        'title' => 'Semester',

        'actions' => [
            'index' => 'Semester',
            'create' => 'New Semester',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'semester_name' => "Semester name",
            'description' => "Description",
            'started_at' => "Started at",
            'end_at' => "End at",
            'enabled' => "Enabled",
            
        ],
    ],

    'student' => [
        'title' => 'Student',

        'actions' => [
            'index' => 'Student',
            'create' => 'New Student',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'student_fname' => "Student fname",
            'student_lname' => "Student lname",
            'student_father_name' => "Student father name",
            'student_address' => "Student address",
            'student_father_job' => "Student father job",
            'student_nationality' => "Student nationality",
            'father_phone' => "Father phone",
            'student_phone' => "Student phone",
            'home_phone' => "Home phone",
            'transportation' => "Transportation",
            'student_photo' => "Student photo",
            'note' => "Note",
            'status' => "Status",
            'has_id' => "Has",
            'student_birthdate' => "Student birthdate",
            
        ],
    ],

    'teacher' => [
        'title' => 'Teacher',

        'actions' => [
            'index' => 'Teacher',
            'create' => 'New Teacher',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'user_id' => "User",
            'teacher_name' => "Teacher name",
            'teacher_address' => "Teacher address",
            'teacher_study' => "Teacher study",
            'teacher_speciality' => "Teacher speciality",
            'teacher_work' => "Teacher work",
            'teacher_extras' => "Teacher extras",
            'teacher_note' => "Teacher note",
            'teacher_mobile' => "Teacher mobile",
            'teacher_phone' => "Teacher phone",
            'birthdate' => "Birthdate",
            
        ],
    ],

    'class' => [
        'title' => 'Classes',

        'actions' => [
            'index' => 'Classes',
            'create' => 'New Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'school_name' => "School name",
            'class_name' => "Class name",
            
        ],
    ],

    'std-class' => [
        'title' => 'Std Class',

        'actions' => [
            'index' => 'Std Class',
            'create' => 'New Std Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            
        ],
    ],

    'stdclass' => [
        'title' => 'Stdclass',

        'actions' => [
            'index' => 'Stdclass',
            'create' => 'New Stdclass',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            
        ],
    ],

    'student-class' => [
        'title' => 'Student Class',

        'actions' => [
            'index' => 'Student Class',
            'create' => 'New Student Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            
        ],
    ],

    'course-student' => [
        'title' => 'Course Student',

        'actions' => [
            'index' => 'Course Student',
            'create' => 'New Course Student',
            'create-multi' => 'New Course Students',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            
        ],
    ],

    'teacher-role' => [
        'title' => 'Teacher Roles',

        'actions' => [
            'index' => 'Teacher Roles',
            'create' => 'New Teacher Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'role_name' => "Role name",
            'notes' => "Notes",
            
        ],
    ],

    'teacher-course' => [
        'title' => 'Teacher Course',

        'actions' => [
            'index' => 'Teacher Course',
            'create' => 'New Teacher Course',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'teacher_id' => "Teacher",
            'course_id' => "Course",
            
        ],
    ],

    'point-type' => [
        'title' => 'Point Types',

        'actions' => [
            'index' => 'Point Types',
            'create' => 'New Point Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'type_name' => "Type name",
            'notes' => "Notes",
            
        ],
    ],

    'point-config' => [
        'title' => 'Point Configs',

        'actions' => [
            'index' => 'Point Configs',
            'create' => 'New Point Config',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'point_name' => "Point name",
            'point_value' => "Point value",
            'notes' => "Notes",
            
        ],
    ],

    'point-config' => [
        'title' => 'Point Configs',

        'actions' => [
            'index' => 'Point Configs',
            'create' => 'New Point Config',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'point_type_id' => "Point type",
            'point_name' => "Point name",
            'point_value' => "Point value",
            'notes' => "Notes",
            
        ],
    ],

    'point-type' => [
        'title' => 'Point Types',

        'actions' => [
            'index' => 'Point Types',
            'create' => 'New Point Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'type_name' => "Type name",
            'notes' => "Notes",
            
        ],
    ],

    'point-config' => [
        'title' => 'Point Configs',

        'actions' => [
            'index' => 'Point Configs',
            'create' => 'New Point Config',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'point_type_id' => "Point type",
            'point_name' => "Point name",
            'point_value' => "Point value",
            'notes' => "Notes",
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];