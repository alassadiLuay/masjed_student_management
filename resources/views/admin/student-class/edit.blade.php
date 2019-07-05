@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.student-class.actions.edit', ['name' => $studentClass->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <student-class-form
                :action="'{{ $studentClass->resource_url }}'"
                :data="{{ $studentClass->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.student-class.actions.edit', ['name' => $studentClass->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.student-class.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </student-class-form>

    </div>

</div>

@endsection