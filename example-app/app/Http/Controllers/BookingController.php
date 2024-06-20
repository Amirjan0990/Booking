<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Подключаем модель Booking

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all(); // Получаем все бронирования
        return view('bookings.index', ['bookings' => $bookings]);
    }

    public function show($id)
    {
        $booking = Booking::find($id); // Находим бронирование по id
        return view('bookings.show', ['booking' => $booking]);
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
        ]);

        $booking = Booking::create($validatedData); // Создаем новое бронирование

        return redirect('/bookings/' . $booking->id);
    }

    public function edit($id)
    {
        $booking = Booking::find($id); // Находим бронирование по id
        return view('bookings.edit', ['booking' => $booking]);
    }

    public function update(Request $request, $id)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
        ]);

        Booking::whereId($id)->update($validatedData); // Обновляем данные бронирования

        return redirect('/bookings/' . $id);
    }

    public function destroy($id)
    {
        $booking = Booking::find($id); // Находим бронирование по id
        $booking->delete(); // Удаляем бронирование

        return redirect('/bookings');
    }
}

