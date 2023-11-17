@extends('admin.layouts.app')

@section('content')
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">تراکنش ها</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive mt-1">
                            @if(count($transactions) > 0)
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="d-flex align-items-center align-content-center w-100 p-2">
                                                            <div class="w-100">
                                                                <p class="text-muted d-block w-100">
                                                                    <span class="mx-1">آیدی تراکنش : {{$transaction->payment_id}}</span>
                                                                    <span class="mx-2">کاربر : {{$transaction->user->name}}</span>
                                                                    <span class="mx-2">پلن خریداری شده : {{$transaction->plan->title}}</span>
                                                                </p>
                                                                <p class="mt-1 w-100 alert alert-secondary">
                                                                    <span class="mx-1">قیمت : {{number_format($transaction->paid).' تومان'}}</span>
                                                                    <span class="mx-2">نوع تراکنش : {{$transaction->transactions_result}}</span>
                                                                </p>
                                                                <p class="mt-1 w-100 alert alert-secondary">
                                                                    <span class="mx-2">زمان ثبت : {{jdate($transaction->crteated_at)->format('%A, %d %B %y H:i:s')}}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$transactions->links('admin.pagination.paginate')}}
                            @else
                                <div class="alert alert-danger mx-1 text-center"><i class="fa fa-info-circle"></i> تراکنشی وجود ندارد</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
