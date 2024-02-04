<x-app-layout>
    <div class="container">
        <form action="{{ route('create.customer', $id) }}" method="POST">
            @csrf
            <input type="hidden" name="id_user" value="{{ Auth::id(); }}">
            <div>
                <x-input-label for="name" :value="__('Nama Customer')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="phone_number" :value="__('Phone Number')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')"/>
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="address" :value="__('Customer Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"/>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <x-primary-button type="submit" class="ml-3">
                Submit
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
