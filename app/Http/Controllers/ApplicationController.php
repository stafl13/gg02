<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = auth()
            ->user()
            ->applications()
            ->latest()
            ->get();

        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        $cars = [

            'Toyota' => [
                'Camry',
                'Corolla'
            ],

            'BMW' => [
                'X5',
                'M5'
            ],

            'Mercedes' => [
                'E200',
                'GLE'
            ]
        ];

        return view('applications.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'address' => 'required',

            'phone' => [
                'required',
                'regex:/^\\+7\\(\\d{3}\\)-\\d{3}-\\d{2}-\\d{2}$/'
            ],

            'test_drive_date' => 'required|date',

            'test_drive_time' => 'required',

            'license_series' => 'required',

            'license_number' => 'required',

            'license_date' => 'required|date',

            'car_brand' => 'required',

            'car_model' => 'required',

            'payment_type' => 'required',

            'agree' => 'required'

        ]);

        Application::create([

            'user_id' => auth()->id(),

            'address' => $request->address,

            'phone' => $request->phone,

            'test_drive_date' => $request->test_drive_date,

            'test_drive_time' => $request->test_drive_time,

            'license_series' => $request->license_series,

            'license_number' => $request->license_number,

            'license_date' => $request->license_date,

            'car_brand' => $request->car_brand,

            'car_model' => $request->car_model,

            'payment_type' => $request->payment_type,
        ]);

        return redirect('/applications')
            ->with('success', 'Заявка успешно отправлена');
    }
}