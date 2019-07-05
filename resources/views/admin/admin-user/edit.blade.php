@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.admin_users.actions.edit', ['name' => $admin_user->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <admin-user-form
                :action="'{{ $admin_user->resource_url }}'"
                :data="{{ $admin_user->toJson() }}"
                :activation="!!'{{ $activation }}'"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action">

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.admin_users.actions.edit', ['name' => $admin_user->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.admin_users.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </admin-user-form>

    </div>

</div>

@endsection