@extends('user.layouts.app')

@section('style')
@endsection

@section('content')
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">افزودن دسته بندی</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="main_title">عنوان* :</label>
                                                <input type="text" id="main_title" class="form-control @error('title') is-invalid @enderror" placeholder="نام را وارد کنید" name="title">
                                                @error('title') <span id="validation-title" class="is-invalid">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="main_parent_id">والد</label>
                                                <select id="main_parent_id" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
                                                    <option value="">بدون دسته بندی</option>
                                                    @foreach($categories as $k => $v)
                                                        <option value="{{ $v['id'] }}" >{{ $v['title'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="main_slug">پیوند :</label>
                                                <input type="text" id="main_slug" class="form-control @error('slug') is-invalid @enderror" placeholder="پیوند را وارد کنید" name="slug">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="main_content">توضیحات* :</label>
                                                <textarea id="main_content" name="content" class="form-control ckeditor"></textarea>
                                            </div>
                                        </div>
                                        {{--@include('admin.galleries.file-manager-mini')--}}
                                        <div class="form-group col-12">
                                            <a id="showMeta" class="text-secondary mr-1 waves-effect waves-light rounded-pill" style="padding: 5px"><i class="feather icon-plus-circle"></i> افزودن متا</a>
                                        </div>
                                        <div class="col-12">
                                            <div id="meta" class="row" style="display: none">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="meta_title">عنوان متا :</label>
                                                        <input type="text" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" placeholder="عنوان متا را وارد کنید">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="meta_keyword">کلمه کلیدی متا :</label>
                                                        <textarea id="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" placeholder="با , جدا کنید"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="meta_description">توضیحات متا :</label>
                                                        <textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" placeholder="توضیحات متا را وارد کنید"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button id="createCategory" class="btn btn-outline-success btn-sm mr-1 mb-1 waves-effect waves-light w-100 d-block">ذخیره</button>
                                        </div>
                                    </div>
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
            CKEDITOR.replace('.ckeditor');

            $("#showMeta").on('click', function () {
                $('#meta').slideToggle('slow');
            });

            $("#createCategory").click(function (event) {
                event.preventDefault()
                $("#createCategory").text('صبر کنید ...');

                var title = $("#main_title").val();
                var slug = $("#main_slug").val();
                var parent_id = $("#main_parent_id").val();
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
                    url: "{{route('company.categories.store', auth()->user()->site->title)}}",
                    type: "post",
                    data: {
                        _token: '{{ csrf_token() }}',
                        title: title,
                        slug: slug,
                        parent_id: parent_id,
                        content: content,
                        /*image: JSON.stringify(image),*/
                        meta_title: meta_title,
                        meta_keyword: meta_keyword,
                        meta_description: meta_description,
                    },
                    success: function (data) {
                        window.location.href = "/{{auth()->user()->site->title}}/categories";
                        toastr.success('با موفقیت ذخیره شد.');
                    },
                    error: function (xhr) {
                        toastr.success('مشکلی پیش اومده بعدا امتحان کن.')
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('#validation-' + key).value(value);
                        });
                    }
                });
            });
        });
    </script>
@endsection
