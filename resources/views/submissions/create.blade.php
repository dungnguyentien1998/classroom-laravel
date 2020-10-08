@extends('submissions.base')

@section('action-content')

    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">Upload homework</h3>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="/uploads/{{$data[0]}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <label>File Upload:</label>
                            <br>
                            <input type="file" class="form-control" name="image"/>
                            <br><br>
                            <input type="submit" class="btn btn-primary" value="Upload"/>
                        </form>
                        <br/>
                    </div>
                </div>
            </div>
        </div>

        {{--        <div class="box">--}}
        {{--            <div class="box-header">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-sm-8">--}}
        {{--                        <h3 class="box-title">All homeworks</h3>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="box-body">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-sm-6"></div>--}}
        {{--                    <div class="col-sm-6"></div>--}}
        {{--                </div>--}}

        {{--                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="col-sm-12">--}}
        {{--                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid"--}}
        {{--                                   aria-describedby="example2_info">--}}
        {{--                                <thead>--}}
        {{--                                <tr role="row">--}}
        {{--                                    <th width="50%" class="sorting_asc" tabindex="0" aria-controls="example2"--}}
        {{--                                        rowspan="1" colspan="1" aria-label="Name: activate to sort column descending"--}}
        {{--                                        aria-sort="ascending">File name--}}
        {{--                                    </th>--}}
        {{--                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2"--}}
        {{--                                        aria-label="Action: activate to sort column ascending">Action--}}
        {{--                                    </th>--}}
        {{--                                </tr>--}}
        {{--                                </thead>--}}
        {{--                                <tbody>--}}
        {{--                                @foreach ($homeworks as $homework)--}}
        {{--                                    <tr role="row" class="odd">--}}
        {{--                                        <td class="sorting_1">{{ $homework->path }}</td>--}}

        {{--                                        --}}{{--                                        <td>--}}
        {{--                                        --}}{{--                                            <a href="/download/{{$homework->path}}">Download</a>--}}
        {{--                                        --}}{{--                                        </td>--}}
        {{--                                        <td>--}}
        {{--                                            <a href="/uploads/{{$homework->id}}">Submit</a>--}}
        {{--                                        </td>--}}
        {{--                                    </tr>--}}
        {{--                                @endforeach--}}
        {{--                                </tbody>--}}
        {{--                            </table>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="row">--}}

        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        {{--        </div>--}}
    </section>

    </div>
@endsection
