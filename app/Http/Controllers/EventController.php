<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->first();

        if (!empty($event)) {
            $user = Auth::user();

            $this->data['event'] = $event;
            $this->data['user'] = $user;

            return view('my-event.detail', $this->data);
        }

        return redirect('/');
    }

    public function doCheckout(OrderRequest $request)
    {
        $params = $request->except('_token');
        $event = Event::all();

        $order = DB::transaction(function () use ($params) {
            $order = $this->saveOrder($params);

            return $order;
        });


        if ($order) {
            Alert::success('Thank you!', 'Order has been accepted!');

            return redirect('events/received/' . $order->id);
        }

        return redirect('detail/' . $event->slug);
    }

    private function saveOrder($params)
    {
        $name = $params['name'];
        $email = $params['email'];
        $eventID = $params['id'];
        $price = $params['price'];

        $orderParams = [
            'user_id' => Auth::user()->id,
            'name' => $name,
            'email' => $email,
            'event_id' => $eventID,
            'price' => $price,
            'code' => Order::generateCode(),
        ];

        return Order::create($orderParams);
    }

    /**
     * Show the received page for success checkout
     *
     * @param int $orderId order id
     *
     * @return void
     */
    public function received($orderId)
    {
        $this->data['order'] = Order::where('id', $orderId)->where('user_id', Auth::user()->id)->with('event')->firstOrFail();

        return view('my-event.received', $this->data);
    }
}
