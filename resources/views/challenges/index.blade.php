@extends('challenges.base')

@section('action-content')

    <section class="content">
        @if(Auth::user()->is_admin == 1)
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">Add a challenge</h3>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="/admin/dashboard/challenges" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label"> Challenge name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> Hint</label>

                                <div class="col-md-6">
                                    <input id="hint" type="text" class="form-control" name="hint" required>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> File Upload</label>

                                <div class="col-md-6">
                                    <input id="upload" type="file" class="form-control" name="upload" required>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div>
                                <input type="submit" class="btn btn-primary" value="Upload"/>
                            </div>
                            <br/>
                        </form>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">Manage challenge</h3>
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
                                    <th width="25%" class="sorting_asc" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="Name: activate to sort column descending"
                                        aria-sort="ascending">Challenge name
                                    </th>

                                    <th width="25%" class="sorting_asc" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="Name: activate to sort column descending"
                                        aria-sort="ascending">Hint
                                    </th>

                                    <th width="25%" class="sorting_asc" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="Name: activate to sort column descending"
                                        aria-sort="ascending">Created at
                                    </th>

                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2"
                                        aria-label="Action: activate to sort column ascending">Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($challenges as $challenge)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $challenge->name }}</td>
                                        <td class="sorting_1">{{ $challenge->hint }}</td>
                                        <td class="sorting_1">{{ $challenge->created_at }}</td>
                                        @if(Auth::user()->is_admin == 1)
                                            <td>
{{--                                                <a href="admin/dashboard/challenges/{{$challenge->id}}">Update</a>--}}
                                            </td>
                                        @else
                                            <td>
                                                <a href="/challenges/submit/{{$challenge->id}}">Submit</a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        {{--                        <div class="col-sm-5">--}}
                        {{--                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1--}}
                        {{--                                to {{count($users)}} of {{count($users)}} entries--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
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
