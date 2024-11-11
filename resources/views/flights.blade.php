@extends('base.base')

@section('content')

@if(session('success'))
    <div id="success-alert" class="fixed mx-auto mt-4 w-1/3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md" role="alert">
        <div class="flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="text-green-700 hover:text-green-900 font-bold ml-4">
                &times;
            </button>
        </div>
    </div>
@endif

<!-- card flight -->
<div class="container my-4 mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">

@foreach($flights as $flight)
<div class="bg-white dark:bg-slate-800 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
    <div class="left">
    <h1 class="text-slate-900 mt-5 font-bold text-2xl">{{ $flight['flight_code']}}</h1>
    <h3 class="text-slate-900 dark:text-white text-base font-medium tracking-tight mb-5">{{ $flight['origin']}} -> {{ $flight['destination']}}</h3>
    </div>
    <div class="left">
    <h3 class="text-slate-900 dark:text-white text-base font-normal tracking-tight">Derpature:</h3>
    <h3 class="text-slate-900 dark:text-white text-base font-medium italic tracking-tight">{{ $flight['departure_time'] }}</h3>
    <h3 class="text-slate-900 dark:text-white text-base font-normal tracking-tight">Arrive:</h3>
    <h3 class="text-slate-900 dark:text-white text-base font-medium italic tracking-tight">{{ $flight['arrival_time']}}</h3>
    </div>
</p>

<div class="mt-10 flex items-center justify-center">
    <a href="{{ route('flight.showBookingForm', [$flight->id]) }}" class="rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold hover:bg-indigo-400 text-white mr-1">Book Ticket</a>
    <a href="{{ route('ticket.showCustomer', [$flight->id]) }}" class="rounded-md bg-yellow-400 px-3 py-3 text-sm font-semibold hover:bg-yellow-300 text-white ml-1">View Details</a>

    
</div>

</div>
@endforeach

</div>

@endsection