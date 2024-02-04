<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approve Airline') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold mb-6">Paid Booking</h1>
                    @foreach ($confirmedbooking->zip($flightdataconfirmed) as [$bookings, $data])
                        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden border border-gray-300 mb-4">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $data->no_flight }}</div>
                                <div class="font-bold text-xl mb-2">{{ $data->departure_city }}</div>
                                <div class="font-bold text-xl mb-2">{{ $data->arrival_city }}</div>
                                <p class="text-gray-700 text-base">{{ substr_replace($data->departure_time , "", -3)}}</p>
                                <p class="text-gray-700 text-base">{{ substr_replace($data->arrival_time , "", -3) }}</p>
                                <p class="text-gray-700 text-base">{{ $bookings->total_price }}</p>
                                <p class="text-gray-700 text-base">{{ $bookings->payment_status }}</p>
                                <p class="text-gray-700 text-base">{{ $bookings->name }}</p>
                                @if($bookings->payment_status == 'CONFIRMED')
                                <p class="text-gray-700 text-base">You're Ready to Check-in</p>
                                @endif
                                @if($bookings->payment_status == 'DECLINED')
                                <p class="text-gray-700 text-base">Your Payment Was Declined/p>
                                @endif
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold mb-6">On-going Booking</h1>
                    @foreach ($booking->zip($flightdata) as [$bookings, $data])
                        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden border border-gray-300 mb-4">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $data->no_flight }}</div>
                                <div class="font-bold text-xl mb-2">{{ $data->departure_city }}</div>
                                <div class="font-bold text-xl mb-2">{{ $data->arrival_city }}</div>
                                <p class="text-gray-700 text-base">{{ substr_replace($data->departure_time , "", -3)}}</p>
                                <p class="text-gray-700 text-base">{{ substr_replace($data->arrival_time , "", -3) }}</p>
                                <p class="text-gray-700 text-base">{{ $bookings->total_price }}</p>
                                <p class="text-gray-700 text-base">{{ $bookings->payment_status }}</p>
                                <p class="text-gray-700 text-base">{{ $bookings->seat }}</p>
                            </div>
                            <div class="px-6 py-4">
                                <x-primary-button class="ml-3" onclick="location.href='{{ route('pay.booking', $bookings->id_transaction) }}'">
                                    Pay Booking
                                </x-primary-button>
                                <x-danger-button class="btn btn-danger ml-3" onclick="cancelBooking('{{ route('cancel.booking', $bookings->id_transaction) }}')">
                                    Cancel Booking
                                </x-danger-button>

                            <script>
                                function cancelBooking(url) {
                                    if (confirm('Are you sure you want to cancel this booking?')) {
                                        window.location.href = url;
                                    }
                                }
                            </script>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>
