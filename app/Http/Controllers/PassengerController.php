<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Passenger;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $name = $request->input('name');

        $passengers= Passenger::when(
            $name,
            fn($query, $name) => $query->name($name)
        );

        $passengers = $passengers->get();

     
        return view('passengers.index', ['passengers' => $passengers]);
    }
       
      
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Passenger $passenger)
    {
               return view('passengers.show', ['passenger' => $passenger]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
