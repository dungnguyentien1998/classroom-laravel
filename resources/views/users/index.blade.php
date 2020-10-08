@extends('users.base')

@section('action-content')

    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">List of users</h3>
                    </div>
                    <div class="col-sm-4">
                        @if(Auth::user()->is_admin == 1)
                            <a class="btn btn-primary" href="/admin/dashboard/users/create">Add new user</a>
                        @else
                            <a class="btn btn-primary" href="{{ route('users.create') }}">Add new user</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>

                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="Name: activate to sort column descending"
                                        aria-sort="ascending">User Name
                                    </th>
                                    <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Email: activate to sort column ascending">Email
                                    </th>
                                    <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
                                        Name
                                    </th>
                                    <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
                                        Password
                                    </th>
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                        aria-label="Action: activate to sort column ascending">Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="hidden-xs">{{ $user->name }}</td>
                                        {{--                                        <td class="hidden-xs">{{ $user->password }}</td>--}}
                                        <td>
                                            @if(Auth::user()->is_admin == 1)
                                                <form class="row" method="POST"
                                                      {{--                                                  action="{{ route('users.destroy', $user->id) }}"--}}
                                                      action="/admin/dashboard/users/{{$user->id}}"
                                                      onsubmit="return confirm('Are you sure?')">
                                                    @else
                                                        <form class="row" method="POST"
                                                              action="{{ route('users.destroy', $user->id) }}"
                                                              {{--                                                              action="/admin/dashboard/users/{{$user->id}}"--}}
                                                              onsubmit="return confirm('Are you sure?')">
                                                            @endif

                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }}">

                                                            @if(Auth::user()->is_admin == 1)
                                                            {{--                                                <a href="{{ route('users.edit', $user->id) }}"--}}
                                                            <a href="/admin/dashboard/users/{{$user->id}}/edit"
                                                               class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                                                                Update
                                                            </a>
                                                            @else
                                                                <a href="{{ route('users.edit', $user->id) }}"
{{--                                                                <a href="/admin/dashboard/users/{{$user->id}}/edit"--}}
                                                                   class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                                                                    Update
                                                                </a>
                                                            @endif

                                                            @if ($user->username != Auth::user()->username)
                                                                <button type="submit"
                                                                        class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                                                                    Delete
                                                                </button>
                                                            @endif
                                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {{--                                <tfoot>--}}
                                {{--                                <tr>--}}
                                {{--                                    <th width="10%" rowspan="1" colspan="1">User Name</th>--}}
                                {{--                                    <th width="20%" rowspan="1" colspan="1">Email</th>--}}
                                {{--                                    <th class="hidden-xs" width="20%" rowspan="1" colspan="1">First Name</th>--}}
                                {{--                                    <th class="hidden-xs" width="20%" rowspan="1" colspan="1">Last Name</th>--}}
                                {{--                                    <th rowspan="1" colspan="2">Action</th>--}}
                                {{--                                </tr>--}}
                                {{--                                </tfoot>--}}
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1
                                to {{count($users)}} of {{count($users)}} entries
                            </div>
                        </div>
                        {{--                        <div class="col-sm-7">--}}
                        {{--                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">--}}
                        {{--                                {{ $users->links() }}--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>

        </div>
    </section>

    </div>
@endsection
