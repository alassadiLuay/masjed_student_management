<div class="form-group row align-items-center" :class="{'has-danger': errors.has('username'), 'has-success': this.fields.username && this.fields.username.valid }">
    <label for="username" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">اسم المستخدم </label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.username" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('username'), 'form-control-success': this.fields.username && this.fields.username.valid}" id="username" name="username" placeholder="اسم المستخدم">
        <div v-if="errors.has('username')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('username') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('password'), 'has-success': this.fields.password && this.fields.password.valid }">
    <label for="password" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">رمز المرور</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.password" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password'), 'form-control-success': this.fields.password && this.fields.password.valid}" id="password" name="password" placeholder="رمز المرور">
        <div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_name'), 'has-success': this.fields.teacher_name && this.fields.teacher_name.valid }">
    <label for="teacher_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher.columns.teacher_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher_name'), 'form-control-success': this.fields.teacher_name && this.fields.teacher_name.valid}" id="teacher_name" name="teacher_name" placeholder="{{ trans('admin.teacher.columns.teacher_name') }}">
        <div v-if="errors.has('teacher_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_address'), 'has-success': this.fields.teacher_address && this.fields.teacher_address.valid }">
    <label for="teacher_address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher.columns.teacher_address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher_address" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher_address'), 'form-control-success': this.fields.teacher_address && this.fields.teacher_address.valid}" id="teacher_address" name="teacher_address" placeholder="{{ trans('admin.teacher.columns.teacher_address') }}">
        <div v-if="errors.has('teacher_address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_study'), 'has-success': this.fields.teacher_study && this.fields.teacher_study.valid }">
    <label for="teacher_study" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher.columns.teacher_study') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher_study" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher_study'), 'form-control-success': this.fields.teacher_study && this.fields.teacher_study.valid}" id="teacher_study" name="teacher_study" placeholder="{{ trans('admin.teacher.columns.teacher_study') }}">
        <div v-if="errors.has('teacher_study')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_study') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_speciality'), 'has-success': this.fields.teacher_speciality && this.fields.teacher_speciality.valid }">
    <label for="teacher_speciality" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher.columns.teacher_speciality') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher_speciality" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher_speciality'), 'form-control-success': this.fields.teacher_speciality && this.fields.teacher_speciality.valid}" id="teacher_speciality" name="teacher_speciality" placeholder="{{ trans('admin.teacher.columns.teacher_speciality') }}">
        <div v-if="errors.has('teacher_speciality')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_speciality') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_work'), 'has-success': this.fields.teacher_work && this.fields.teacher_work.valid }">
    <label for="teacher_work" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher.columns.teacher_work') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher_work" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher_work'), 'form-control-success': this.fields.teacher_work && this.fields.teacher_work.valid}" id="teacher_work" name="teacher_work" placeholder="{{ trans('admin.teacher.columns.teacher_work') }}">
        <div v-if="errors.has('teacher_work')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_work') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_extras'), 'has-success': this.fields.teacher_extras && this.fields.teacher_extras.valid }">
    <label for="teacher_extras" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher.columns.teacher_extras') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher_extras" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher_extras'), 'form-control-success': this.fields.teacher_extras && this.fields.teacher_extras.valid}" id="teacher_extras" name="teacher_extras" placeholder="{{ trans('admin.teacher.columns.teacher_extras') }}">
        <div v-if="errors.has('teacher_extras')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_extras') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_note'), 'has-success': this.fields.teacher_note && this.fields.teacher_note.valid }">
    <label for="teacher_note" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher.columns.teacher_note') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher_note" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher_note'), 'form-control-success': this.fields.teacher_note && this.fields.teacher_note.valid}" id="teacher_note" name="teacher_note" placeholder="{{ trans('admin.teacher.columns.teacher_note') }}">
        <div v-if="errors.has('teacher_note')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_note') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_mobile'), 'has-success': this.fields.teacher_mobile && this.fields.teacher_mobile.valid }">
    <label for="teacher_mobile" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher.columns.teacher_mobile') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher_mobile" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher_mobile'), 'form-control-success': this.fields.teacher_mobile && this.fields.teacher_mobile.valid}" id="teacher_mobile" name="teacher_mobile" placeholder="{{ trans('admin.teacher.columns.teacher_mobile') }}">
        <div v-if="errors.has('teacher_mobile')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_mobile') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_phone'), 'has-success': this.fields.teacher_phone && this.fields.teacher_phone.valid }">
    <label for="teacher_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher.columns.teacher_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher_phone" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher_phone'), 'form-control-success': this.fields.teacher_phone && this.fields.teacher_phone.valid}" id="teacher_phone" name="teacher_phone" placeholder="{{ trans('admin.teacher.columns.teacher_phone') }}">
        <div v-if="errors.has('teacher_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('birthdate'), 'has-success': this.fields.birthdate && this.fields.birthdate.valid }">
    <label for="birthdate" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher.columns.birthdate') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.birthdate" :config="datePickerConfig" format="dd-MMM-yyyy hh:mm a" class="flatpickr" :class="{'form-control-danger': errors.has('birthdate'), 'form-control-success': this.fields.birthdate && this.fields.birthdate.valid}" id="birthdate" name="birthdate" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('birthdate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birthdate') }}</div>
    </div>
</div>


