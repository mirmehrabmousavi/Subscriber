@extends('admin.layouts.app')

@section('content')
    <h4>ویرایش پلن <span class="text-primary">{{$plan->title}}</span></h4>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                            <form action="{{route('admin.plans.update', [$plan->id])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">عنوان* :</label>
                                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$plan->title}}" placeholder="عنوان را وارد کنید" name="title">
                                            @error('title') <span class="is-invalid text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">قیمت* :</label>
                                            <input type="number" id="price" class="form-control @error('price') is-invalid @enderror" value="{{$plan->price}}" placeholder="قیمت را وارد کنید" name="price">
                                            @error('price') <span class="is-invalid text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">توضیحات* :</label>
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$plan->description}}</textarea>
                                            @error('description') <span class="is-invalid text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">عنوان* :</label>
                                            <select class="form-control" name="type" id="type">
                                                <option value="Monthly" {{$plan->type == 'Monthly' ? 'selected' : ''}}>Monthly</option>
                                                <option value="Yearly" {{$plan->type == 'Yearly' ? 'selected' : ''}}>Yearly</option>
                                            </select>
                                            @error('type') <span class="is-invalid text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-outline-success btn-sm mr-1 mb-1 waves-effect waves-light">بروزرسانی</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
