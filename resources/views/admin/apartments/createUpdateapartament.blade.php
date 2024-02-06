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
              @if($apartment)
                value="{{ old('title', $apartment->title) }}"
              @endif >
            @error('apartment_title')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- rooms number --}}
        <div class="mb-3">
            <label class="form-label">Numero Stanze</label>
            <input id="rooms_number" type="text" class="form-control form-control-sm" name="rooms_number"
               @if($apartment)
                value="{{ old('rooms_number', $apartment->rooms_number) }}"
               @endif >
            @error('apartment_rooms')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- beds number --}}
        <div class="mb-3">
            <label class="form-label">Numero Letti</label>
            <input id="beds_number" type="text" class="form-control form-control-sm" name="beds_number"
            @if($apartment)
            value="{{ old('beds_number', $apartment->beds_number) }}" 
            @endif>
            @error('apartment_beds')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- bath number --}}
        <div class="mb-3">
            <label class="form-label">Nome Bagni</label>
            <input id="bath_number" type="text" class="form-control form-control-sm" name="bath_number"
              @if($apartment)
                value="{{ old('bath_number', $apartment->bath_number) }}"
              @endif  >
            @error('apartment_bath')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- dimensions --}}
        <div class="mb-3">
            <label class="form-label">Dimensioni appartamento</label>
            <input id="dimensions" type="text" class="form-control form-control-sm" name="dimensions"
            @if($apartment)
                 value="{{ old('dimensions', $apartment->dimensions) }}"
            @endif >
            @error('apartment_dimensions')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- address --}}
        <div class="mb-3">
            <label class="form-label">Indirizzo Appartamento</label>
            <input id="address" type="text" class="form-control form-control-sm" name="address"
            @if($apartment)
                 value="{{ old('address', $apartment->address) }}"
            @endif  >
            @error('apartment_address')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        @dump($services);

        {{-- images --}}
        <div class="mb-3">
            <label class="form-label">Immagine</label>
            <input type="file" accept="image/*" class="form-control @error('apartment_images') is-invalid @enderror"
                name="apartment_images">
            @error('apartment_images')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @foreach ($services as $service)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="services[]" id="type{{ $service->id }}" value="{{ $service->id }}" {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
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
   
    <script>
        const adressDOMElement = document.getElementById('address');
        const latitudeDOMElement = document.getElementById('latitude');
        const longitudeDOMElement = document.getElementById('longitude');
        const locationsDOMElement = document.getElementById('locations');
        let timer;

        address.addEventListener('keyup', (event) => {
            clearTimeout(timer);
            timer = setTimeout(() => {
                callApi();
            }, 500);
        });

        function callApi() {
            if (adressDOMElement.value.length >= 5) {
                const params = new URLSearchParams({
                    location: adress.value
                });
                const url = 'api/geodata?' + params.toString();
                axios.get(url).then(response => {
                    console.log(response.data);
                    createLocationsList(response.data);
                });
            }
        }

        function createLocationsList(locations) {
            locationsDOMElement.innerHTML = '';
            locationsDOMElement.classList.remove('d-none');

            locations.forEach(location => {
                const listItemDOMElement = document.createeElement('li');
                listItemDOMElement.classList.add('list-group-item');
                listItemDOMElement.setAttribute('role', 'button');

                listItemDOMElement.innerText = location.adress;

                listItemDOMElement.addEventListener('click', () => {
                    latitudeDOMElement.value = location.position.latitude;
                    longitudeDOMElement.value = location.position.longitude;
                    adressDOMElement.value = location.adress;
                    locationsDOMElement.classList.add('d-none');
                    locationsDOMElement.innerHTML = '';
                });

                locationsDOMElement.append(listItemDOMElement)
            });

        }
    </script>
@endsection
