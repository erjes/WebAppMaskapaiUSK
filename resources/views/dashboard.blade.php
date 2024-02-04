<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Airplane Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Search Below
                </div>
                <form action="{{ route('search.tickets') }}" method="GET" class="p-6">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="w-full sm:w-auto sm:mr-2 mb-4">
                            <x-input-label for="departure_city" :value="__('Departure City')" />
                            <x-text-input id="departure_city" class="block mt-1 w-full" type="text" name="departure_city" :value="old('departure_city')"/>
                            <x-input-error :messages="$errors->get('departure_city')" class="mt-2" />
                        </div>

                        <div class="w-full sm:w-auto sm:mr-2 mb-4">
                            <x-input-label for="arrival_city" :value="__('Arrival City')" />
                            <x-text-input id="arrival_city" class="block mt-1 w-full" type="text" name="arrival_city" :value="old('arrival_city')"/>
                            <x-input-error :messages="$errors->get('arrival_city')" class="mt-2" />
                        </div>

                        <div class="w-full sm:w-auto sm:mr-2 mb-4">
                            <x-input-label for="departure_date" :value="__('Departure Date')" />
                            <x-text-input id="departure_date" class="block mt-1 w-full" type="date" name="departure_date" :value="old('departure_date')"/>
                            <x-input-error :messages="$errors->get('departure_date')" class="mt-2" />
                        </div>

                        <div class="w-full sm:w-auto mb-4">
                            <br>
                            <x-primary-button type="submit" class="block mt-1 text-center">
                                Search Tickets
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
