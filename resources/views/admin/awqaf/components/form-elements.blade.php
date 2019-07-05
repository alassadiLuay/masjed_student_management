<div class="form-group row align-items-center" :class="{'has-danger': errors.has('test_name'), 'has-success': this.fields.test_name && this.fields.test_name.valid }">
    <label for="test_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.awqaf.columns.test_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.test_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('test_name'), 'form-control-success': this.fields.test_name && this.fields.test_name.valid}" id="test_name" name="test_name" placeholder="{{ trans('admin.awqaf.columns.test_name') }}">
        <div v-if="errors.has('test_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('test_name') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('date'), 'has-success': this.fields.date && this.fields.date.valid }">
    <label for="date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.awqaf.columns.date') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.date" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('date'), 'form-control-success': this.fields.date && this.fields.date.valid}" id="date" name="date" placeholder="{{ trans('admin.awqaf.columns.date') }}">
        <div v-if="errors.has('date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date') }}</div>
    </div>
</div> -->
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date'), 'has-success': this.fields.date && this.fields.date.valid }">
    <label for="date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.semester.columns.date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date" :config="datePickerConfig" format="dd-MMM-yyyy" class="flatpickr" :class="{'form-control-danger': errors.has('date'), 'form-control-success': this.fields.date && this.fields.date.valid}" id="date" name="date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('place'), 'has-success': this.fields.place && this.fields.place.valid }">
    <label for="place" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.awqaf.columns.place') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.place" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('place'), 'form-control-success': this.fields.place && this.fields.place.valid}" id="place" name="place" placeholder="{{ trans('admin.awqaf.columns.place') }}">
        <div v-if="errors.has('place')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('place') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('tester_name'), 'has-success': this.fields.tester_name && this.fields.tester_name.valid }">
    <label for="tester_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.awqaf.columns.tester_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tester_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tester_name'), 'form-control-success': this.fields.tester_name && this.fields.tester_name.valid}" id="tester_name" name="tester_name" placeholder="{{ trans('admin.awqaf.columns.tester_name') }}">
        <div v-if="errors.has('tester_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tester_name') }}</div>
    </div>
</div> -->


