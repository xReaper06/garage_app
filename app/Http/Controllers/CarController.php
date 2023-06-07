<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $cars = $user->Cars;
        return view('car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'platenumber'=> 'required|license_plate',
            'color' => 'required|string',
            'model' => 'required|string',
            'brand' => 'required|string',
            'yearbought' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $user = Auth::user();
        $image = $request->file('image')->store('images','public');
        $user->Cars()->create([
            'platenumber' => $request->platenumber,
            'color' => $request->color,
            'model' => $request->model,
            'brand' => $request->brand,
            'yearbought' => $request->yearbought,
            'image' => $image,
        ]);
        return back()->with('success', 'Image uploaded successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Car::find($id);
        if(!$car){
            abort(404);
        }
        return view('car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $car = Car::find($id);
        return view('car.edit', compact(['car']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'platenumber'=> 'required|license_plate',
            'color' => 'required|string',
            'yearbought' => 'required|date',
        ]);
        $car = Car::findOrFail($id);
        $car->update($request->only('platenumber','color','yearbought'));
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return $this->index();
    }
}
