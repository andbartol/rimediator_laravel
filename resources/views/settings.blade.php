@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12 my-2 p-2 border shadow">
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="latitude">Latitudine</label>
                <input class="form-control" type="text" name="latitude" />
            </div>
            <div class="form-group">
                <label for="longitude">Longitudine</label>
                <input class="form-control" type="text" name="longitude" />
            </div>
            <button type="submit" class="btn btn-primary">
                Salva
            </button>
        </form>
    </div>
</div>
@endsection

@section('script')
@endsection
