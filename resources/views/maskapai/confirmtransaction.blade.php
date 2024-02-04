
@extends('maskapai.maskapai')
@section('content')

<div class="py-12 flex justify-center">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID TRANSACTION</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID FLIGHT</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NO BOOKING</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">SEAT</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">TOTAL PRICE</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PAYMENT STATUS</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
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
                <td class="px-6 py-4 whitespace-no-wrap">
                <x-secondary-button onclick="location.href='{{ route('confirm.transaction', $flights->id_transaction) }}'">
                   CONFIRM
                </x-secondary-button>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                <x-danger-button onclick="location.href='{{ route('decline.transaction', $flights->id_transaction) }}'">
                    DECLINE
                </x-danger-button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
