<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/flights', [FlightController::class, 'show']);

Route::get('/flights/book/{flight:id}', [TicketController::class, 'showBookingForm'])->name('flight.showBookingForm');

Route::post('/ticket/submit', [TicketController::class, 'booking'])->name('flight.booking');

Route::get('/flights/ticket/{flight:id}', [TicketController::class, 'showCustomer'])->name('ticket.showCustomer');

Route::put('/ticket/board/{ticket:id}', [TicketController::class, 'update'])->name('ticket.update');

Route::delete('/ticket/delete/{ticket:id}', [TicketController::class, 'delete'])->name('ticket.delete');

