@extends('admin.layouts.app')

@section('content')
    <p class="alert alert-success border-success">پلن با موفقیت برای شما فعال شد و تا تاریخ {{auth()->user()->subscribe}} فعال خواهد بود.</p>
@endsection
