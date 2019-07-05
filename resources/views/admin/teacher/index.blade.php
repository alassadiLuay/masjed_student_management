@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.teacher.actions.index'))

@section('body')

    <teacher-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/teachers') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.teacher.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/teachers/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.teacher.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-auto form-group ">
                                    <select class="form-control" v-model="pagination.state.per_page">
                                        
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                            </div>
                        </form>

                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>
                                    <th is='sortable' :column="'id'">{{ trans('admin.teacher.columns.id') }}</th>
                                    <th is='sortable' :column="'teacher_name'">اسم المستخدم </th>
                                    <th is='sortable' :column="'teacher_name'">{{ trans('admin.teacher.columns.teacher_name') }}</th>
                                    <th is='sortable' :column="'teacher_address'">{{ trans('admin.teacher.columns.teacher_address') }}</th>
                                    <th is='sortable' :column="'teacher_study'">{{ trans('admin.teacher.columns.teacher_study') }}</th>
                                    <th is='sortable' :column="'teacher_speciality'">{{ trans('admin.teacher.columns.teacher_speciality') }}</th>
                                    <th is='sortable' :column="'teacher_work'">{{ trans('admin.teacher.columns.teacher_work') }}</th>
                                    <th is='sortable' :column="'teacher_extras'">{{ trans('admin.teacher.columns.teacher_extras') }}</th>
                                    <th is='sortable' :column="'teacher_note'">{{ trans('admin.teacher.columns.teacher_note') }}</th>
                                    <th is='sortable' :column="'teacher_mobile'">{{ trans('admin.teacher.columns.teacher_mobile') }}</th>
                                    <th is='sortable' :column="'teacher_phone'">{{ trans('admin.teacher.columns.teacher_phone') }}</th>
                                    <th is='sortable' :column="'birthdate'">{{ trans('admin.teacher.columns.birthdate') }}</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td>@{{ item.id }}</td>
                                    <!-- <td>@{{ item.user_id }}</td> -->
                                    <td>@{{ item.username }}</td>
                                    <td>@{{ item.teacher_name }}</td>
                                    <td>@{{ item.teacher_address }}</td>
                                    <td>@{{ item.teacher_study }}</td>
                                    <td>@{{ item.teacher_speciality }}</td>
                                    <td>@{{ item.teacher_work }}</td>
                                    <td>@{{ item.teacher_extras }}</td>
                                    <td>@{{ item.teacher_note }}</td>
                                    <td>@{{ item.teacher_mobile }}</td>
                                    <td>@{{ item.teacher_phone }}</td>
                                    <td>@{{ item.birthdate | date }}</td>
                                    
                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

	                    <div class="no-items-found" v-if="!collection.length > 0">
		                    <i class="icon-magnifier"></i>
		                    <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
		                    <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/teachers/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.teacher.actions.create') }}</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </teacher-listing>

@endsection