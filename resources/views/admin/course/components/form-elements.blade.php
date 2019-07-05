<div class="form-group row align-items-center" :class="{'has-danger': errors.has('semester_id'), 'has-success': this.fields.course_id && this.fields.semester_id.valid }">
    <label for="semester_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.semester_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.semester_id" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('semester_id'), 'form-control-success': this.fields.semester_id && this.fields.semester_id.valid}" id="semester_id" name="semester_id">
            @foreach ($semesters as $option)
                <option value="{{ $option->id }}"> {{ $option->semester_name }} </option>
            @endforeach
        </select>
        <div v-if="errors.has('semester_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('semester_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_name'), 'has-success': this.fields.course_name && this.fields.course_name.valid }">
    <label for="course_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.course_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.course_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('course_name'), 'form-control-success': this.fields.course_name && this.fields.course_name.valid}" id="course_name" name="course_name" placeholder="{{ trans('admin.course.columns.course_name') }}">
        <div v-if="errors.has('course_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('course_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': this.fields.description && this.fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('started_at'), 'has-success': this.fields.started_at && this.fields.started_at.valid }">
    <label for="started_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.started_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.started_at" :config="datePickerConfig" format="dd-MMM-yyyy hh:mm a" class="flatpickr" :class="{'form-control-danger': errors.has('started_at'), 'form-control-success': this.fields.started_at && this.fields.started_at.valid}" id="started_at" name="started_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('started_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('started_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_at'), 'has-success': this.fields.end_at && this.fields.end_at.valid }">
    <label for="end_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.end_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end_at" :config="datePickerConfig" format="dd-MMM-yyyy hh:mm a" class="flatpickr" :class="{'form-control-danger': errors.has('end_at'), 'form-control-success': this.fields.end_at && this.fields.end_at.valid}" id="end_at" name="end_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('end_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('session_number'), 'has-success': this.fields.session_number && this.fields.session_number.valid }">
    <label for="session_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.session_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.session_number" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('session_number'), 'form-control-success': this.fields.session_number && this.fields.session_number.valid}" id="session_number" name="session_number" placeholder="{{ trans('admin.course.columns.session_number') }}">
        <div v-if="errors.has('session_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('session_number') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': this.fields.enabled && this.fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.course.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


