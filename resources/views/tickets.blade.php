<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Airplane Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="p-6 text-gray-900">
                                Your Search
                            </div>
                            <div class=overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    @foreach ($query->zip($queryname) as [$ticket, $name])
                                    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden border border-gray-300 mb-4">
                                        <div class="px-6 py-4">
                                            <div class="font-bold text-xl mb-2">{{ $ticket->no_flight }}</div>
                                            <p class="text-gray-700 text-base">{{ $name }}</p>
                                            <p class="text-gray-700 text-base">{{ $ticket->departure_city}}</p>
                                            <p class="text-gray-700 text-base">{{ $ticket->arrival_city}}</p>
                                            <p class="text-gray-700 text-base">{{substr_replace($ticket->departure_time , "", -3)}}</p>
                                            <p class="text-gray-700 text-base">{{ substr_replace($ticket->arrival_time , "", -3)}}</p>
                                            <p class="text-gray-700 text-base">{{ $ticket->price }}</p>
                                        </div>
                                        <div class="px-6 py-4">
                                            {{-- <form action="{{ route('buy.ticket') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="id_flight" value="{{ $ticket->id_flight }}">
                                                <input type="hidden" name="id_user" value="{{ Auth::id(); }}">
                                                <x-primary-button type="submit">
                                                    Buy Ticket
                                                </x-primary-button>
                                            </form --}}
                                            <x-primary-button onclick="location.href='{{ route('buy.ticket', $ticket->id_flight) }}'">
                                                Buy Ticket
                                            </x-primary-button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </div>
</x-app-layout>
