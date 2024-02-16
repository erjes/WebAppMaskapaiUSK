@extends('maskapai.maskapai')
@section('content')
<div class="container">
    <form action="{{ route('search.flight') }}" method="GET" class="p-6">
        @csrf
        <div class="flex flex-wrap">
            <div class="w-full sm:w-auto sm:mr-2 mb-4">
                <x-input-label for="no_booking" :value="__('No Booking')" />
                <x-text-input id="no_booking" class="block mt-1 w-full" type="text" name="no_booking" :value="old('no_booking')"/>
                <x-input-error :messages="$errors->get('no_booking')" class="mt-2" />
            </div>

            <div class="w-full sm:w-auto mb-4">
                <br>
                <x-primary-button type="submit" class="block mt-1 text-center">
                    Search Flight
                </x-primary-button>
            </div>
        </div>
    </form>
</div>
<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID TRANSACTION</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID FLIGHT</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NO BOOKING</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">SEAT</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">TOTAL PRICE</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PAYMENT STATUS</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID USER</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($transaction as $flights)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->id_transaction }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->id_flight }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->no_booking }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->seat}}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->total_price }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->payment_status }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->id_user }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
