@extends ('layouts.app')

@section ('content')
<div class="container mt-4">
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
            @foreach ($vestiti as $vestito)
                <div class="offset-1 col-3 border shadow-small my-3">
                    <div class="my-2 text-center">
                        <img class="preview" src="/images/{{ $vestito->immagine }}" />
                        <h2>
                            <a href="{{ route('vestiti.mostra',
                                            ['vestito' => $vestito]) }}">
                                {{ $vestito->nome }}
                            </a>
                        </h2> 
                        <div class="w-100"></div>
                        <h3 class="header">{{ $vestito->tipo->nome }}</h3> 
                    </div>
                </div>
            @endforeach
        @endfor
    </div>
</div>
@endsection

@section ('script')
@endsection
