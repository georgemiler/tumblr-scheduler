@extends('layouts/authenticated')
@section('title', 'User Settings')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
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
                        {!! Form::label('Tumblr Consumer Key') !!}
                        {!! Form::input(
                                'text',
                                \App\UserSettings::TUMBLR_CONSUMER_KEY,
                                old(\App\UserSettings::TUMBLR_CONSUMER_KEY, isset($userSettings[\App\UserSettings::TUMBLR_CONSUMER_KEY]) ? $userSettings[\App\UserSettings::TUMBLR_CONSUMER_KEY] : null),
                                ['class' => 'form-control']
                            )
                        !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Tumblr Consumer Secret') !!}
                        {!! Form::input(
                                'text',
                                \App\UserSettings::TUMBLR_CONSUMER_SECRET,
                                old(\App\UserSettings::TUMBLR_CONSUMER_SECRET, isset($userSettings[\App\UserSettings::TUMBLR_CONSUMER_SECRET]) ? $userSettings[\App\UserSettings::TUMBLR_CONSUMER_SECRET] : null),
                                ['class' => 'form-control']
                            )
                        !!}
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