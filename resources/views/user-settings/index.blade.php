@extends('layouts/authenticated')
@section('title', 'User Settings')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('user.settings') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>Tumblr Consumer Key</label>
                        <input type="text" class="form-control" name="{{ \App\UserSettings::TUMBLR_CONSUMER_KEY }}" value="{{ old(\App\UserSettings::TUMBLR_CONSUMER_KEY) }}">
                    </div>

                    <div class="form-group">
                        <label>Tumblr Consumer Secret</label>
                        <input type="text" class="form-control" name="{{ \App\UserSettings::TUMBLR_CONSUMER_SECRET }}" value="{{ old(\App\UserSettings::TUMBLR_CONSUMER_SECRET) }}">
                    </div>

                    <div class="form-group">
                        <label>Tumblr Token</label>
                        <input type="text" class="form-control" name="{{ \App\UserSettings::TUMBLR_TOKEN }}" value="{{ old(\App\UserSettings::TUMBLR_TOKEN) }}">
                    </div>

                    <div class="form-group">
                        <label>Tumblr Secret</label>
                        <input type="text" class="form-control" name="{{ \App\UserSettings::TUMBLR_TOKEN_SECRET }}" value="{{ old(\App\UserSettings::TUMBLR_TOKEN_SECRET) }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection