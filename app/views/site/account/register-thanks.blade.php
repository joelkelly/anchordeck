@extends('_layouts.master')

{{-- Page Title --}}
@section('title')
@parent
:: Thank You
@stop

{{-- Page content --}}
@section('content')

<div class="main-well">
<h3>Thank you {{$user}}</h3>
<p>Your account was created and is just waiting activation. You should recieve an email directly. If you do not recieve your email please check your spam folder.</p>
</div>
@stop