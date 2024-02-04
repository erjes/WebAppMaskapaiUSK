<x-app-layout>
    <form action="{{ route('add.customer.toticket') }}" method="POST" class="p-6">
        @csrf
        <div class="w-full sm:w-auto sm:mr-2 mb-4">
            <x-input-label for="id_customer" :value="__('Customer Name')" />
            <select id="id_customer" name="id_customer" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Select Customer</option>
                @foreach($customer as $customers)
                    <option value="{{ $customers->id_customer }}">{{ $customers->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_customer')" class="mt-2" />
        </div>

        <div class="w-full sm:w-auto mb-4">
            <x-primary-button type="submit" class="block mt-1 text-center">
                Add Customer To Booking
            </x-primary-button>
            <x-secondary-button onclick="location.href='{{ route('add.customer',$id)}}'">
                New Customer
            </x-secondary-button>
        </div>
    </form>

        @csrf
        <div class="flex flex-wrap p-6">
            <div class="w-full sm:w-auto sm:mr-2 mb-4">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer_status as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>
                                <form action="{{ route('remove.customer.fromticket') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="id_customer" value="{{ $customer->id_customer }}">
                                    <x-danger-button type="submit">
                                        Delete From Booking
                                    </x-danger-button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <form action="{{ route('make.transaction',$id) }}" method="POST">
            @csrf
            <div class="p-6">
                @foreach($flight as $data)
                <input type="hidden" name="price" value="{{ $data->price }}">
                <p class="font-bold text-l text-gray-900 mb-1">Ticket Price</p>
                <p class="text-gray-700 text-l">{{ $data->price }}</p>
                <p class="font-bold text-l text-gray-900 mb-1">Seat Availability</p>
                <p class="text-gray-700 text-l">{{ $data->seat_availability }}</p>
                <p class="font-bold text-l text-gray-900 mb-1">Total Price</p>
                <p class="text-gray-700 text-l">{{ $data->price *  $pendingamount}}</p>
                @endforeach
                <x-primary-button type="submit" class="block mt-1 text-center">
                    Book Ticket
                </x-primary-button>
            </div>
        </form>
</x-app-layout>
