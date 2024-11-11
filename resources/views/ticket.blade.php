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

<div class="flex justify-center">
  <div class="table-responsive mt-6">
    <table class="table-auto border-collapse border border-gray-300 w-full max-w-4xl">
      <thead class="bg-gray-800 text-white">
        <tr>
          <th class="border border-gray-300 px-4 py-2">No.</th>
          <th class="border border-gray-300 px-4 py-2">Passanger Name</th>
          <th class="border border-gray-300 px-4 py-2">Passanger Phone</th>
          <th class="border border-gray-300 px-4 py-2">Seat Number</th>
          <th class="border border-gray-300 px-4 py-2">Boarding</th>
          <th class="border border-gray-300 px-4 py-2">Boarding Time</th>
          <th class="border border-gray-300 px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no=1;
        @endphp
        @foreach($tickets as $ticket) 
        <tr>
          <td class="border border-gray-300 px-4 py-2">{{ $no++ }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ $ticket->passanger_name }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ $ticket->passanger_phone }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ $ticket->seat_number}}</td>
          <td class="border border-gray-300 px-4 py-2">{{ $ticket->is_boarding? 'Yes' : 'No'}}</td>
          <td class="border border-gray-300 px-4 py-2">{{ $ticket->boarding_time }}</td>
          <td class="border border-gray-300 px-4 py-2 text-center">
          <form action="{{ route('ticket.update', [$ticket->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('put')
          @if($ticket->is_boarding == 1)
          <button type="submit" class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded" disabled='disabled'>Already Boarding</button>
          @else
          <button type="submit" class="bg-green-500 text-white hover:bg-green-400 px-4 py-2 rounded">
            <i class="fa fa-pencil"></i> Boarding
            </button>
          @endif
          </form>

          @if ($ticket->is_boarding == 0)
                <form action="{{ route('ticket.delete', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?');" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-200">
                        Delete
                    </button>
                </form>
                @else
                    <button disabled class="rounded-md bg-gray-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-200">Delete</button>
            @endif


          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a href="/flights" class="rounded-md inline-block place-items-center mt-5 bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Back</a>

  </div>
</div>

@endsection
