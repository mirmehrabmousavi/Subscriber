@extends('admin.layouts.app')

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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <form action="{{route('saveDataToMySQL2')}}" method="POST">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">عنوان* :</label>
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" required>
                                    @error('title')<span class="is-invalid">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-success">ذخیره</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <form action="{{route('saveDataToMySQL3')}}" method="POST">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">عنوان* :</label>
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" required>
                                    @error('title')<span class="is-invalid">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-success">ذخیره</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
