<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $clients = Order::all();
        return view('clients.index', compact('clients'));
    }
    public function create()
    {
        return view('order.create');
    }
    public function destroy(Order $order, $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    }
    public function edit(Order $order, $id)
    {
        $order = Order::findOrFail($id);
        return view('order.edit', compact('order'));
    }
    public function show(Order $order, $id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|string',
            'order_dat' => 'required|string',
            'status' => 'required|string',
            'booking_id' => 'required|exists:users,id',
            'food_id' => 'required|exists:restaurants,id',
            'client_id' => 'required|exists:restaurants,id',
        ]);

        Order::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());
    }
}
