@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.listened-subject.actions.edit', ['name' => $listenedSubject->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <listened-subject-form
                :action="'{{ $listenedSubject->resource_url }}'"
                :data="{{ $listenedSubject->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.listened-subject.actions.edit', ['name' => $listenedSubject->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.listened-subject.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </listened-subject-form>

    </div>

</div>

@endsection