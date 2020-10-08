@extends('messages.base')

@section('action-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update message</div>
                    <div class="panel-body">
                        @if(Auth::user()->is_admin == 1)
                            <form class="form-horizontal" role="form" method="POST"
                                  action="/admin/dashboard/messages/{{$message->id}}">
                                @else
                                    <form class="form-horizontal" role="form" method="POST"
                                          action="{{ route('messages.update', $message->id) }}">
                                        @endif

                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                            <label for="message" class="col-md-4 control-label">Message</label>

                                            <div class="col-md-6">
                                                <input id="message" type="text" class="form-control" name="message_content"
                                                       value="{{ $message->message_content }}" required autofocus>

                                                @if ($errors->has('message'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('message') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
