@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.student-attendance.actions.index'))

@section('body')

    <student-attendance-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/student-attendances') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.student-attendance.actions.index') }}
                        <a class="btn btn-info btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/student-attendances/send_whatsapp_messages?attend='.$attend.'&course_id='.$course_id.'&date='.$date) }}" style="color: white;" role="button"><i class="fa fa-send"></i>&nbsp; إشعار الأهل بالتقرير عبر واتس آب</a>

                        <!-- Button to Open the Modal -->
                        @if(Session::has('whats_app_message_report'))
                            <a class="btn btn-warning btn-spinner btn-sm pull-right m-b-0" id="myH1" style="color: white;margin-right: 1%;" data-toggle="modal" data-target="#myModal">
                              عرض تقارير الإرسال
                            </a>
                        @endif
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="row" style="margin-bottom: 15px;">
                            <student-attendance-form :action="'{{ url('admin/student-attendances') }}'" inline-template>
                            <?php if($attend): ?>
                                <form method="get" action="{{ url('admin/student-attendances/today_attend_report') }}">
                            <?php else: ?>
                                <form method="get" action="{{ url('admin/student-attendances/today_absance_report') }}">
                            <?php endif; ?>
                                <div class="col">
                                    <label>تعديل التاريخ أو  الحلقة</label>

                                    <div class="form-group row align-items-center">
                                        <label for="semester_name" class="col-form-label text-md-right" style="margin-left: 13px;">اسم الفصل</label>
                                        <div class="col-md-12">
                                            <select class="form-control" id="semester_name" @change="semester_courses($event)">
                                                <option value="-1"> اختر فصل </option>
                                                @foreach ($semesters as $option)
                                                    <option value="{{ $option->id }}"> {{ $option->semester_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="course_id" class="col-form-label text-md-right"  style="margin-left: 13px;">اسم الحلقة</label>
                                            <div class="col-md-12">
                                            <select class="form-control" id="course_id" name="course_id" @change="studentsFetcher($event)">
                                                <option v-for="option in options" :value="option.id">@{{ option.course_name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group align-items-center" >
                                        <label for="created_at" class="col-form-label text-md-right" >التاريخ</label>
                                            <div class="input-group input-group--custom">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <datetime :config="datePickerConfig" format="dd-MMM-yyyy hh:mm a"
                                        :hour-time="12" class="flatpickr" name="created_at" ></datetime>
                                            </div>
                                    </div>
                                </div>    
                                <div class="col">
                                    <?php if($attend): ?>
                                        <button class="btn btn-success btn-spinner btn-sm pull-right m-b-0" style="margin-right: 5px;color: white;" role="button"><i class="fa fa-arrow-right"></i>&nbsp; تقرير الحضور اليوم</button>
                                    <?php else: ?>
                                        <button class="btn btn-warning btn-spinner btn-sm pull-right m-b-0" style="margin-right: 5px;color: white;" href="{{ url('admin/student-attendances/today_absance_report') }}" role="button"><i class="fa fa-arrow-right"></i>&nbsp; تقرير غيابات اليوم</button>  
                                    <?php endif; ?>  
                                </div>    
                            </form>
                            </student-attendance-form>
                        </div>    
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-auto form-group ">
                                    <select class="form-control" v-model="pagination.state.per_page">
                                        
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                            </div>
                        </form>

                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>
                                    <th is='sortable' :column="'id'">id </th>
                                    <th is='sortable' :column="'semester_name'">{{ trans('admin.semester.columns.semester_name') }}</th>
                                    <th is='sortable' :column="'course_name'">{{ trans('admin.course.columns.course_name') }}</th>
                                    <th is='sortable' :column="'student_fname'">{{ trans('admin.student.columns.student_fname') }}</th>
                                    <?php if($attend): ?>
                                        <th is='sortable' :column="'is_late'">is_late</th>
                                        <th is='sortable' :column="'created_at'">created_at</th>
                                    <?php endif; ?>    
                                    <th is='sortable' :column="'father_phone'">{{ trans('admin.student.columns.father_phone') }}</th>
                                    <th>نص الرسالة </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.semester_name }}</td>
                                    <td>@{{ item.course_name }}</td>
                                    <td>@{{ item.student_fname }} @{{item.student_lname}}</td>
                                    <?php if($attend): ?>
                                        <td>@{{ item.is_late }}</td>
                                        <td>@{{ item.created_at }}</td>
                                    <?php endif; ?>    
                                    <td>@{{ item.father_phone }}</td>
                                    <td>
                                        <?php if(!$attend): ?>
                                            السلام عليكم ورحمة الله وبركاته<br>
                                            لم يحضر الطالب  @{{ item.student_fname }} @{{item.student_lname}}<br>
                                            تاريخ {{Date("d-m-Y")}}<br>
                                            إدارة مسجد الشمسية
                                        <?php else: ?>
                                            السلام عليكم ورحمة الله وبركاته<br>
                                            نود إعلامكم بحضور الطالب @{{ item.student_fname }} @{{item.student_lname}}<br>
                                            اليوم تاريخ @{{item.created_at}}<br>
                                            إدارة مسجد الشمسية     
                                        <?php endif; ?> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

	                    <div class="no-items-found" v-if="!collection.length > 0">
		                    <i class="icon-magnifier"></i>
		                    <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
		                    <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/student-attendances/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.student-attendance.actions.create') }}</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </student-attendance-listing>

    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header" style="direction: rtl;text-align: right;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">تقرير الإرسال</h4>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            @if(Session::has('whats_app_message_report'))
                <?php $i=0; $sendingResults = Session::get('whats_app_message_report'); ?>
                <?php if(sizeof($sendingResults) > 0) :?>
                <table class="table table-hover table-listing" style="direction: rtl;text-align: right;">
                    <thead>
                        <tr>
                            <th>id </th>
                            <th>الطالب</th>
                            <th>حالة الرسالة </th>
                            <th>الرقم المرسل إليه</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sendingResults as $row) { ?>
                        <tr <?php if($row['status_id'] != 200 ) echo 'style="background-color: antiquewhite;"'; ?> >
                            <td><?= $i++ ?></td>
                            <td><?= $row['student_name'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <?php if($row['status_id'] == 200 ): ?>
                                <td><?= $row['sent'] ?></td>
                            <?php else:?>
                                <td><?= $row['f_sent'][0]." <-> ".$row['f_sent'][1] ?></td>    
                            <?php endif; ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <center>نتيجة التقرير فارغة</center>
                <?php endif; ?>
            @endif
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="modal_closed()">Close</button>
          </div>

        </div>
      </div>
    </div>
    <script type="text/javascript">
        function modal_closed() {
            // body...
            setTimeout(document.getElementById("myH1").style = "color: white;margin-right: 1%;",30);
        }
    </script>
@endsection