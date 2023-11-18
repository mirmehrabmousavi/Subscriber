@extends('user.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('admin/categories-asset/css/style.css')}}">
@endsection

@section('content')
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <a href="{{route('company.categories.create', auth()->user()->site->title)}}" class="btn btn-primary waves-effect waves-light w-100 mb-1 text-center d-flex justify-content-center"><i class="fa fa-plus-square-o text-center"></i> افزودن دسته بندی</a>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card">
                                        @if(count($categories) > 0)
                                        <div class="card-header">
                                            <h4 class="card-title">دسته بندی</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-6 dd" id="nestable-wrapper">
                                                        <ol class="dd-list">
                                                            @foreach($categories as $k => $category)
                                                                <li class="dd-item"
                                                                    data-id="{{ $category->id }}">
                                                                    <div class="dd-handle">
                                                                        <span>{{ $category->title }}</span>
                                                                        <a href="{{route('company.categories.destroy', [auth()->user()->site->title, $category->id])}}"
                                                                           class="float-left text-danger dd-nodrag"
                                                                           onclick="event.preventDefault(); document.getElementById('destroy-{{$category->id}}').submit();"><i
                                                                                class="fa fa-trash text-danger px-1"></i>حذف</a>
                                                                        <form id="destroy-{{$category->id}}"
                                                                              action="{{ route('company.categories.destroy', [auth()->user()->site->title, $category->id]) }}"
                                                                              method="POST"
                                                                              style="display: none;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        </form>
                                                                        <a href="{{route('company.categories.edit', [auth()->user()->site->title, $category->id])}}"
                                                                           class="float-left text-primary dd-nodrag"><i
                                                                                class="fa fa-pencil text-primary px-1"></i>ویرایش</a>
                                                                    </div>
                                                                </li>
                                                                @if(!empty($category->categories))
                                                                    @include('user.company.categories.product-subcategory', [ 'category' => $category])
                                                                @endif
                                                            @endforeach
                                                        </ol>
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <form
                                                        action="{{ route('company.categories.saveNestedCategories', auth()->user()->site->title) }}"
                                                        method="post">
                                                        @csrf
                                                        <textarea style="display: none;"
                                                                  name="nested_category_array"
                                                                  id="nestable-output"></textarea>
                                                        <button type="submit"
                                                                class="btn btn-sm btn-outline-success waves-effect waves-light"
                                                                style="margin-top: 15px;">بروزرسانی دسته بندی
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            <div class="alert alert-danger text-center mx-1"><i class="fa fa-info-circle"></i> دسته بندی وجود ندارد</div>
                                        @endif
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
    <script src="{{ asset('admin/categories-asset/js/jquery.nestable.js') }}"></script>
    <script src="{{ asset('admin/categories-asset/js/style.js') }}"></script>
@endsection

@section('script')
    {{--<script>
        $(document).ready(function () {
            CKEDITOR.replace('.ckeditor');

            $("#showMeta").on('click', function () {
                $('#meta').slideToggle('slow');
            });

            $("#createCategory").click(function (event) {
                event.preventDefault()
                $("#createCategory").text('صبر کنید ...');

                var name = $("#main_name").val();
                var slug = $("#main_slug").val();
                var parent_id = $("#main_parent_id").val();
                var type = $("#main_type").val();
                var description = CKEDITOR.instances["main_description"].getData();
                var image = $("#imageContainer #getImagePic").map(function () {
                    var name = $(this).find('.name').html()
                    var image = $(this).find('img').attr('src')
                    var size = $(this).find('.size').html()
                    var type = $(this).find('.type').html()
                    return {name: name, image: image, size: size, type: type};
                }).get();
                var meta_title = $("input[name='meta_title']").val();
                var meta_keyword = $("textarea[name='meta_keyword']").val();
                var meta_desc = $("textarea[name='meta_desc']").val();

                $.ajax({
                    url: "{{route('company.categories.store')}}",
                    type: "post",
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        slug: slug,
                        parent_id: parent_id,
                        type: type,
                        description: description,
                        image: JSON.stringify(image),
                        meta_title: meta_title,
                        meta_keyword: meta_keyword,
                        meta_desc: meta_desc,
                    },
                    success: function (data) {
                        toastr.success('با موفقیت ذخیره شد.');
                        window.location.href = "/admin/categories";
                    },
                    error: function (response) {
                        toastr.success('مشکلی پیش اومده بعدا امتحان کن.')
                    }
                });
            });

            //Select All Category
            $('#master').on('click', function (e) {
                if ($(this).is(':checked', true)) {
                    $("tr").css('background-color', 'rgba(115,103,240,0.2)').css('border', '1px solid rgba(115,103,240,0.7)'); // Change to your desired color
                    $(".sub_chk").prop('checked', true);
                    $('.delete_all').show()
                } else {
                    $("tr").css('background-color', '').css('border', '');
                    $(".sub_chk").prop('checked', false);
                    $('.delete_all').hide()
                }
            });

            //Delete All Categories || Selected Categories
            $('.delete_all').hide()
            $('.delete_all').on('click', function(e) {
                var allVals = [];

                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if(allVals.length <=0)
                {
                    alert("لطفا یک دسته بندی انتخاب کنید");
                }  else {

                    var check = confirm("مطمئنی می خوای این دسته بندی ها رو پاک کنی؟");
                    if(check === true){
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: '{{route('company.categories.destroyAll')}}',
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    //alert(data['success']);
                                    window.location.href='/admin/categories'
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });
                        $.each(allVals, function( index, value ) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });
        });
    </script>--}}
@endsection
