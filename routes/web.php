<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $events = Event::where('event_date', '>=', now())
        ->orderBy('event_date', 'asc')
        ->get();

    return view('welcome', compact('events'));
});