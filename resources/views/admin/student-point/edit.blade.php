@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.student-point.actions.edit', ['name' => $studentPoint->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <student-point-form
                :action="'{{ $studentPoint->resource_url }}'"
                :data="{{ $studentPoint->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.student-point.actions.edit', ['name' => $studentPoint->id]) }}
                    </div>

                    <div class="card-body">

                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('semester_name'), 'has-success': this.fields.semester_name && this.fields.semester_name.valid }">
                                <label for="semester_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.semester.columns.semester_name') }}</label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                    <input type="text" class="form-control" value="{{$semester_name}}" disabled="true">
                                    <div v-if="errors.has('semester_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('semester_name') }}</div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_id'), 'has-success': this.fields.course_id && this.fields.course_id.valid }">
                                <label for="course_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.course_name') }}</label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                    <input type="text" class="form-control" value="{{$course_name}}" disabled="true">
                                    <div v-if="errors.has('course_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('course_id') }}</div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_id'), 'has-success': this.fields.student_id }">
                                <label for="student_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_name') }}</label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                    <input type="text" class="form-control" value="{{$student_name}}" disabled="true">
                                    <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_id') }}</div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('point_id'), 'has-success': this.fields.point_id }">
                                <label for="point_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.point-config.columns.point_name') }}</label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                                    <Multiselect v-model="form.point_id" v-validate="'required'" multiple :custom-label="nameWithpointConf" :options="points_data" track-by="points_data.id" :searchable="true" :close-on-select="true" class="form-control" :class="{'form-control-danger': errors.has('point_id'), 'form-control-success': this.fields.point_id}" id="point_id">
                                    </Multiselect >
                                    <div v-if="errors.has('point_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('point_id') }}</div>
                                </div>
                            </div>

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </student-point-form>

    </div>

</div>

@endsection