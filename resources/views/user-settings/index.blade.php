@extends('layouts/main')
@section('title', 'User Settings')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">User Settings</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'user.settings', 'method' => 'POST']) !!}

                    {!! Form::token() !!}

                    <div class="form-group">
                        {!! Form::label('Name') !!}
                        {!! Form::input(
                                'text',
                                'name',
                                old('name', isset($user->name) ? $user->name : null),
                                ['class' => 'form-control']
                            )
                        !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Email') !!}
                        {!! Form::input(
                                'text',
                                'email',
                                old('email', isset($user->email) ? $user->email : null),
                                ['class' => 'form-control']
                            )
                        !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Password') !!}
                        {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Password (again)') !!}
                        {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>

                    <hr />

                    <div class="form-group">
                        <a href="{{ URL::route('auth.tumblr') }}" class="btn btn-warning">
                            @if ($canConnectToTumblr)
                                Reauthenticate with Tumblr
                            @else
                                Authenticate with Tumblr
                            @endif
                        </a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection