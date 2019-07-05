@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.teacher-course.actions.edit', ['name' => $teacherCourse->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <teacher-course-form
                :action="'{{ $teacherCourse->resource_url }}'"
                :data="{{ $teacherCourse->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.teacher-course.actions.edit', ['name' => $teacherCourse->id]) }}
                    </div>

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
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_id'), 'has-success': this.fields.teacher_id && this.fields.teacher_id.valid }">
                            <label for="teacher_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.teacher-course.columns.teacher_id') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <select v-model="form.teacher_id" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('teacher_id'), 'form-control-success': this.fields.teacher_id && this.fields.teacher_id.valid}" id="teacher_id" @change="semester_courses($event)">
                                    @foreach ($teachers as $option)
                                        <option value="{{ $option->id }}" <?php if(isset($selected_semester) && isset($selected_semester[0])&& $selected_semester[0]->teacher_id == $option->id) echo "selected"?>> {{ $option->teacher_name }} </option>
                                    @endforeach
                                </select>
                                <div v-if="errors.has('teacher_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_id') }}</div>
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

        </teacher-course-form>

    </div>

</div>

@endsection