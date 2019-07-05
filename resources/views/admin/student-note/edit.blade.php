@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.student-note.actions.edit', ['name' => $studentNote->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <student-note-form
                :action="'{{ $studentNote->resource_url }}'"
                :data="{{ $studentNote->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.student-note.actions.edit', ['name' => $studentNote->id]) }}
                    </div>

                    <div class="card-body">
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': this.fields.note && this.fields.note.valid }">
                            <label for="notes" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_fname') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" class="form-control" value="{{$student_name}}" disabled="true">
                                <div v-if="errors.has('note')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('note') }}</div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': this.fields.note && this.fields.note.valid }">
                            <label for="notes" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.note') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.notes" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('note'), 'form-control-success': this.fields.note && this.fields.note.valid}" id="notes" name="notes" placeholder="{{ trans('admin.student.columns.note') }}">
                                <div v-if="errors.has('note')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('note') }}</div>
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

        </student-note-form>

    </div>

</div>

@endsection