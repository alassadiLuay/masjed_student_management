@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.student-attendance.actions.index'))

@section('body')

    <whatsapp-form
        :data="{}"
        :url="'{{ url('admin/teacher-roles') }}'"
        inline-template>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.student-attendance.actions.index') }}
                    </div>
                    <div class="card-body" v-cloak style="direction: rtl;text-align: right;">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col">
                                <h4> إرسال رسالة عبر  whatsapp </h4>
                            </div>
                            <form method="POST" action="{{ url('admin/whatsapp/send_message') }}" style="width: 100%;">
                                 @csrf
                                <div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': this.fields.note && this.fields.note.valid }" style="margin-right: 15px;">
                                    <label for="message" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">الرسالة</label>
                                        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                        <textarea type="text" style="width: 80%;height: 100px;" class="form-control" id="message" name="message" placeholder="نص الرسالة"></textarea>
                                    </div>
                                </div> 
                                <div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': this.fields.note && this.fields.note.valid }" style="margin-right: 15px;">
                                    <label for="receiver_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"> رقم المرسل إليه </label>
                                        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                        <input type="text" style="width: 80%;" class="form-control" id="receiver_number" name="receiver_number" placeholder="مثال : +963911111111"> 
                                        <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-12' : 'col-md-8'">أو من خلال البحث </label>
                                        <autocomplete
                                            style="width: 80%;" autocomplete="off" name="receiver_number_search" class="form-control" placeholder="مثال : محمد أحمد"
                                            :source="getStudentsNumbers"
                                            results-property="data"
                                            results-value="father_phone"
                                              :results-display="formattedDisplay"
                                              v-model="phone_number"
                                              @selected="addDistributionGroup">
                                        </autocomplete>
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
                                              {{ Session::get('message_number') }} -----  
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
@endsection
