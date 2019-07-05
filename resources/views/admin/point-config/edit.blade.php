@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.point-config.actions.edit', ['name' => $pointConfig->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <point-config-form
                :action="'{{ $pointConfig->resource_url }}'"
                :data="{{ $pointConfig->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.point-config.actions.edit', ['name' => $pointConfig->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.point-config.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </point-config-form>

    </div>

</div>

@endsection