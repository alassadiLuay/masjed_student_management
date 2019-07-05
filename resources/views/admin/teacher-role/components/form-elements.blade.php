<div class="form-group row align-items-center" :class="{'has-danger': errors.has('role_name'), 'has-success': this.fields.role_name && this.fields.role_name.valid }">
    <label for="role_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher-role.columns.role_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.role_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('role_name'), 'form-control-success': this.fields.role_name && this.fields.role_name.valid}" id="role_name" name="role_name" placeholder="{{ trans('admin.teacher-role.columns.role_name') }}">
        <div v-if="errors.has('role_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('role_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('notes'), 'has-success': this.fields.notes && this.fields.notes.valid }">
    <label for="notes" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher-role.columns.notes') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.notes" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('notes'), 'form-control-success': this.fields.notes && this.fields.notes.valid}" id="notes" name="notes" placeholder="{{ trans('admin.teacher-role.columns.notes') }}">
        <div v-if="errors.has('notes')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('notes') }}</div>
    </div>
</div>


