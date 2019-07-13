<?php 
  $current_url = Request::path();
  if (strpos($current_url, 'semesters') !== false || strpos($current_url, 'courses') !== false || strpos($current_url, 'exams') !== false)
      $homeSubmenu = true;
  else if (strpos($current_url, 'teachers') !== false || strpos($current_url, 'teacher-roles') !== false || strpos($current_url, 'teacher-courses') !== false)
      $teacherSubmenu = true;
  else if (strpos($current_url, 'students') !== false || strpos($current_url, 'student-classes') !== false || strpos($current_url, 'course-students') !== false)
      $studentSubmenu = true;  
  else if (strpos($current_url, 'marks') !== false || strpos($current_url, 'student-notes') !== false || strpos($current_url, 'student-attendances') !== false || strpos($current_url, 'student-points') !== false || strpos($current_url, 'listened-subjects') !== false)
      $studentProgSubmenu = true;
  else if (strpos($current_url, 'point-types') !== false || strpos($current_url, 'point-configs') !== false)
      $pointSubmenu = true;   
  else if (strpos($current_url, 'awqafs') !== false || strpos($current_url, 'awqaf-students') !== false)
      $awqafSubmenu = true;   
  else if (strpos($current_url, 'whatsapp') !== false)
      $whatsappSubmenu = true;   
?>
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>

    <li class="active">
      <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="<?php if(isset($homeSubmenu)) echo "true"; else echo "false";?>" class="nav-link " style="font-size: 12px;font-weight: 600;">
        <i class="nav-icon icon-home"></i>إدارة الفصول</a>    
       <ul class="collapse <?php if(isset($homeSubmenu)) echo "show";?> list-unstyled" id="homeSubmenu">
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/semesters') }}" style="margin-left: 15px;"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.semester.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/courses') }}" style="margin-left: 15px;"><i class="nav-icon icon-book-open"></i> {{ trans('admin.course.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/exams') }}" style="margin-left: 15px;"><i class="nav-icon icon-pencil"></i> {{ trans('admin.exam.title') }}</a></li>
      </ul>
    </li>
    <li class="nav-divider"></li>
    <li>
      <a href="#teacherSubmenu" data-toggle="collapse" aria-expanded="<?php if(isset($teacherSubmenu)) echo "true"; else echo "false";?>" class="nav-link collapsed" style="font-size: 12px;font-weight: 600;">
        <i class="nav-icon icon-people"></i>إدارة الأساتذة</a>    
       <ul class="collapse  <?php if(isset($teacherSubmenu)) echo "show";?> list-unstyled" id="teacherSubmenu">
          <li class="nav-item"><a class="nav-link" href="{{ url('admin/teachers') }}" style="margin-left: 15px;"><i class="nav-icon icon-user"></i> {{ trans('admin.teacher.title') }}</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('admin/teacher-roles') }}" style="margin-left: 15px;"><i class="nav-icon icon-settings"></i> {{ trans('admin.teacher-role.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/teacher-courses') }}" style="margin-left: 15px;"><i class="nav-icon icon-layers"></i> {{ trans('admin.teacher-course.title') }}</a></li>
      </ul>
    </li>
    <li class="nav-divider"></li>
    <li>
      <a href="#studentSubmenu" data-toggle="collapse" aria-expanded="<?php if(isset($studentSubmenu)) echo "true"; else echo "false";?>" class="nav-link collapsed" style="font-size: 12px;font-weight: 600;">
        <i class="nav-icon icon-emotsmile"></i>إدارة الطلاب</a>    
       <ul class="collapse  <?php if(isset($studentSubmenu)) echo "show";?>  list-unstyled" id="studentSubmenu">
          <li class="nav-item"><a class="nav-link" href="{{ url('admin/students') }}" style="margin-left: 15px;"><i class="nav-icon icon-emotsmile"></i> {{ trans('admin.student.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/student-classes') }}" style="margin-left: 15px;"><i class="nav-icon icon-star"></i> {{ trans('admin.student-class.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/course-students') }}" style="margin-left: 15px;"><i class="nav-icon icon-graduation"></i> {{ trans('admin.course-student.title') }}</a></li>
      </ul>
    </li>
    <li class="nav-divider"></li>
    <li>
      <a href="#studentProgSubmenu" data-toggle="collapse" aria-expanded="<?php if(isset($studentProgSubmenu)) echo "true"; else echo "false";?>" class="nav-link collapsed" style="font-size: 12px;font-weight: 600;">
        <i class="nav-icon icon-graduation"></i>متابعة الطلاب</a>    
       <ul class="collapse <?php if(isset($studentProgSubmenu)) echo "show";?> list-unstyled" id="studentProgSubmenu">
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/marks') }}" style="margin-left: 15px;"><i class="nav-icon icon-docs"></i> {{ trans('admin.mark.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/student-notes') }}" style="margin-left: 15px;"><i class="nav-icon icon-note"></i> {{ trans('admin.student-note.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/student-attendances') }}" style="margin-left: 15px;"><i class="nav-icon icon-clock"></i> {{ trans('admin.student-attendance.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/student-points') }}" style="margin-left: 15px;"><i class="nav-icon icon-badge"></i> {{ trans('admin.student-point.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/listened-subjects') }}" style="margin-left: 15px;"><i class="nav-icon icon-book-open"></i> {{ trans('admin.listened-subject.title') }}</a></li>
      </ul>
    </li>
    <li class="nav-divider"></li>
    <li>
      <a href="#pointSubmenu" data-toggle="collapse" aria-expanded="<?php if(isset($pointSubmenu)) echo "true"; else echo "false";?>" class="nav-link collapsed" style="font-size: 12px;font-weight: 600;">
        <i class="nav-icon icon-badge"></i>إدارة النقاط</a>    
       <ul class="collapse  <?php if(isset($pointSubmenu)) echo "show";?> list-unstyled" id="pointSubmenu">
          <li class="nav-item"><a class="nav-link" href="{{ url('admin/point-types') }}" style="margin-left: 15px;"><i class="nav-icon icon-star"></i> {{ trans('admin.point-type.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/point-configs') }}" style="margin-left: 15px;"><i class="nav-icon icon-magic-wand"></i> {{ trans('admin.point-config.title') }}</a></li>
      </ul>
    </li>
    <li class="nav-divider"></li>
    <li>
      <a href="#awqafSubmenu" data-toggle="collapse" aria-expanded="<?php if(isset($awqafSubmenu)) echo "true"; else echo "false";?>" class="nav-link collapsed" style="font-size: 12px;font-weight: 600;">
        <i class="nav-icon icon-book-open"></i>اختبارات الأوقاف</a>    
       <ul class="collapse  <?php if(isset($awqafSubmenu)) echo "show";?>  list-unstyled" id="awqafSubmenu">
          <li class="nav-item"><a class="nav-link" href="{{ url('admin/awqafs') }}" style="margin-left: 15px;"><i class="nav-icon icon-settings"></i> {{ trans('admin.awqaf.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/awqaf-students') }}" style="margin-left: 15px;"><i class="nav-icon icon-star"></i> {{ trans('admin.awqaf-student.title') }}</a></li>
      </ul>
    </li> 
    <li>
      <a href="#whatsappSubmenu" data-toggle="collapse" aria-expanded="<?php if(isset($whatsappSubmenu)) echo "true"; else echo "false";?>" class="nav-link collapsed" style="font-size: 12px;font-weight: 600;">
        <i class="nav-icon icon-book-open"></i>Whatsapp رسائل</a>    
       <ul class="collapse  <?php if(isset($whatsappSubmenu)) echo "show";?>  list-unstyled" id="whatsappSubmenu">
          <li class="nav-item"><a class="nav-link" href="{{ url('admin/whatsapp') }}" style="margin-left: 15px;"><i class="nav-icon icon-phone"></i> whatsapp </a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('admin/whatsapp/multiCast') }}" style="margin-left: 15px;"><i class="nav-icon icon-phone"></i> advanced whatsapp </a></li>
      </ul>
    </li>
<!--            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin_users') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.admin_users.title') }}</a></li> -->
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage users') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
