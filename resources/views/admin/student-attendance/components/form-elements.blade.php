<div class="form-group row align-items-center" :class="{'has-danger': errors.has('semester_name'), 'has-success': this.fields.semester_name && this.fields.semester_name.valid }">
    <label for="semester_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.semester.columns.semester_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.semester_name" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('semester_name'), 'form-control-success': this.fields.semester_name && this.fields.semester_name.valid}" id="semester_name" @change="semester_courses($event)">
            @foreach ($semesters as $option)
                <option value="{{ $option->id }}" <?php if(isset($selected_semester) && isset($selected_semester[0])&& $selected_semester[0]->course->semester_id == $option->id) echo "selected"?>> {{ $option->semester_name }} </option>
            @endforeach
        </select>
        <div v-if="errors.has('semester_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('semester_name') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_id'), 'has-success': this.fields.course_id && this.fields.course_id.valid }">
    <label for="course_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.course_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.course_id" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('course_id'), 'form-control-success': this.fields.course_id && this.fields.course_id.valid}" id="course_id" name="course_id" @change="studentsFetcher($event)">
            <option v-for="option in options" :value="option.id">@{{ option.course_name }}</option>
        </select>
        <div v-if="errors.has('course_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('course_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_id'), 'has-success': this.fields.student_id }">
    <label for="student_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <Multiselect v-model="form.student_id" v-validate="'required'" :custom-label="nameWithAddress" :options="students_data" :track-by="options.id" :searchable="true" :close-on-select="true" class="form-control" :class="{'form-control-danger': errors.has('student_id'), 'form-control-success': this.fields.student_id}" id="student_id">
        </Multiselect >
        <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('created_at'), 'has-success': this.fields.created_at && this.fields.created_at.valid }">
    <label for="created_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student-attendance.columns.created_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.created_at" :config="datePickerConfig" format="dd-MMM-yyyy hh:mm a"
    :hour-time="12" class="flatpickr" :class="{'form-control-danger': errors.has('created_at'), 'form-control-success': this.fields.created_at && this.fields.created_at.valid}" id="created_at" name="created_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('created_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('created_at') }}</div>
    </div>
</div>
<div class="form-check row" :class="{'has-danger': errors.has('is_late'), 'has-success': this.fields.is_late && this.fields.is_late.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_late" type="checkbox" v-model="form.is_late" v-validate="''" data-vv-name="is_late"  name="is_late_fake_element">
        <label class="form-check-label" for="is_late">
            is_late
        </label>
        <input type="hidden" name="is_late" :value="form.is_late">
        <div v-if="errors.has('is_late')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_late') }}</div>
    </div>
</div>