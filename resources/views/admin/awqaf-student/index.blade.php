@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.awqaf-student.actions.index'))

@section('body')

    <awqaf-student-listing
        :data="{{ $data }}"
        :url="'{{ url('admin/awqaf-students') }}'"
        inline-template>

        <div class="row" style="overflow: auto;">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.awqaf-student.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/awqaf-students/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.awqaf-student.actions.create') }}</a>
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
                                    <th is='sortable' :column="'id'">{{ trans('admin.course-student.columns.id') }}</th>
                                    <th is='sortable' :column="'test_name'">{{ trans('admin.awqaf.columns.test_name') }}</th>
                                    <th is='sortable' :column="'place'">{{ trans('admin.awqaf.columns.place') }}</th>
                                    <!-- <th is='sortable' :column="'tester_name'">{{ trans('admin.awqaf.columns.tester_name') }}</th> -->
                                    <th is='sortable' :column="'date'">{{ trans('admin.awqaf.columns.date') }}</th>
                                    <th is='sortable' :column="'student_mark'"><!-- {{ trans('admin.awqaf-student.columns.student_mark') }} --> علامة الطالب</th>
                                    <th is='sortable' :column="'is_passed'"><!-- {{ trans('admin.awqaf-student.columns.is_passed') }} -->ناجح</th>
                                    <th is='sortable' :column="'full_mark'"><!-- {{ trans('admin.awqaf-student.columns.full_mark') }} -->العلامة الكلية</th>
                                    <th is='sortable' :column="'subject_type'"><!-- {{ trans('admin.awqaf-student.columns.subject_type') }} -->نوع التسميع</th>
                                    <th is='sortable' :column="'subject'"><!-- {{ trans('admin.awqaf-student.columns.subject') }} -->المسمع</th>
                                    <th is='sortable' :column="'student_fname'">{{ trans('admin.student.columns.student_fname') }}</th>
                                    <th is='sortable' :column="'father_phone'">{{ trans('admin.student.columns.father_phone') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.test_name }}</td>
                                    <td>@{{ item.place }}</td>
                                    <!-- <td>@{{ item.tester_name }}</td> -->
                                    <td>@{{ item.date }}</td>
                                    <td>@{{ item.student_mark }}</td>
                                    <td>@{{ item.is_passed }}</td>
                                    <td>@{{ item.full_mark }}</td>
                                    <td>@{{ item.subject_type }}</td>
                                    <td>@{{ item.subject[item.subject_type+'_name'] }}</td>
                                    <td>@{{ item.student_fname }} @{{item.student_lname}}</td>
                                    <td>@{{ item.father_phone }}</td>
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
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/awqaf-students/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.awqaf-student.actions.create') }}</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </awqaf-student-listing>

@endsection