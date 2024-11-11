@extends('base.base')

@section('content')
<div class="container my-4 mx-auto p-6">

    <form action="{{route('flight.booking', $flight->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="border-b border-gray-200 pb-3">

            <h2 class="text-2xl font-bold">Ticket Booking for: {{ $flight->flight_code }}</h2>
            <h3 class="mb-5">{{ $flight->origin}}->{{ $flight->destination }}</h3>
            <h3 class="font-normal">Departure: <h3 class="font-medium">{{ $flight->departure_time }}</h3></h3>
            <h3 class="font-normal">Arrival: <h3 class="font-medium">{{ $flight->arrival_time }}</h3></h3>

            <input type="hidden" name="flight_id" value="{{ $flight->id }}">

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="passanger_name" class="block text-sm font-medium leading-6 text-gray-900">passanger Name</label>
                    <div class="mt-2">
                        <input type="text" name="passanger_name" id="passanger_name" value="{{ old('passanger_name') }}" class="@error('passanger_name') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('passanger_name')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="passanger_phone" class="block text-sm font-medium leading-6 text-gray-900">passanger Phone</label>
                    <div class="mt-2">
                        <input type="text" name="passanger_phone" id="passanger_phone" maxlength="14" value="{{ old('passanger_phone') }}" class="@error('passanger_phone') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('passanger_phone')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="seat_number" class="block text-sm font-medium leading-6 text-gray-900">Seat Number</label>
                    <div class="mt-2">
                        <input type="text" name="seat_number" id="seat_number" maxlength="3" class="@error('seat_number') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('seat_number')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>                     
                
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/flights" class="rounded-md  bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Book Ticket</button>
            </div>
        </div>
    </form>
</div>  
@endsection