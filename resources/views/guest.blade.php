@extends('layouts.master')

@section('content')

<!-- banner start -->
<div class="banner banner-1 bg-cover">

    <div class="imgs-wrapper">
    <img src="/img/11.png" alt="veg" class="d-none d-lg-block">
    </div>

    <checkout-component></checkout-component>

    <div class="banner-slider">

        @foreach ($pizzas as  $pizza)
            <pizza-component :pizza=" {{ json_encode($pizza) }} "></pizza-component>
        @endforeach

    </div>

</div>
<!-- banner end -->

@endsection
