@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="offset-md-2 col-md-8">
        <form action="{{ route('vestiti.aggiungi') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="text-center mt-2">
                    <img class="preview w-100" id="prev" />
                </div>
                <div class="w-100" />
                <label for="immagine">{{ __('Immagine') }}</label>
                <input id="img-upload" class="form-control" type="file" name="immagine" />
            </div>
            <div class="form-group">
                <label for="nome">{{ __('Nome') }}</label>
                <input class="form-control" type="text" name="nome" 
                    placeholder="{{ __('Maglietta rossa') }}"/>
            </div>
            <div class="form-group">
                <label for="tipo">{{ __('Tipo') }}</label>
                <select class="form-control" name="tipo">
                @foreach ($tipi as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Conferma') }}
            </div>
        </form>
    </div>
</div>
@endsection

@section ('script')
<script>
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#prev').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#img-upload").change(function() {
      readURL(this);
    });
</script>
@endsection
