<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\BusinessHour;
use App\Models\Customer;
use App\Models\Ourteam;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $ourteam = ourteam::all();
        $appointments = Appointment::all();

        // Calculate the start and end of the current week (Monday to Sunday)
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Generate an array of dates for the current week
        $weekDates = CarbonPeriod::create($startOfWeek, $endOfWeek);

        // Set the BusinessHour object attributes
        $obj = new BusinessHour();
        $obj->from = '09:00'; // Start time in 24-hour format
        $obj->to = '17:00';   // End time in 24-hour format
        $obj->step = 60;      // Step in minutes

        // Generate time slots for each day of the week
        $dates = [];
        foreach ($weekDates as $date) {
            $obj->day = $date->format('l');
            $times = $obj->timesPeriod;
            $dates[$date->toDateString()] = $times;
        }

        // Convert appointments to a simpler structure for checking
        $bookedTimes = $appointments->map(function ($appointment) {
            return [
                'date' => Carbon::parse($appointment->date)->toDateString(),
                'time' => Carbon::parse($appointment->start)->format('H:i')
            ];
        })->toArray();

        // Pass the data to the view
        return view('inplannen', [
            'appointments' => $appointments,
            'dates' => $dates,
            'bookedTimes' => $bookedTimes,
            'startOfWeek' => $startOfWeek,
            'endOfWeek' => $endOfWeek,
            'ourteam' => $ourteam,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'time' => 'required|string|max:10',
        ]);

        // Create a new customer
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();
        $datetime = Carbon::parse($request->date . ' ' . $request->time);

        // Create a new appointment
        $appointment = new Appointment();
        $appointment->date = Carbon::parse($request->date)->toDateString();
        $appointment->start = Carbon::parse($request->time)->toTimeString();
        $appointment->customer_id = $customer->id;
        $appointment->save();
        // dd($request->name);

        // Return a success response
        return response()->json(['message' => 'Appointment booked successfully'], 200);
    }
}
