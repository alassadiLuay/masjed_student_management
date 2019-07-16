@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.student-point.actions.index'))

@section('body')
    <student-report-form>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body" style="direction: rtl;text-align: right;">
                        <form>
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
                            <button type="submit">نتيجة التقرير</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </student-report-form>    
@endsection