@extends('layouts/unauthenticated')

@section('title', 'Reset Password')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="POST" action="{{ URL::route('password.reset') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
