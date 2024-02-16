@extends("layouts.app")

@section("content")
    <div class="container">
        <h3>{{ $apartment->title }}</h3>
        <img src="{{ asset('storage/' . $apartment->images) }}" alt="{{$apartment->images}}" style="max-width: 500px">
        <p>Prezzo: {{ $apartment->price }} €/notte</p>
        <p>Numero stanze: {{ $apartment->rooms_number }}</p>
        <p>Numero bagni: {{ $apartment->bath_number }}</p>
        <p>Dimensioni appartamento{{ $apartment->dimensions }}</p>
        <p>Posti letto: {{ $apartment->beds_number }}</p>

        <button type="button" class="btn btn-warning btn-aggiungi mb-3"><a href="{{ route('admin.apartments.edit', $apartment->id) }}">Modifica</a></button>

        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>
@endsection