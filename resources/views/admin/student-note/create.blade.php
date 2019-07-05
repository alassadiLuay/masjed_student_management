@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.student-note.actions.create'))

@section('body')

    <div class="container-xl">

        <div class="card">

            <student-note-form
                :action="'{{ url('admin/student-notes') }}'"
                
                inline-template>

                <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-plus"></i> {{ trans('admin.student-note.actions.create') }}
                    </div>

                    <div class="card-body">

                        @include('admin.student-note.components.form-elements')

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