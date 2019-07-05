<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_id'), 'has-success': this.fields.student_id }">
    <label for="student_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <Multiselect v-model="form.student_id" v-validate="'required'" :custom-label="nameWithAddress" :options="students_data" :track-by="options.id" :searchable="true" :close-on-select="true" class="form-control" :class="{'form-control-danger': errors.has('student_id'), 'form-control-success': this.fields.student_id}" id="student_id">
        </Multiselect >
        <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': this.fields.note && this.fields.note.valid }">
    <label for="notes" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.note') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.notes" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('note'), 'form-control-success': this.fields.note && this.fields.note.valid}" id="notes" name="notes" placeholder="{{ trans('admin.student.columns.note') }}">
        <div v-if="errors.has('note')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('note') }}</div>
    </div>
</div>