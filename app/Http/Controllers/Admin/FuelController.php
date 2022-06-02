<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreFuelRequest;
use App\Http\Requests\UpdateFuelRequest;
use App\Models\Fuel;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Support\Str;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Fuels/Index', [
            'fuels' => Fuel::orderByDesc('created_at')->paginate(3)->withQueryString()->through(function($invoice) {
                return [
                    'id' => $invoice->id,
                    'date' => $invoice->date,
                    'file' => $invoice->file,
                    'driver' => $invoice->driver,
                    'plate' => $invoice->plate,
                    'obs' => Str::of($invoice->obs)->length() > 50 ? Str::substr($invoice->obs, 0, 49) . '...' : $invoice->obs,
                    'created_at' => $invoice->created_at->toDateTimeString(), 
                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFuelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFuelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function show(Fuel $fuel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuel $fuel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFuelRequest  $request
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFuelRequest $request, Fuel $fuel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuel $fuel)
    {
        //
    }
}
