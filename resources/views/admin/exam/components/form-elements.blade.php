<div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_id'), 'has-success': this.fields.course_id && this.fields.course_id.valid }">
    <label for="course_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.exam.columns.course_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
<!--         <input type="text" v-model="form.course_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('course_id'), 'form-control-success': this.fields.course_id && this.fields.course_id.valid}" id="course_id" name="course_id" placeholder="{{ trans('admin.exam.columns.course_id') }}"> -->
        <select v-model="form.course_id" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('course_id'), 'form-control-success': this.fields.course_id && this.fields.course_id.valid}" id="course_id" name="course_id">
            @foreach ($courses as $option)
                <option value="{{ $option->id }}"> {{ $option->course_name }} </option>
            @endforeach
        </select>
        <div v-if="errors.has('course_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('course_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('exam_name'), 'has-success': this.fields.exam_name && this.fields.exam_name.valid }">
    <label for="exam_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.exam.columns.exam_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.exam_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('exam_name'), 'form-control-success': this.fields.exam_name && this.fields.exam_name.valid}" id="exam_name" name="exam_name" placeholder="{{ trans('admin.exam.columns.exam_name') }}">
        <div v-if="errors.has('exam_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('exam_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('exam_max_num'), 'has-success': this.fields.exam_max_num && this.fields.exam_max_num.valid }">
    <label for="exam_max_num" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.exam.columns.exam_max_num') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.exam_max_num" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('exam_max_num'), 'form-control-success': this.fields.exam_max_num && this.fields.exam_max_num.valid}" id="exam_max_num" name="exam_max_num" placeholder="{{ trans('admin.exam.columns.exam_max_num') }}">
        <div v-if="errors.has('exam_max_num')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('exam_max_num') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('exam_min_num'), 'has-success': this.fields.exam_min_num && this.fields.exam_min_num.valid }">
    <label for="exam_min_num" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.exam.columns.exam_min_num') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.exam_min_num" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('exam_min_num'), 'form-control-success': this.fields.exam_min_num && this.fields.exam_min_num.valid}" id="exam_min_num" name="exam_min_num" placeholder="{{ trans('admin.exam.columns.exam_min_num') }}">
        <div v-if="errors.has('exam_min_num')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('exam_min_num') }}</div>
    </div>
</div>


