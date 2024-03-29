@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.teacher.actions.edit', ['name' => $teacher->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <teacher-form
                :action="'{{ $teacher->resource_url }}'"
                :data="{{ $teacher->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.teacher.actions.edit', ['name' => $teacher->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.teacher.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </teacher-form>

    </div>

</div>

@endsection