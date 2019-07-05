<div class="form-group row align-items-center" :class="{'has-danger': errors.has('point_type_id'), 'has-success': this.fields.point_type_id && this.fields.point_type_id.valid }">
    <label for="point_type_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.point-config.columns.point_type_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.point_type_id" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('point_type_id'), 'form-control-success': this.fields.point_type_id && this.fields.point_type_id.valid}" id="point_type_id">
            @foreach ($point_types as $option)
                <option value="{{ $option->id }}"> {{ $option->type_name }} </option>
            @endforeach
        </select>
        <div v-if="errors.has('point_type_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('point_type_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('point_name'), 'has-success': this.fields.point_name && this.fields.point_name.valid }">
    <label for="point_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.point-config.columns.point_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.point_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('point_name'), 'form-control-success': this.fields.point_name && this.fields.point_name.valid}" id="point_name" name="point_name" placeholder="{{ trans('admin.point-config.columns.point_name') }}">
        <div v-if="errors.has('point_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('point_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('point_value'), 'has-success': this.fields.point_value && this.fields.point_value.valid }">
    <label for="point_value" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.point-config.columns.point_value') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.point_value" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('point_value'), 'form-control-success': this.fields.point_value && this.fields.point_value.valid}" id="point_value" name="point_value" placeholder="{{ trans('admin.point-config.columns.point_value') }}">
        <div v-if="errors.has('point_value')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('point_value') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('notes'), 'has-success': this.fields.notes && this.fields.notes.valid }">
    <label for="notes" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.point-config.columns.notes') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.notes" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('notes'), 'form-control-success': this.fields.notes && this.fields.notes.valid}" id="notes" name="notes" placeholder="{{ trans('admin.point-config.columns.notes') }}">
        <div v-if="errors.has('notes')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('notes') }}</div>
    </div>
</div>


