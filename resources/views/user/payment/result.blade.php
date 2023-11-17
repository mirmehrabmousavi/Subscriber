@extends('admin.layouts.app')

@section('content')
    @if(request()->status == 'OK')
    <p class="alert alert-success border-success">پلن با موفقیت برای شما فعال شد و تا تاریخ {{auth()->user()->subscribe}} فعال خواهد بود.</p>
    @elseif(request()->status = 'NOK')
        <p class="alert alert-danger border-warning">پرداخت ناموفق بود</p>
    @endif
@endsection

@section('script')
    <script>
        @if(request()->status == 'OK')
        setTimeout(function () {
            window.location.href = '{{route('dashboard')}}'
        }, 2000) //redirect after 2 seconds
        @elseif(request()->status = 'NOK')
        setTimeout(function () {
            window.location.href = '{{route('plans')}}'
        }, 2000) //redirect after 2 seconds
        @endif
    </script>
@endsection
