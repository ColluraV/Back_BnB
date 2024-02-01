@extends('layouts.app')
@section('content')
    <h2>apartment creation and edit</h2>
    @if ($apartment !== 0)

        @dump($apartment)
        
    @endif

    <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data" id="form">
        @csrf()

        <div class="alert alert-danger d-none" id="error">
            <p id="error-message"></p>
        </div>

        {{-- name --}}
        <div class="mb-3">
            <label class="form-label">Nome Appartamento</label>
            <input id="title" type="text" class="form-control form-control-sm" name="title"
                value="{{ old('title', $apartment->title) }}">
            @error('apartment_title')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- rooms number --}}
        <div class="mb-3">
            <label class="form-label">Numero Stanze</label>
            <input id="rooms_number" type="text" class="form-control form-control-sm" name="rooms_number"
                value="{{ old('rooms_number', $apartment->rooms_number) }}">
            @error('apartment_rooms')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- beds number --}}
        <div class="mb-3">
            <label class="form-label">Numero Letti</label>
            <input id="beds_number" type="text" class="form-control form-control-sm" name="beds_number"
                value="{{ old('beds_number', $apartment->beds_number) }}">
            @error('apartment_beds')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- bath number --}}
        <div class="mb-3">
            <label class="form-label">Nome Bagni</label>
            <input id="bath_number" type="text" class="form-control form-control-sm" name="bath_number"
                value="{{ old('bath_number', $apartment->bath_number) }}">
            @error('apartment_bath')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- dimensions --}}
        <div class="mb-3">
            <label class="form-label">Dimensioni appartamento</label>
            <input id="dimensions" type="text" class="form-control form-control-sm" name="dimensions"
                value="{{ old('dimensions', $apartment->dimensions) }}">
            @error('apartment_dimensions')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- address --}}
        <div class="mb-3">
            <label class="form-label">Indirizzo Appartamento</label>
            <input id="address" type="text" class="form-control form-control-sm" name="address"
                value="{{ old('address', $apartment->address) }}">
            @error('apartment_address')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- images --}}
        <div class="mb-3">
            <label class="form-label">Immagine</label>
            <input type="file" accept="image/*" class="form-control @error('apartment_images') is-invalid @enderror"
                name="apartment_images">
            @error('apartment_images')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- visibility --}}

        <div>
            <label for="" class="form-label">Vuoi che sia visibile?</label>
            <select id="visibility" name="visibility" class="form-select">
                <option @if ($apartment->visibility==1) @selected(true) @endif value="1" >Sì</option>
                <option @if ($apartment->visibility==0) @selected(true) @endif value="0" >No</option>
            </select>
        </div>

        <input type="submit" value="Conferma">
    </form>
@endsection
