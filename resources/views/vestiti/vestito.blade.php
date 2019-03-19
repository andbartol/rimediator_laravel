<div class="border shadow-small p-2 text-center">
    <img class="img-fluid" src="/images/{{ $vestito->immagine }}" />
    <h2 class="col-12">
        <a href="{{ route('vestiti.mostra',
                        ['vestito' => $vestito]) }}">
            {{ $vestito->nome }}
        </a>
    </h2> 
    <h3 class="header col-12">{{ $vestito->tipo->nome }}</h3> 
</div>
