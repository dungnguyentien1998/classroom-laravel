@extends('users.base')

@section('action-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update user</div>
                    <div class="panel-body">
                        @if(Auth::user()->is_admin == 1)
                            <form class="form-horizontal" role="form" method="POST"
                                  action="/admin/dashboard/users/{{$user->id}}">
                                @else
                                    <form class="form-horizontal" role="form" method="POST"
                                          action="{{ route('users.update', $user->id) }}">
                                        @endif

                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="username" class="col-md-4 control-label">User Name</label>

                                            <div class="col-md-6">
                                                @if(Auth::user()->is_admin == 1)
                                                    <input id="username" type="text" class="form-control" name="username"
                                                           value="{{ $user->username }}" required autofocus>
                                                @elseif($user->username != Auth::user()->username)
                                                    <input id="username" type="text" class="form-control" name="username"
                                                           value="{{ $user->username }}" readonly>
                                                @else
                                                    <input id="username" type="text" class="form-control" name="username"
                                                           value="{{ $user->username }}" readonly>
                                                @endif

                                                @if ($errors->has('username'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name</label>

                                            <div class="col-md-6">
                                                @if(Auth::user()->is_admin == 1)
                                                    <input id="name" type="text" class="form-control" name="name"
                                                           value="{{ $user->name }}" required>
                                                @elseif($user->username != Auth::user()->username)
                                                    <input id="name" type="text" class="form-control" name="name"
                                                           value="{{ $user->name }}" readonly>
                                                @else
                                                    <input id="name" type="text" class="form-control" name="name"
                                                           value="{{ $user->name }}" readonly>
                                                @endif


                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">Email</label>

                                            <div class="col-md-6">
                                                @if(Auth::user()->is_admin == 1)
                                                    <input id="email" type="text" class="form-control" name="email"
                                                           value="{{ $user->email }}" required>
                                                @elseif($user->username != Auth::user()->username)
                                                    <input id="email" type="text" class="form-control" name="email"
                                                           value="{{ $user->email }}" readonly>
                                                @else
                                                    <input id="email" type="text" class="form-control" name="email"
                                                           value="{{ $user->email }}" required>
                                                @endif


                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                            <label for="contact" class="col-md-4 control-label">Contact</label>

                                            <div class="col-md-6">
                                                @if(Auth::user()->is_admin == 1)
                                                    <input id="contact" type="text" class="form-control" name="contact"
                                                           value="{{ $user->contact }}" required>
                                                @elseif($user->username != Auth::user()->username)
                                                    <input id="contact" type="text" class="form-control" name="contact"
                                                           value="{{ $user->contact }}" readonly>
                                                @else
                                                    <input id="contact" type="text" class="form-control" name="contact"
                                                           value="{{ $user->contact }}" required>
                                                @endif


                                                @if ($errors->has('contact'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        @if(Auth::user()->is_admin == 1 || $user->username == Auth::user()->username)
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">New Password</label>

                                            <div class="col-md-6">
                                                @if(Auth::user()->is_admin == 1)
                                                    <input id="password" type="password" class="form-control"
                                                           name="password">
                                                @elseif($user->username == Auth::user()->username)
                                                    <input id="password" type="password" class="form-control"
                                                           name="password">
                                                @endif


                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        @endif

                                        @if(Auth::user()->is_admin == 1 || $user->username == Auth::user()->username)
                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm
                                                Password</label>

                                            <div class="col-md-6">
                                                @if(Auth::user()->is_admin == 1)
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation">
                                                @elseif($user->username == Auth::user()->username)
                                                    <input id="password-confirm" type="password" class="form-control"
                                                           name="password_confirmation">
                                                @endif
                                            </div>
                                        </div>
                                        @endif

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

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if(Auth::user()->is_admin == 1)
                        <form class="form-horizontal" role="form" method="POST"
                              action="/admin/dashboard/messages/{{$user->id}}">
                            @else
                                <form class="form-horizontal" role="form" method="POST"
                                      action="/messages/{{$user->id}}">
                                    @endif

                                    {{csrf_field()}}
                                    <div class="form-group">

                                        {{--                    <textarea placeholder="Leave a message!" name="message"--}}
                                        {{--                              class="pb-cmnt-textarea"></textarea>--}}
                                        <input placeholder="Leave a message!" name="message_content"
                                               class="pb-cmnt-textarea">

                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            {{--                                <input type="submit" name="Send" value="Send" class="btn btn-primary">--}}
                                            <button type="submit" name="Send" class="btn btn-primary">
                                                Send
                                            </button>
                                        </div>
                                    </div>

                                </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .pb-cmnt-container {
            font-family: Lato;
            margin-top: 100px;
        }

        .pb-cmnt-textarea {
            resize: none;
            padding: 20px;
            height: 130px;
            width: 100%;
            border: 1px solid #F2F2F2;
            font-size: 20px;
        }
    </style>
@endsection
