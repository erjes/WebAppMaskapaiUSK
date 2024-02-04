@extends('admin.admin')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approve Airline') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold mb-6">Unvalidated Airlines</h1>
                    @foreach ($unvalidatedAirline as $airline)
                        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden border border-gray-300 mb-4">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $airline->name }}</div>
                                <p class="text-gray-700 text-base">{{ $airline->role }}</p>
                            </div>
                            <div class="px-6 py-4">
                                <form action="{{ route('admin.approve') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $airline->id }}">
                                    <input type="hidden" name="name" value="{{ $airline->name }}">
                                    <x-primary-button type="submit">
                                        Approve
                                    </x-primary-button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold mb-6">Validated Airlines</h1>
                    @foreach ($validatedAirline as $airline)
                        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden border border-gray-300 mb-4">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $airline->name }}</div>
                                <p class="text-gray-700 text-base">{{ $airline->role }}</p>
                            </div>
                            <div class="px-6 py-4">
                                <form action="{{ route('admin.delete') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $airline->id }}">
                                    <x-danger-button type="submit" class="ml-3">
                                        Delete Airline
                                    </x-danger-button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
