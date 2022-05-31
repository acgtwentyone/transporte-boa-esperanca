<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WorkRequest;
use App\Models\Work;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Helpers\WorkStatus;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Works/Index', [
            'works' => Work::orderByDesc('created_at')->paginate(8)->withQueryString()->through(function($work) {
                return [
                    'id' => $work->id,
                    'date' => $work->date,
                    'material' => $work->material,
                    'place' => $work->place,
                    'freight_value' => $work->freight_value,
                    'paid' => $work->paid,
                    'debt_value' => $work->debt_value,
                    'price' => $work->price,
                    'debt_date' => $work->debt_date,
                    'created_at' => $work->created_at,
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
     * @param  \App\Http\Requests\WorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkRequest $request)
    {
        $work = new Work;

        $work->date = $request->date;
        $work->material = $request->material;
        $work->place = $request->place;
        $work->paid = WorkStatus::NOT_PAID;

        if (isset($work->freight_value)) 
            $work->freight_value = $request->freight_value;
            
        if (isset($work->price))
            $work->price = $request->price;

        $work->save();

        return redirect()->route('works.index')->with('message', ['msg' => 'Trabalho registrado com successo.', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WorkRequest  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(WorkRequest $request, Work $work)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
}
