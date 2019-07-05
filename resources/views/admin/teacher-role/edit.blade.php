@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.teacher-role.actions.edit', ['name' => $teacherRole->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <teacher-role-form
                :action="'{{ $teacherRole->resource_url }}'"
                :data="{{ $teacherRole->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.teacher-role.actions.edit', ['name' => $teacherRole->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.teacher-role.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </teacher-role-form>

    </div>

</div>

@endsection