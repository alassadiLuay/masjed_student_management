<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_id'), 'has-success': this.fields.student_id }">
    <label for="student_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <Multiselect v-model="form.student_id" v-validate="'required'" :custom-label="nameWithAddress" :options="students_data" :track-by="options.id" :searchable="true" :close-on-select="true" class="form-control" :class="{'form-control-danger': errors.has('student_id'), 'form-control-success': this.fields.student_id}" id="student_id">
        </Multiselect >
        <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('awqaf_id'), 'has-success': this.fields.awqaf_id }">
    <label for="awqaf_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.awaqafs.columns.test_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <Multiselect v-model="form.awqaf_id" v-validate="'required'" :custom-label="awqafNames" :options="awqaf_data" :track-by="awqaf_data.id" :searchable="true" :close-on-select="true" class="form-control" :class="{'form-control-danger': errors.has('awqaf_id'), 'form-control-success': this.fields.awqaf_id}" id="awqaf_id">
        </Multiselect >
        <div v-if="errors.has('awqaf_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('awqaf_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_mark'), 'has-success': this.fields.student_mark && this.fields.student_mark.valid }">
    <label for="student_mark" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.awaqaf-student.columns.student_mark') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_mark" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_mark'), 'form-control-success': this.fields.student_mark && this.fields.student_mark.valid}" id="student_mark" name="student_mark" placeholder="{{ trans('admin.student_mark.columns.student_mark') }}">
        <div v-if="errors.has('student_mark')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_mark') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('full_mark'), 'has-success': this.fields.full_mark && this.fields.full_mark.valid }">
    <label for="full_mark" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.awaqaf-student.columns.full_mark') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.full_mark" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('full_mark'), 'form-control-success': this.fields.full_mark && this.fields.full_mark.valid}" id="full_mark" name="full_mark" placeholder="{{ trans('admin.full_mark.columns.full_mark') }}">
        <div v-if="errors.has('full_mark')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('full_mark') }}</div>
    </div>
</div>
<div class="form-check row" :class="{'has-danger': errors.has('is_passed'), 'has-success': this.fields.is_passed && this.fields.is_passed.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_passed" type="checkbox" v-model="form.is_passed" v-validate="''" data-vv-name="is_passed"  name="is_passed_fake_element">
        <label class="form-check-label" for="is_passed">
            {{ trans('admin.awaqaf-student.columns.is_passed') }}
        </label>
        <input type="hidden" name="is_passed" :value="form.is_passed">
        <div v-if="errors.has('is_passed')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_passed') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('created_at'), 'has-success': this.fields.created_at && this.fields.created_at.valid }">
    <label for="created_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.semester.columns.created_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.created_at" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('created_at'), 'form-control-success': this.fields.created_at && this.fields.created_at.valid}" id="created_at" name="created_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('created_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('created_at') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subject_type'), 'has-success': this.fields.subject_type && this.fields.subject_type.valid }">
    <label for="subject_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher-course.columns.subject_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.subject_type" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('subject_type'), 'form-control-success': this.fields.subject_type && this.fields.subject_type.valid}" id="subject_type" @change="subjectDetailsFetcher($event)">
                <option value="juza"> تسميع جزء </option>
                <option value="surah"> تسميع سوره </option>
                <option value="page"> تسميع صفحة </option>
        </select>
        <div v-if="errors.has('subject_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('subject_type') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subject_id'), 'has-success': this.fields.subject_id }">
    <label for="subject_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Subject to Listened : </label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <Multiselect v-model="form.subject_id" v-validate="'required'" :custom-label="subjectNames" :options="subjects_data" :track-by="awqaf_data.id" :searchable="true" :close-on-select="true" class="form-control" :class="{'form-control-danger': errors.has('subject_id'), 'form-control-success': this.fields.subject_id}" id="subject_id">
        </Multiselect >
        <div v-if="errors.has('subject_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('subject_id') }}</div>
    </div>
</div>