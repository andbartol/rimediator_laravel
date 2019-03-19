@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row mt-3">
        <h1 class="header">I miei vestiti</h1>
    </div>
    <div class="row">
        <a class="ml-auto mt-2 mr-2 btn btn-primary"
            href="{{ route('vestiti.aggiungi') }}">
            Aggiungi
        </a>
    </div>
    <div class="row mb-3">
        <div class="w-100" id="vestiti">
            <table
                data-toggle="table"
                data-search="true">
                <thead>
                    <tr>
                        <th data-sortable="true">Nome</th>
                        <th data-sortable="true">Tipo</th>
                        <th data-sortable="false">Immagine</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($vestiti as $vestito)
                    <tr>
                        <td>
                            <a href="{{ route('vestiti.mostra', ['vestito' => $vestito]) }}">
                                {{ $vestito->nome }}
                            </a>
                        </td>
                        <td>{{ $vestito->tipo->nome }}</td>
                        <td>
                            <img class="preview" src="/images/{{ $vestito->immagine }}" />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

@section ('script')
@endsection
