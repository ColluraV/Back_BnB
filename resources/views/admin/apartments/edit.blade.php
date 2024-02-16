@extends('layouts.app')
@section('content')
    <h2>apartment creation and edit</h2>


    <form action="{{ route('admin.apartments.update', $apartment->id )}}" method="POST" enctype="multipart/form-data" id="form">
        @csrf()
        @method('put')

        <div class="alert alert-danger d-none" id="error">
            <p id="error-message"></p>
        </div>

        {{-- name --}}
        <div class="mb-3">
            <label class="form-label">Nome Appartamento</label>
            <input id="title" type="text" class="form-control form-control-sm" name="title"
                @if ($apartment) value="{{ old('title', $apartment->title) }}" @endif>
            @error('apartment_title')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- rooms number --}}
        <div class="mb-3">
            <label class="form-label">Numero Stanze</label>
            <input id="rooms_number" type="text" class="form-control form-control-sm" name="rooms_number"
                @if ($apartment) value="{{ old('rooms_number', $apartment->rooms_number) }}" @endif>
            @error('apartment_rooms')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- beds number --}}
        <div class="mb-3">
            <label class="form-label">Numero Letti</label>
            <input id="beds_number" type="text" class="form-control form-control-sm" name="beds_number"
                @if ($apartment) value="{{ old('beds_number', $apartment->beds_number) }}" @endif>
            @error('apartment_beds')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- bath number --}}
        <div class="mb-3">
            <label class="form-label">Nome Bagni</label>
            <input id="bath_number" type="text" class="form-control form-control-sm" name="bath_number"
                @if ($apartment) value="{{ old('bath_number', $apartment->bath_number) }}" @endif>
            @error('apartment_bath')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- dimensions --}}
        <div class="mb-3">
            <label class="form-label">Dimensioni appartamento</label>
            <input id="dimensions" type="text" class="form-control form-control-sm" name="dimensions"
                @if ($apartment) value="{{ old('dimensions', $apartment->dimensions) }}" @endif>
            @error('apartment_dimensions')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- address --}}
        <div class="mb-3">
            <label class="form-label">Indirizzo Appartamento</label>
            <input id="address" type="text" class="form-control form-control-sm" name="address"
                @if ($apartment) value="{{ old('address', $apartment->address) }}" @endif>
            <div class="position-relative" style="z-index: 999">
                <ul id="address-suggestions" class="list-group position-absolute w-100 overflow-auto"
                    style="max-height: 250px"></ul>
            </div>
            @error('apartment_address')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- images --}}
        <div class="mb-3">
            <label class="form-label">Immagine</label>

            @if ($apartment && $apartment !== 0)
            <div class="container">
                <h5>immagine attuale</h5>
                <img src="{{ asset('storage/' . $apartment->images) }}" alt="{{$apartment->images}}" style="max-width: 500px">

            </div>
            @endif
            <input type="file" enctype="multipart/form-data" accept="image/*"
                class="form-control @error('apartment_images') is-invalid @enderror" name="images">
            @error('apartment_images')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @foreach ($services as $service)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="services[]" id="type{{ $service->id }}"
                    value="{{ $service->id }}" @if (isset($apartment->services) && in_array($service->id, $apartment->services->pluck('id')->toArray())) checked @endif>
                <label class="form-check-label" for="type{{ $service->id }}">{{ $service->name }}</label>
            </div>
        @endforeach


        {{-- visibility --}}

        <div>
            <label for="" class="form-label">Vuoi che sia visibile?</label>
            <select id="visibility" name="visibility" class="form-select">
                <option @if (isset($apartment->visibility) && $apartment->visibility === 1) @selected(true) @endif value="1">Sì</option>
                <option @if (isset($apartment->visibility) && $apartment->visibility === 0) @selected(true) @endif value="0">No</option>
            </select>
        </div>

        <input type="submit" value="Conferma">
    </form>

    <script type="module" src="{{ asset('js/tomtom-suggestions.js') }}"></script>

    <script>
        const addressDOMElement = document.getElementById('address');
    </script>
@endsection
