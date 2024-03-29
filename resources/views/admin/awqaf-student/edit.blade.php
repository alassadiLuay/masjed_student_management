@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.awqaf-student.actions.edit', ['name' => $awqafStudent->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <awqaf-student-form
                :action="'{{ $awqafStudent->resource_url }}'"
                :data="{{ $awqafStudent->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.awqaf-student.actions.edit', ['name' => $awqafStudent->id]) }}
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