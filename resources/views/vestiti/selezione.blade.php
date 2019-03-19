<div class="offset-md-3 col-md-6 border shadow-small p-2 text-center">
    <img id="vestito_image" src="#" class="my-2 img-fluid" />
    <select class="col-12 form-control" id="tipo">
        <option value="" disabled selected>
            Scegli una tipologia
        </option>
    @foreach ($tipi as $tipo)
        <option value="{{ $tipo->id }}">
            {{ $tipo->nome }}
        </option>
    @endforeach
    </select>
    <select class="col-12 mt-2 form-control" id="vestito" disabled >
        <option class="vestito" value="" disabled selected>
            Vestito
        </option>
    </select>
</div>
