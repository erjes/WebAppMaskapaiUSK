
@extends('maskapai.maskapai')
@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 text-gray-900">
            <x-primary-button onclick="location.href='{{ route('add.flight') }}'"  type="submit" class="ml-3">
                Add Flight
            </x-primary-button>
        </div>
    </div>
</div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                {{-- <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Flight ID</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Airline ID</th> --}}
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Flight Number</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Departure City</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Arrival City</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Departure Date</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Departure Time</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Arrival Date</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Arrival Time</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Seat Availability</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($flight as $flights)
            <tr>
                {{-- <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->id_flight }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->id_airline }}</td> --}}
                <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->no_flight }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->departure_city }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->arrival_city }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->departure_date }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ substr_replace($flights->departure_time , "", -3)}}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->arrival_date }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ substr_replace($flights->arrival_time, "", -3)}}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->seat_availability }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ $flights->price }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">
                <x-secondary-button onclick="location.href='{{ route('edit.flight', $flights->id_flight) }}'">
                    Edit Flight
                </x-secondary-button>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    <form action="{{ route('delete.flight', $flights->id_flight) }}" method="post">
                        @csrf
                        <x-danger-button>
                            Delete Flight
                        </x-danger-button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
