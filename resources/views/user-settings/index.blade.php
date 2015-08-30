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
                        {!! Form::input('password', 'confirm_password', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Tumblr Token') !!}
                        {!! Form::input(
                                'text',
                                \App\UserSettings::TUMBLR_TOKEN,
                                old(\App\UserSettings::TUMBLR_TOKEN, isset($userSettings[\App\UserSettings::TUMBLR_TOKEN]) ? $userSettings[\App\UserSettings::TUMBLR_TOKEN] : null),
                                ['class' => 'form-control']
                            )
                        !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Tumblr Token Secret') !!}
                        {!! Form::input(
                                'text',
                                \App\UserSettings::TUMBLR_TOKEN_SECRET,
                                old(\App\UserSettings::TUMBLR_TOKEN_SECRET, isset($userSettings[\App\UserSettings::TUMBLR_TOKEN_SECRET]) ? $userSettings[\App\UserSettings::TUMBLR_TOKEN_SECRET] : null),
                                ['class' => 'form-control']
                            )
                        !!}
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection