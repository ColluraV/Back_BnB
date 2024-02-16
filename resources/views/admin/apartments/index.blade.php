@extends('layouts.app')
@section('content')
<div class="container">
<h2>Apartments test</h2>
@foreach ($apartments as $apartment)
<div class="d-flex justify-content-center my-2">
    <img src="{{ asset('storage/' . $apartment->images) }}" alt="{{$apartment->images}}" style="height: 300px">
    <ul>
        <h3>
            {{$apartment->title}}
        </h3>
            <li>
                indirizzo: {{$apartment->address}}
            </li>
            <li>
                num bagni: {{$apartment->bath_number}}
            </li>
            <li>
                num letti: {{$apartment->beds_number}}
            </li>
            <li>
                metratura: {{$apartment->dimensions}}mq
            </li>
            <li>
                lat: {{$apartment->latitude}}
            </li>
            <li>
                long: {{$apartment->longitude}}
            </li>
        </ul>
        <a class="btn btn-primary mx-2" href="{{route('admin.apartments.edit', $apartment->id)}}">Modifica</a>
        
        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger h-100">Elimina</button>
        </form>

    </div>
        
    @endforeach
</div>
<style>

</style>
@endsection