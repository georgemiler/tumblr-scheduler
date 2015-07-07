@extends('layouts/unauthenticated')

@section('title', 'Reset Password')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="POST" action="{{ URL::route('password.reset.token') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
@endsection
