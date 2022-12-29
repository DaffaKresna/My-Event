<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'DESC')->paginate(10);

        $this->data['events'] = $events;

        return view('my-event.index', $this->data);
    }

    public function createEvent()
    {
        return view('my-event.create');
    }
}
