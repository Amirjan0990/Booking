<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        // Валидация входных данных
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'seats' => 'required|integer|min:1',
            // Другие правила валидации, если необходимо
        ]);

        // Проверка доступности мест и времени
        if (!$this->checkAvailability($validatedData['date'], $validatedData['time'], $validatedData['seats'])) {
            return response()->json(['message' => 'Места на указанное время недоступны'], 400);
        }

        // Создание нового бронирования
        $booking = Booking::create([
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'seats' => $validatedData['seats'],
            // Другие поля, если есть
        ]);

        return response()->json(['message' => 'Бронирование создано', 'booking' => $booking], 201);
    }

    public function delete(Booking $booking)
    {
        // Удаление бронирования
        $booking->delete();

        return response()->json(['message' => 'Бронирование удалено'], 200);
    }

    private function checkAvailability($date, $time, $seats)
    {
        // Проверка наличия свободных мест для указанного времени и даты

        // Пример: Проверяем, что нет пересечений с существующими бронированиями
        $existingBookings = Booking::where('date', $date)
            ->where('time', $time)
            ->sum('seats');

        $availableSeats = 100; // Предположим, что у нас всего 100 мест

        // Проверяем, есть ли достаточно мест для нового бронирования
        if ($availableSeats - $existingBookings >= $seats) {
            return true; // Места доступны
        } else {
            return false; // Места недоступны
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'client_id'=>'required|exists:clients,id',
            'place_id'=>'required|exists:places,id',
            'start_time'=>'required',
            'end_time'=>'required',
            'guests_count'=>'required',
            'status'=>'required',
        ]);

        Booking::create([
            'client_id' => $request->client_id,
            'place_id' => $request->place_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'guests_count' => $request->guests_count,
            'status' => $request->status,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Bookings created successfully.');
    }

    public function show($id)
    {
        $bookings =Booking::findOrFail($id);
        return view('bookings.edit', compact('bookings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'guests_count' => 'required',
            'status' => 'required',
            'client_id' => 'required|exists:clients,id',
            'place_id' => 'required|exists:places,id',
        ]);

        $bookings = Booking::findOrFail($id);

        $bookings->client_id = $request->client_id;
        $bookings->place_id = $request->place_id;
        $bookings->start_time = $request->start_time;
        $bookings->end_time = $request->end_time;
        $bookings->guests_count = $request->guests_count;
        $bookings->status = $request->status;
        $bookings->save();

        return redirect()->route('bookings.index')->with('success', 'bookings updated successfully.');
    }

    public function destroy($id)
    {
        $bookings = Booking::findOrFail($id);
        $bookings->delete();
        return redirect()->route('bookings.index')->with('success', 'bookings deleted successfully.');
    }
}