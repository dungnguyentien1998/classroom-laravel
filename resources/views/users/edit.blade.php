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
                                                <input id="username" type="text" class="form-control" name="username"
                                                       value="{{ $user->username }}" required autofocus>

                                                @if ($errors->has('username'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">First Name</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name"
                                                       value="{{ $user->name }}" required>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">Last Name</label>

                                            <div class="col-md-6">
                                                <input id="email" type="text" class="form-control" name="email"
                                                       value="{{ $user->email }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">New Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control"
                                                       name="password">

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm
                                                Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation">
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
