@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <img class="col-12 col-md-5 weather" src="/images/weather/sunny.svg" />
        <div class="text-secondary col-12 col-md-2 text-center weather"> 23 </div>
        <div class="text-secondary col-12 col-md-5 text-center weather"> Pesaro </div>
    </div>
    <div class="row">
        <a class="ml-auto mr-auto mt-2 btn btn-primary" href="{{ route('consiglio') }}">
            Consigliami qualcosa
        </a>
    </div>
</div>
@endsection
