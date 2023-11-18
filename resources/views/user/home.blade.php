@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <p>{{ __('You are logged in!') }}</p>
                    <p class="alert alert-success" style="border: 1px solid #28C76F" dir="rtl">{{ jdate(auth()->user()->subscribe)->ago() . 'مانده تا اتمام پلن رایگان 7 روزه' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
