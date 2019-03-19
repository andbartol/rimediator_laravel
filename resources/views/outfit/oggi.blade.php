@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row">
        <h1 class="header">
            Inserisci i tuoi vestiti di oggi
        </h1>
    </div>
    <div class="row mt-2">
        {{-- Qui ci va l'interfaccia per selezionare un vestito --}}
        <div class="col-12">
            @include('vestiti.selezione',
                [
                    'tipi' => $tipi,
                ])
        </div>
    </div>
</div>
@endsection

@section ('script')
<script>
    $('#tipo').on('change', function() {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var v = $('#vestito');
                v.prop('disabled', false);
                var vestiti = JSON.parse(this.responseText);
                $('#vestito option').remove();
                vestiti.forEach(function (vestito) {
                    var o = new Option(vestito.nome, vestito.id);
                    $(o).data('img', vestito.immagine);
                    v.append(o);
                });
                v.trigger('change');
            }
        };

        xhttp.open('GET', '/vestiti/tipo/'+this.value, true);
        xhttp.send();
    });

    $('#vestito').on('change', function() {
        var option = $("option:selected", this);
        $('#vestito_image').attr('src', '/images/'+option.data('img'));
        {{--alert(option.data('img'));--}}
    });
</script>
@endsection
