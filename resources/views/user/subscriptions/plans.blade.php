@extends('user.layouts.app')

@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Monthly Tippler Pricing</h1>
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
    </div>
    <div class="container">
        <div class="row text-center">
            @foreach($monthlyPlans as $value)

                <div class="col-3">
                    <div class="card mb-4 box-shadow @if(auth()->check() && auth()->user()->plan_id == $value->id) border-primary @endif">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">{{$value->title}}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{number_format($value->price)}} <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>{{$value->description}}</li>
                            </ul>
                            @if(auth()->check() && auth()->user()->plan_id == $value->id)
                                <a href="{{route('dashboard')}}" class="btn btn-sm btn-block btn-outline-primary disabled">Current PLan</a>
                            @elseif(auth()->check() && !empty(auth()->user()->plan_id))
                                <a href="{{route('plan.purchase', 'type='.$value->type.'&plan='.$value->title)}}" class="btn btn-sm btn-block btn-outline-primary">{{($value->title == 'Free')? 'FREE' : 'Upgrade Plan'}}</a>
                            @else
                                <a href="{{route('plan.purchase', 'type='.$value->type.'&plan='.$value->title)}}" class="btn btn-sm btn-block btn-outline-primary">{{($value->title == 'Free')? 'FREE' : 'Purchase Now'}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Yearly Tippler Pricing</h1>
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
    </div>
    <div class="container">
        <div class="row text-center">
            @foreach($yearlyPlans as $value)
                <div class="col-4">
                    <div class="card mb-4 box-shadow @if(auth()->check() && auth()->user()->plan_id == $value->id) border-primary @endif">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">{{$value->title}}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{number_format($value->price)}} <small class="text-muted">/ yr</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>{{$value->description}}</li>
                            </ul>
                            @if(auth()->check() && auth()->user()->plan_id == $value->id)
                                <a href="{{route('dashboard')}}" class="btn btn-sm btn-block btn-outline-primary disabled">Current PLan</a>
                            @elseif(auth()->check() && !empty(auth()->user()->plan_id))
                                <a href="{{route('plan.purchase', 'type='.$value->type.'&plan='.$value->title)}}" class="btn btn-sm btn-block btn-outline-primary">Upgrade Plan</a>
                            @else
                                <a href="{{route('plan.purchase', 'type='.$value->type.'&plan='.$value->title)}}" class="btn btn-sm btn-block btn-outline-primary">Purchase Now</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
