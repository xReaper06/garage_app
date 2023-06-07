<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $bikes = $user->Bikes;
        return view('bike.index', compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bike.create');
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
        $user->Bikes()->create([
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
        $bike = Bike::find($id);

        if (!$bike) {
            abort(404); // Or handle the error as desired
        }

        return view('bike.show', compact('bike'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $bike = Bike::find($id);

    if (!$bike) {
        abort(404);
    }

    return view('bike.edit', compact('bike'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bike = Bike::findOrFail($id);
        $request->validate([
            'platenumber'=> 'required|license_plate',
            'color' => 'required|string',
            'yearbought' => 'required|date',
        ]);
        $bike->update($request->only('platenumber','color','yearbought'));
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bike = Bike::findOrFail($id);
        if (!$bike) {
            abort(404); // Or handle the error as desired
        }
        $bike->delete();
        return $this->index();
    }
}
