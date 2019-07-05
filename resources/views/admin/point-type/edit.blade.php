@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.point-type.actions.edit', ['name' => $pointType->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <point-type-form
                :action="'{{ $pointType->resource_url }}'"
                :data="{{ $pointType->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.point-type.actions.edit', ['name' => $pointType->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.point-type.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </point-type-form>

    </div>

</div>

@endsection