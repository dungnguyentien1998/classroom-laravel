@extends('messages.base')

@section('action-content')

    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">messages received</h3>
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
                                        aria-sort="ascending">From user
                                    </th>
                                    <th width="50%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Email: activate to sort column ascending">Message
                                        content
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($received as $message)
                                    <tr role="row" class="odd">
                                        @if ($message->receiver_id == Auth::user()->id)
                                            <td class="sorting_1">{{ $message->userSent()->get()[0]->username }}</td>
                                            <td>{{ $message->message_content }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">messages sent</h3>
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
                                        aria-sort="ascending">To user
                                    </th>
                                    <th width="50%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Email: activate to sort column ascending">Message
                                        content
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sent as $message)
                                    <tr role="row" class="odd">
                                        @if ($message->sender_id == Auth::user()->id)
                                            <td class="sorting_1">{{ $message->userReceived()->get()[0]->username }}</td>
                                            <td>{{ $message->message_content }}</td>
                                            <td>
                                                @if(Auth::user()->is_admin == 1)
                                                    <form class="row" method="POST"
                                                          action="/admin/dashboard/messages/{{$message->id}}"
                                                          onsubmit="return confirm('Are you sure?')">
                                                        @else
                                                            <form class="row" method="POST"
                                                                  action="{{ route('messages.destroy', $message->id) }}"
                                                                  onsubmit="return confirm('Are you sure?')">
                                                                @endif

                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }}">

                                                                @if(Auth::user()->is_admin == 1)
                                                                    <a href="/admin/dashboard/messages/{{$message->id}}/edit"
                                                                       class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                                                                        Update
                                                                    </a>
                                                                @else
                                                                <a href="{{ route('messages.edit', $message->id) }}"
                                                                   class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                                                                    Update
                                                                </a>
                                                                @endif


                                                                <button type="submit"
                                                                        class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                                                                    Delete
                                                                </button>

                                                            </form>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
@endsection
