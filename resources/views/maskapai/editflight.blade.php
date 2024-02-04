@extends('maskapai.maskapai')
@section('content')
<div class="container">
    @foreach($dataflight as $flight)
    <form action="{{ route('update.flight') }}" method="POST">
        @csrf
        <input type="hidden" name="id_flight" value="{{ $flight->id_flight }}">
        <div>
            <x-input-label for="no_flight" :value="__('No Flight')" />
            <x-text-input id="no_flight" class="block mt-1 w-full" type="text" name="no_flight" value="{{ $flight->no_flight }}"/>
            <x-input-error :messages="$errors->get('no_flight')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="departure_city" :value="__('Departure City')" />
            <x-text-input id="departure_city" class="block mt-1 w-full" type="text" name="departure_city" value="{{ $flight->departure_city }}"/>
            <x-input-error :messages="$errors->get('departure_city')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="arrival_city" :value="__('Arrival City')" />
            <x-text-input id="arrival_city" class="block mt-1 w-full" type="text" name="arrival_city" value="{{ $flight->arrival_city }}"/>
            <x-input-error :messages="$errors->get('arrival_city')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="departure_date" :value="__('Departure Date')" />
            <x-text-input id="departure_date" class="block mt-1 w-full" type="date" name="departure_date" value="{{ $flight->departure_date }}"/>
            <x-input-error :messages="$errors->get('departure_date')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="departure_time" :value="__('Departure Time')" />
            <x-text-input id="departure_time" class="block mt-1 w-full" type="time" name="departure_time" value="{{ $flight->departure_time }}"/>
            <x-input-error :messages="$errors->get('departure_time')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="arrival_date" :value="__('Arrival Date')" />
            <x-text-input id="arrival_date" class="block mt-1 w-full" type="date" name="arrival_date" value="{{ $flight->arrival_date  }}"/>
            <x-input-error :messages="$errors->get('arrival_date')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="arrival_time" :value="__('Arrival Time')" />
            <x-text-input id="arrival_time" class="block mt-1 w-full" type="time" name="arrival_time" value="{{ $flight->arrival_time  }}"/>
            <x-input-error :messages="$errors->get('arrival_time')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="seat_availability" :value="__('Seat Availability')" />
            <x-text-input id="seat_availability" class="block mt-1 w-full" type="number" name="seat_availability" value="{{ $flight->seat_availability }}"/>
            <x-input-error :messages="$errors->get('seat_availability')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ $flight->price }}"/>
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <x-primary-button type="submit" class="mt-3">
            Submit
        </x-primary-button>
    </form>
    @endforeach
</div>
@endsection
