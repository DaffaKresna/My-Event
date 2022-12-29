<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventImageRequest;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\Request;

use Session;
use Str;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'orders';

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'DESC')->paginate(5);

        $this->data['events'] = $events;

        return view('admin.events.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();

        $this->data['events'] = $events;
        $this->data['eventID'] = 0;

        return view('admin.events.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['event_name']);

        if (Event::create($params)) {
            Session::flash('success', 'Event has been added');
        }

        return redirect('admin/events');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        $this->data['event'] = $event;
        $this->data['eventID'] = $event->id;

        return view('admin.events.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['event_name']);

        $event = Event::findOrFail($id);

        if ($event->update($params)) {
            Session::flash('success', 'Event has been updated');
        }

        return redirect('admin/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->delete()) {
            Session::flash('success', 'Event has been deleted successfully');
        }

        return redirect('admin/events');
    }

    public function images($id)
    {
        $event = Event::findOrFail($id);

        $this->data['eventID'] = $event->id;
        $this->data['eventImages'] = $event->eventImages;


        return view('admin.events.images', $this->data);
    }

    public function add_image($id)
    {
        $event = Event::findOrFail($id);

        $this->data['eventID'] = $event->id;
        $this->data['event'] = $event;

        return view('admin.events.image_form', $this->data);
    }

    public function upload_image(EventImageRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $event->slug . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = '/uploads/events/images';
            $filePath = $image->storeAs($folder, $fileName, 'public');

            $params = [
                'event_id' => $event->id,
                'path' => $filePath,
            ];

            if (EventImage::create($params)) {
                Session::flash('success', 'Image uploaded successfully');
            } else {
                Session::flash('error', 'Image failed to upload');
            }

            return redirect('admin/events/' . $id . '/images');
        }
    }

    public function remove_image($id)
    {
        $image = EventImage::findOrFail($id);

        if ($image->delete()) {
            Session::flash('success', 'Gambar telah dihapus');
        }

        return redirect('admin/events/' . $image->event->id . '/images');
    }
}
