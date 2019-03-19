@extends ('layouts.app')

@section ('content')
<div class="bg-welcome">
    <div class="container">
        <div class="offset-lg-8 col-lg-4">
            <h1 class="bg">
              Benvenuti su Rimediator, per le
              persone che la mattina proprio
              non si sanno rimediare
            </h1>
            <div class="w-100" />
            <a class="btn btn-primary mx-auto" href="{{ route('login') }}">
                Comincia ora
            </a>
        </div>
    </div>
</div>
@endsection
