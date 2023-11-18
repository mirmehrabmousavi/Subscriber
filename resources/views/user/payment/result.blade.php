@extends('admin.layouts.app')

@section('content')
    @if($payment->status == \App\Models\Transaction::STATUS_SUCCESS)
    <p class="alert alert-success border-success">پلن با موفقیت برای شما فعال شد و تا تاریخ {{auth()->user()->subscribe}} فعال خواهد بود.</p>
    @elseif($payment->status == \App\Models\Transaction::STATUS_FAILED)
        <p class="alert alert-danger border-warning">پرداخت ناموفق بود</p>
    @endif
@endsection

@section('script')
    <script>
        @if($payment->status == \App\Models\Transaction::STATUS_SUCCESS)
        setTimeout(function () {
            window.location.href = '{{route('dashboard')}}'
        }, 2000) //redirect after 2 seconds
        @elseif($payment->status == \App\Models\Transaction::STATUS_FAILED)
        setTimeout(function () {
            window.location.href = '{{route('plans')}}'
        }, 2000) //redirect after 2 seconds
        @endif
    </script>
@endsection
