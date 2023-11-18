@extends('user.layouts.app')

@section('style')
@endsection

@section('content')
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش دسته بندی</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                {{--<form action="{{route('admin.categories.store')}}" method="POST">
                                    @csrf--}}
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="main_title">عنوان* :</label>
                                                <input type="text" name="title" value="{{$category->title}}" id="main_title" class="form-control @error('name') is-invalid @enderror" placeholder="نام را وارد کنید">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="main_slug">پیوند :</label>
                                                <input type="text" value="{{$category->slug}}" id="main_slug" class="form-control @error('slug') is-invalid @enderror" placeholder="پیوند را وارد کنید" name="slug">
                                            </div>
                                        </div>
                                        {{--@include('admin.galleries.file-manager-mini')--}}
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="main_content">توضیحات* :</label>
                                                <textarea id="main_content" name="content" class="form-control ckeditor">{!! $category->content !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <a id="showMeta" class="text-secondary mr-1 waves-effect waves-light rounded-pill" style="padding: 5px"><i class="feather icon-plus-circle"></i> افزودن متا</a>
                                        </div>
                                        <div class="col-12">
                                            <div id="meta" class="row" style="display: none">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="meta_title">عنوان متا :</label>
                                                        <input type="text" value="{{$category->meta_title}}" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" placeholder="عنوان متا را وارد کنید">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="meta_keyword">کلمه کلیدی متا :</label>
                                                        <textarea id="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" placeholder="با , جدا کنید">{{$category->meta_keyword}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="meta_description">توضیحات متا :</label>
                                                        <textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" placeholder="توضیحات متا را وارد کنید">{{$category->meta_description}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button {{--type="submit"--}} id="editCategory" class="btn btn-outline-success btn-sm mr-1 mb-1 waves-effect waves-light w-100 d-block">بروزرسانی</button>
                                        </div>
                                    </div>
                               {{-- </form>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            let category = {!! $category->toJson(); !!}
            CKEDITOR.replace('.ckeditor');

            if(category.image){
                $.each(JSON.parse(category.image),function(){
                    $('#gallery').modal('hide');
                    $('#imageTooltip').hide();
                    $('#imageContainer').append(
                        $(`<div id="getImagePic" class="col-lg-4 col-md-6 l-sm-12 parent">
                                <a>
                                    <div class="card overlay-img-card text-white dataGallery">
                                        <img src="${this.image}" class="card-img" alt="card-img-6" height="200">
                                        <div class="card-img-overlay overlay-black">
                                            <h5 class="font-medium-5 text-white text-center mt-4 name">${this.name}</h5>
                                                    <p class="text-secondary text-center"><span class="size">Size : ${this.size}</span> | <span class="type">Type : ${this.type}</span></p>
                                            <div class="d-flex justify-content-center">
                                                 <a href="#" id="deleteImg" class="btn-secondary text-danger waves-effect waves-light p-1 rounded-pill text-center"><i class="feather icon-trash" style="font-size: 18px"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>`)
                            .on('click', '#deleteImg', function (ss) {
                                ss.currentTarget.parentElement.parentElement.parentElement.parentElement.remove();
                                if (ss.currentTarget.parentElement.parentElement.parentElement.parentElement.length !== '<img id="deleteImg" src="' + ss.currentTarget.parentElement.parentElement.parentElement.parentElement + '" width="150">') {
                                    $('#imageTooltip').show();
                                }
                            })
                    );
                });
            }

            $("#showMeta").on('click', function () {
                $('#meta').slideToggle('slow');
            });

            $("#editCategory").click(function (event) {
                event.preventDefault()
                $("#editCategory").text('صبر کنید ...');

                var name = $("#main_name").val();
                var slug = $("#main_slug").val();
                var type = $("#main_type").val();
                var content = CKEDITOR.instances["main_content"].getData();
                var image = $("#imageContainer #getImagePic").map(function () {
                    var name = $(this).find('.name').html()
                    var image = $(this).find('img').attr('src')
                    var size = $(this).find('.size').html()
                    var type = $(this).find('.type').html()
                    return {name: name, image: image, size: size, type: type};
                }).get();
                var meta_title = $("input[name='meta_title']").val();
                var meta_keyword = $("textarea[name='meta_keyword']").val();
                var meta_description = $("textarea[name='meta_description']").val();

                $.ajax({
                    url: "{{route('company.categories.update', [auth()->user()->site->title, $category->id])}}",
                    type: "put",
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        slug: slug,
                        type: type,
                        content: content,
                        image: JSON.stringify(image),
                        meta_title: meta_title,
                        meta_keyword: meta_keyword,
                        meta_description: meta_description,
                    },
                    success: function (data) {
                        window.location.href = "/{{auth()->user()->site->title}}/categories";
                        toastr.success('با موفقیت ذخیره شد.');
                    },
                    error: function (response) {
                        toastr.success('مشکلی پیش اومده بعدا امتحان کن.')
                    }
                });
            });
        });
    </script>
@endsection
