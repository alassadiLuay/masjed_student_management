<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('school_name'), 'has-success': this.fields.school_name && this.fields.school_name.valid }">
    <label for="school_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student-class.columns.school_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.school_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('school_name'), 'form-control-success': this.fields.school_name && this.fields.school_name.valid}" id="school_name" name="school_name" placeholder="{{ trans('admin.student-class.columns.school_name') }}">
        <div v-if="errors.has('school_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('school_name') }}</div>
    </div>
</div> -->
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('class_name'), 'has-success': this.fields.class_name && this.fields.class_name.valid }">
    <label for="class_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student-class.columns.class_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.class_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('class_name'), 'form-control-success': this.fields.class_name && this.fields.class_name.valid}" id="class_name" name="class_name" placeholder="{{ trans('admin.student-class.columns.class_name') }}">
        <div v-if="errors.has('class_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('class_name') }}</div>
    </div>
</div>
