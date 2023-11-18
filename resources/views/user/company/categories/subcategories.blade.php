<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}">{{--{{$subcategory->type.' : '}}--}}{{$dash}}{{$subcategory->title}}</option>
    @if(count($subcategory->categories))
        @include('user.company.categories.subcategories', ['subcategories' => $subcategory->categories])
    @endif
@endforeach
