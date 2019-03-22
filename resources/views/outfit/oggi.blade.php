@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row">
        <h1 class="header">
            Inserisci i tuoi vestiti di oggi
        </h1>
    </div>
    <form action="{{ route('outfit.oggi') }}" method="POST">
        @csrf



        <div id="selezioni">
        </div>

        <button type="submit" class="btn btn-primary">
            Invia
        </button>
        <i class="fas fa-plus"></i>



    </form>
</div>
@endsection

@section ('script')
    <script>
        var tipi = JSON.parse('{!! $tipi !!}');
    </script>
    <script src="/js/scelta.js"></script>
@endsection
