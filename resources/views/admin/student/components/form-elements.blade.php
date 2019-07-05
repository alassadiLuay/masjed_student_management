<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_fname'), 'has-success': this.fields.student_fname && this.fields.student_fname.valid }">
    <label for="student_fname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_fname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_fname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_fname'), 'form-control-success': this.fields.student_fname && this.fields.student_fname.valid}" id="student_fname" name="student_fname" placeholder="{{ trans('admin.student.columns.student_fname') }}">
        <div v-if="errors.has('student_fname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_fname') }}</div>
    </div>
</div>
<!--
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_lname'), 'has-success': this.fields.student_lname && this.fields.student_lname.valid }">
    <label for="student_lname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_lname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="hidden" v-model="form.student_lname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_lname'), 'form-control-success': this.fields.student_lname && this.fields.student_lname.valid}" id="student_lname" name="student_lname" placeholder="{{ trans('admin.student.columns.student_lname') }}">
        <div v-if="errors.has('student_lname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_lname') }}</div>
    </div>
</div>
-->
<input type="hidden" v-model="form.student_lname" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_lname'), 'form-control-success': this.fields.student_lname && this.fields.student_lname.valid}" id="student_lname" name="student_lname" value="0">
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_father_name'), 'has-success': this.fields.student_father_name && this.fields.student_father_name.valid }">
    <label for="student_father_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_father_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_father_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_father_name'), 'form-control-success': this.fields.student_father_name && this.fields.student_father_name.valid}" id="student_father_name" name="student_father_name" placeholder="{{ trans('admin.student.columns.student_father_name') }}">
        <div v-if="errors.has('student_father_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_father_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_address'), 'has-success': this.fields.student_address && this.fields.student_address.valid }">
    <label for="student_address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_address" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_address'), 'form-control-success': this.fields.student_address && this.fields.student_address.valid}" id="student_address" name="student_address" placeholder="{{ trans('admin.student.columns.student_address') }}">
        <div v-if="errors.has('student_address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_father_job'), 'has-success': this.fields.student_father_job && this.fields.student_father_job.valid }">
    <label for="student_father_job" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_father_job') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_father_job" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_father_job'), 'form-control-success': this.fields.student_father_job && this.fields.student_father_job.valid}" id="student_father_job" name="student_father_job" placeholder="{{ trans('admin.student.columns.student_father_job') }}">
        <div v-if="errors.has('student_father_job')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_father_job') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_nationality'), 'has-success': this.fields.student_nationality && this.fields.student_nationality.valid }">
    <label for="student_nationality" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_nationality') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_nationality" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_nationality'), 'form-control-success': this.fields.student_nationality && this.fields.student_nationality.valid}" id="student_nationality" name="student_nationality" placeholder="{{ trans('admin.student.columns.student_nationality') }}">
        <div v-if="errors.has('student_nationality')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_nationality') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('father_phone'), 'has-success': this.fields.father_phone && this.fields.father_phone.valid }">
    <label for="father_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.father_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.father_phone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('father_phone'), 'form-control-success': this.fields.father_phone && this.fields.father_phone.valid}" id="father_phone" name="father_phone" placeholder="{{ trans('admin.student.columns.father_phone') }}">
        <div v-if="errors.has('father_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('father_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_phone'), 'has-success': this.fields.student_phone && this.fields.student_phone.valid }">
    <label for="student_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_phone" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_phone'), 'form-control-success': this.fields.student_phone && this.fields.student_phone.valid}" id="student_phone" name="student_phone" placeholder="{{ trans('admin.student.columns.student_phone') }}">
        <div v-if="errors.has('student_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('home_phone'), 'has-success': this.fields.home_phone && this.fields.home_phone.valid }">
    <label for="home_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.home_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.home_phone" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('home_phone'), 'form-control-success': this.fields.home_phone && this.fields.home_phone.valid}" id="home_phone" name="home_phone" placeholder="{{ trans('admin.student.columns.home_phone') }}">
        <div v-if="errors.has('home_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('home_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('transportation'), 'has-success': this.fields.transportation && this.fields.transportation.valid }">
    <label for="transportation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.transportation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.transportation" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('transportation'), 'form-control-success': this.fields.transportation && this.fields.transportation.valid}" id="transportation" name="transportation" placeholder="{{ trans('admin.student.columns.transportation') }}">
        <div v-if="errors.has('transportation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('transportation') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_photo'), 'has-success': this.fields.student_photo && this.fields.student_photo.valid }">
    <label for="student_photo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_photo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_photo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_photo'), 'form-control-success': this.fields.student_photo && this.fields.student_photo.valid}" id="student_photo" name="student_photo" placeholder="{{ trans('admin.student.columns.student_photo') }}">
        <div v-if="errors.has('student_photo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_photo') }}</div>
    </div>
</div> -->
<input type="hidden" v-model="form.student_photo" value="defualt.jpg">

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': this.fields.note && this.fields.note.valid }">
    <label for="note" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.note') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.note" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('note'), 'form-control-success': this.fields.note && this.fields.note.valid}" id="note" name="note" placeholder="{{ trans('admin.student.columns.note') }}">
        <div v-if="errors.has('note')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('note') }}</div>
    </div>
</div>

<!-- <div class="form-check row" :class="{'has-danger': errors.has('status'), 'has-success': this.fields.status && this.fields.status.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="status" type="checkbox" v-model="form.status" v-validate="''" data-vv-name="status"  name="status_fake_element">
        <label class="form-check-label" for="status">
            {{ trans('admin.student.columns.status') }}
        </label>
        <input type="hidden" name="status" :value="form.status">
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('has_id'), 'has-success': this.fields.has_id && this.fields.has_id.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="has_id" type="checkbox" v-model="form.has_id" v-validate="''" data-vv-name="has_id"  name="has_id_fake_element">
        <label class="form-check-label" for="has_id">
            {{ trans('admin.student.columns.has_id') }}
        </label>
        <input type="hidden" name="has_id" :value="form.has_id">
        <div v-if="errors.has('has_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('has_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_birthdate'), 'has-success': this.fields.student_birthdate && this.fields.student_birthdate.valid }">
    <label for="student_birthdate" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_birthdate') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.student_birthdate" :config="datePickerConfig" class="flatpickr" :class="{'form-control-danger': errors.has('student_birthdate'), 'form-control-success': this.fields.student_birthdate && this.fields.student_birthdate.valid}" id="student_birthdate" name="student_birthdate" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('student_birthdate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_birthdate') }}</div>
    </div>
</div>


