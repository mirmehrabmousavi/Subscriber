@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/pages/data-list-view.css">
@endsection

@section('content')
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">پلن ها</h4>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-danger delete_all">حذف موارد انتخاب شده</button>
                        </div>
                        <form action="/admin/plans" class="d-flex justify-content-end">
                            <div class="d-flex justify-content-center">
                                <input type="text" name="search" id="search" value="{{str_replace('search=', "", request()->getQueryString())}}" class="form-control form-control-sm d-inline" style="margin-left: 5px" placeholder="جستجو ..." @if(request()->getQueryString()) autofocus @endif>
                                <button type="submit" class="btn btn-sm btn-outline-primary d-inline"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive mt-1">
                            @if(count($plans) > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th width="50px">
                                        <fieldset>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="checkbox" id="master">
                                                <label class="custom-control-label" for="master"></label>
                                            </div>
                                        </fieldset>
                                    </th>
                                    <th></th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($plans as $plan)
                                    <tr id="dataRow-{{$plan->id}}">
                                        <td>
                                            <fieldset>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input sub_chk" name="checkbox[]" data-id="{{$plan->id}}" id="check-{{$plan->id}}">
                                                    <label class="custom-control-label" for="check-{{$plan->id}}"></label>
                                                </div>
                                            </fieldset>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center align-content-center w-100 p-2">
                                                        <div class="w-100">
                                                            <p class="text-muted d-block w-100">
                                                                <span class="mx-1">آیدی پلن : {{$plan->id}}</span>
                                                                <span class="mx-2">عنوان : {{$plan->title}}</span>
                                                            </p>
                                                            <p class="mt-1 w-100 alert alert-secondary">
                                                                <span class="mx-1">قیمت : {{number_format($plan->price).' تومان'}}</span>
                                                                <span class="mx-2">نوع پلن : {{$plan->type}}</span>
                                                            </p>
                                                            <p class="mt-1 w-100 alert alert-secondary">
                                                                <span class="mx-2">زمان ثبت : {{jdate($plan->crteated_at)->format('%A, %d %B %y H:i:s')}}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.plans.edit', ['plan' => $plan->id])}}" class="text-secondary mr-1 waves-effect waves-light"><i class="feather icon-edit"></i></a>
                                            <a class="text-secondary mr-1 waves-effect waves-light text-danger" data-toggle="modal" data-target="#delete-{{$plan->id}}"
                                               data-tr="tr_{{$plan->id}}"><i class="feather icon-trash"></i></a>
                                            <div class="modal fade text-left" id="delete-{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger white">
                                                            <h5 class="modal-title" id="myModalLabel120">از حذف محتوا با نام "{{$plan->title}}" اطمینان داری؟</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{route('admin.plans.destroy', [$plan->id])}}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">منصرف شدم</button>
                                                                <button type="submit" class="btn btn-danger waves-effect waves-light">آره مطمدنم</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <script>
                                        $('#check-{{$plan->id}}').on('change', function() {
                                            var isChecked = $(this).prop('checked');
                                            var $tr = $('#dataRow-{{$plan->id}}');

                                            if (isChecked) {
                                                $tr.css('background-color', 'rgba(115,103,240,0.2)').css('border', '1px solid rgba(115,103,240,0.7)').css('border-radius', '25px');
                                                $('.delete_all').show()
                                            } else {
                                                $tr.css('background-color', '').css('border', '');
                                                $('.delete_all').hide()
                                            }
                                        });
                                    </script>
                                @endforeach
                                </tbody>
                            </table>
                            {{$plans->links('admin.pagination.paginate')}}
                            @else
                                <div class="alert alert-danger mx-1 text-center"><i class="fa fa-info-circle"></i> پلنی وجود ندارد</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="/admin/app-assets/js/scripts/ui/data-list-view.js"></script>
    <script>
        $(document).ready(function () {

            $('.delete_all').hide()

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
            $('.delete_all').on('click', function(e) {
                var allVals = [];

                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if(allVals.length <=0)
                {
                    alert("لطفا یک کاربر انتخاب کنید");
                }  else {

                    var check = confirm("مطمئنی می خوای این پلن ها رو پاک کنی؟");
                    if(check === true){
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: '{{route('admin.plans.destroyAll')}}',
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    //alert(data['success']);
                                    window.location.href='/admin/plans'
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
    </script>
@endsection
