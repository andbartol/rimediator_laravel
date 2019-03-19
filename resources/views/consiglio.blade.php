@extends ('layouts.app')

@section ('content')
<div class="container mt-4">
    <div class="row">
        <h1 class="header">
            Inserisci il tuo outfit di oggi manualmente
        </h1>
        <a href="{{ route('outfit.oggi') }}" class="ml-auto btn btn-primary">
            Inserisci
        </a>
    </div>
    <div class="row">
        <h1 class="header">
            Consigli del giorno
        </h1>
    </div>
    <div class="row mt-4">
        @for ($i = 0; $i < 5; $i++)
            @php
                $vestiti = $consigli[$i]['comb'];
            @endphp
            <div class="row">
            @foreach ($vestiti as $vestito)
                <div class="ml-auto mr-auto col-12 col-lg-3 offset-lg-1 my-3">
                    @include ('vestiti.vestito', ['vestito' => $vestito])
                </div>
            @endforeach
            </div>
        @endfor
    </div>
</div>
@endsection

@section ('script')
@endsection
