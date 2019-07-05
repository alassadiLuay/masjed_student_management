@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.mark.actions.edit', ['name' => $mark->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <mark-form
                :action="'{{ $mark->resource_url }}'"
                :data="{{ $mark->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.mark.actions.edit', ['name' => $mark->id]) }}
                    </div>

                    <div class="card-body">
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_id'), 'has-success': this.fields.student_id }">
                            <label for="student_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_name') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                                <!-- <Multiselect v-model="select_value" v-validate="'required'" :custom-label="nameWithAddress" :options="students_data" :track-by="form.student_id+''" :searchable="true" :close-on-select="true" class="form-control" :value="form.student_id" :class="{'form-control-danger': errors.has('student_id'), 'form-control-success': this.fields.student_id}" id="student_id" disabled>
                                </Multiselect > -->
                                <input type="text" class="form-control" value="{{$student_name}}" disabled="true">
                                <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_id') }}</div>
                            </div>
                        </div>
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('exam_id'), 'has-success': this.fields.exam_id }">
                            <label for="exam_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.exam.columns.exam_name') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" value="{{$selected_exam}}" class="form-control" disabled="true">
                                <div v-if="errors.has('exam_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('exam_id') }}</div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('notes'), 'has-success': this.fields.notes && this.fields.notes.valid }">
                            <label for="notes" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mark.columns.notes') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.notes" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('notes'), 'form-control-success': this.fields.notes && this.fields.notes.valid}" id="notes" name="notes" placeholder="{{ trans('admin.mark.columns.notes') }}">
                                <div v-if="errors.has('notes')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('notes') }}</div>
                            </div>
                        </div>
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('mark'), 'has-success': this.fields.mark && this.fields.mark.valid }">
                            <label for="mark" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mark.columns.mark') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.mark" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mark'), 'form-control-success': this.fields.mark && this.fields.mark.valid}" id="mark" name="mark" placeholder="{{ trans('admin.mark.columns.mark') }}">
                                <div v-if="errors.has('mark')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mark') }}</div>
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

        </mark-form>

    </div>

</div>

@endsection