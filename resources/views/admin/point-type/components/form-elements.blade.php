<div class="form-group row align-items-center" :class="{'has-danger': errors.has('type_name'), 'has-success': this.fields.type_name && this.fields.type_name.valid }">
    <label for="type_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.point-type.columns.type_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.type_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('type_name'), 'form-control-success': this.fields.type_name && this.fields.type_name.valid}" id="type_name" name="type_name" placeholder="{{ trans('admin.point-type.columns.type_name') }}">
        <div v-if="errors.has('type_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('notes'), 'has-success': this.fields.notes && this.fields.notes.valid }">
    <label for="notes" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.point-type.columns.notes') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.notes" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('notes'), 'form-control-success': this.fields.notes && this.fields.notes.valid}" id="notes" name="notes" placeholder="{{ trans('admin.point-type.columns.notes') }}">
        <div v-if="errors.has('notes')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('notes') }}</div>
    </div>
</div>


