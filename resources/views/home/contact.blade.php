@extends('layouts.app')

@section('title', $title)

@section('subtitle', $subtitle)

@section('content')

<div class="container">

<div class="row">

<div class="col-lg-4 me-auto">

<p class="lead">{{ $mail }}</p>
<p class="lead">{{ $address }}</p>
<p class="lead">{{ $phone }}</p>

</div>

</div>

</div>

@endsection