@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.awqaf-student.actions.create'))

@section('body')

    <div class="container-xl">

        <div class="card">

            <awqaf-student-form
                :action="'{{ url('admin/awqaf-students') }}'"
                
                inline-template>

                <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-plus"></i> {{ trans('admin.awqaf-student.actions.create') }}
                    </div>

                    <div class="card-body">

                        @include('admin.awqaf-student.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

            </awqaf-student-form>

        </div>

    </div>

@endsection