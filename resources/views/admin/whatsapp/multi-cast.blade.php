@extends('brackets/admin-ui::admin.layout.default')

@section('title', 'إرسال رسائل جماعية ')

@section('body')

    <whatsapp-form
        :data="{}"
        :url="'{{ url('admin/teacher-roles') }}'"
        inline-template>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>ارسال رسائل جماعية  <!-- {{ trans('admin.student-attendance.actions.index') }} -->
                        @if(Session::has('whats_app_message_report'))
                            <a class="btn btn-warning btn-spinner btn-sm pull-right m-b-0" id="myH1" style="color: white;margin-right: 1%;" data-toggle="modal" data-target="#myModal">
                              عرض تقارير الإرسال
                            </a>
                        @endif
                    </div>
                    <div class="card-body" v-cloak style="direction: rtl;text-align: right;">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col">
                                <h4> إرسال رسالة عبر  whatsapp </h4>
                            </div>
                            <form method="POST" action="{{ url('admin/whatsapp/send_multi_message') }}" style="width: 100%;">
                                 @csrf
                                <div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': this.fields.note && this.fields.note.valid }" style="margin-right: 15px;">
                                    <label for="message" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">الرسالة</label>
                                        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                            <textarea type="text" style="width: 80%;height: 100px;direction: rtl;text-align: right;" class="form-control" id="message" name="message" placeholder="نص الرسالة"></textarea>
                                            <button @click="appendSTDName($event)" class="btn btn-warning" style="color: white;margin-top: 5px;" title="يتم استبدال هذا الرمز باسم الطالب">اسم الطالب</button>
                                        </div>  
                                </div> 
                                <div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': this.fields.note && this.fields.note.valid }" style="margin-right: 15px;">
                                    <label for="receiver_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"> رقم المرسل إليه </label>
                                        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                            <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-12' : 'col-md-8'">يمكنك اختيار اسم أو مجموعة أسماء </label>
                                            <autocomplete
                                                style="width: 80%;" autocomplete="off" class="form-control" placeholder="مثال : محمد أحمد"
                                                :source="getStudentsNumbers"
                                                results-property="data"
                                                results-value="father_phone"
                                                  :results-display="formattedDisplay"
                                                  v-model="phone_number"
                                                  @selected="addDistributionGroup">
                                            </autocomplete>
                                        </div>
                                        <input type="hidden" name="receiver_numbers" v-model="numbersResults()">
                                        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'" style="margin-top: 2%;">
                                            <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-12' : 'col-md-8'" style="margin-right: 26%;">أو قم بإضافة أسماء طلاب عن طريق اختيار حلقة</label>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('semester_name'), 'has-success': this.fields.semester_name && this.fields.semester_name.valid }" style="margin-right: 8%;">
    <label for="semester_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.semester.columns.semester_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" :class="{'form-control-danger': errors.has('semester_name'), 'form-control-success': this.fields.semester_name && this.fields.semester_name.valid}" id="semester_name" @change="semester_courses($event)">
            <option value="-1"> اختر فصل </option>
            @foreach ($semesters as $option)
                <option value="{{ $option->id }}"> {{ $option->semester_name }} </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_id'), 'has-success': this.fields.course_id && this.fields.course_id.valid }" style="margin-right: 8%;">
    <label for="course_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.course_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" :class="{'form-control-danger': errors.has('course_id'), 'form-control-success': this.fields.course_id && this.fields.course_id.valid}" id="course_id" name="course_id" @change="studentsFetcher($event)">
            <option v-for="option in options" :value="option.id">@{{ option.course_name }}</option>
        </select>
    </div>
</div>
                                        </div>
                                </div>
<div class="row">                                    
    <div class="col-md-9" style="margin-right: 10%;"> 
        <table class="table table-hover table-listing" style="margin-top: 5%;">
            <thead>
                <tr>
                    <th :column="'student_name'">اسم الطالب</th>
                    <th :column="'phone_number'">رقم الهاتف المرسل إليه</th>
                    
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in students">
                    <td>@{{ item.student_name }}</td>
                    <td>@{{ item.phone_number }}</td>
                    
                    <td>
                        <div class="row no-gutters">
                            <button @click="removeStudent(item.phone_number,index,$event)" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>    
</div>
                                <div class="form-group row align-items-center" style="margin-right: 15px;">
                                    <button class="btn btn-warning btn-spinner btn-sm pull-right m-b-0" style="margin-right: 5px;color: white;" href="{{ url('admin/student-attendances/today_absance_report') }}" role="button"><i class="fa fa-send"></i>&nbsp; إرسال  </button>  
                                </div>    
                                <hr>
                                    <div class="form-group row align-items-center" style="margin-right: 15px;">
                                        @if(Session::has('message'))
                                            <div class="alert alert-{{ Session::get('message_status') }}">
                                              نتيجة الطلب هي {{ Session::get('message') }}  أثناء إرسال الرسالة 
                                              {{ Session::get('message_value') }}
                                            </div>
                                        @endif
                                    </div>
                                </div> 
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </whatsapp-form>    



        <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog modal-lg">
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
                            <th>الرسالة </th>
                            <th>حالة الرسالة </th>
                            <th>الرقم المرسل إليه</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sendingResults as $row) { ?>
                        <tr <?php if($row['status_id'] != 200 ) echo 'style="background-color: antiquewhite;"'; ?> >
                            <td><?= $i++ ?></td>
                            <td><?= $row['student_name'] ?></td>
                            <td><?= $row['message'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <?php if($row['status_id'] == 200 ): ?>
                                <td><?= $row['sent'] ?></td>
                            <?php else:?>
                                <td><?= $row['f_sent'][0] ?></td>    
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
