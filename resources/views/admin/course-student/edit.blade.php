@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.course-student.actions.edit', ['name' => $courseStudent->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <course-student-form
                :action="'{{ $courseStudent->resource_url }}'"
                :data="{{ $courseStudent->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.course-student.actions.edit', ['name' => $courseStudent->id]) }}
                    </div>

                    <div class="card-body">

                        <div class="card-body">
                        <input type="hidden" id="semester_id_value" value="{{$semester_id}}">
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('semester_name'), 'has-success': this.fields.semester_name && this.fields.semester_name.valid }">
                            <label for="semester_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.semester.columns.semester_name') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <select v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('semester_name'), 'form-control-success': this.fields.semester_name && this.fields.semester_name.valid}" id="semester_name" @change="semester_courses($event)">
                                    @foreach ($semesters as $option)
                                        <option value="{{ $option->id }}" <?php if(isset($semester_id) && $semester_id == $option->id) echo "selected"?>> {{ $option->semester_name }} </option>
                                    @endforeach
                                </select>
                                <div v-if="errors.has('semester_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('semester_name') }}</div>
                            </div>
                        </div>
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_id'), 'has-success': this.fields.course_id && this.fields.course_id.valid }">
                            <label for="course_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.course_name') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <select v-model="form.course_id" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('course_id'), 'form-control-success': this.fields.course_id && this.fields.course_id.valid}" id="course_id" name="course_id">
                                    <option v-for="option in options" :value="option.id">@{{ option.course_name }}</option>
                                </select>
                                <div v-if="errors.has('course_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('course_id') }}</div>
                            </div>
                        </div>
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('class_id'), 'has-success': this.fields.class_id && this.fields.class_id.valid }">
                            <label for="class_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student-class.columns.class_name') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <select v-model="form.class_id" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('class_id'), 'form-control-success': this.fields.class_id && this.fields.class_id.valid}" id="class_id">
                                    @foreach ($classes as $option)
                                        <option value="{{ $option->id }}" <?php if(isset($selected_semester) && isset($selected_semester[0])&& $selected_semester[0]->class_id == $option->id) echo "selected"?>> {{ $option->class_name }} </option>
                                    @endforeach
                                </select>
                                <div v-if="errors.has('class_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('class_id') }}</div>
                            </div>
                        </div>
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_id'), 'has-success': this.fields.student_id }">
                            <label for="student_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_name') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                                <Multiselect v-model="select_value" v-validate="'required'" :custom-label="nameWithAddress" :options="students_data" :track-by="form.student_id+''" :searchable="true" :close-on-select="true" class="form-control" :value="form.student_id" :class="{'form-control-danger': errors.has('student_id'), 'form-control-success': this.fields.student_id}" id="student_id">
                                </Multiselect >
                                <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_id') }}</div>
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

        </course-student-form>

    </div>

</div>

@endsection