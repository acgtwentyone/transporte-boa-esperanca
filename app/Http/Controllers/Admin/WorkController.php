<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WorkRequest;
use App\Models\Work;
use App\Models\Client;
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
                    'created_at' => $work->created_at->toDateTimeString(),
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

    public function newWork(Client $client)
    {
        return Inertia::render("Works/Create", [
            'client' => $client,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkRequest $request)
    {
        try {

            $msg = 'Algo deu errado';
            $type = 'error';

            $work = new Work;

            $client = Client::findOrFail($request->client_id);

            if (isset($client)) {

                $work->date = $request->date;
                $work->material = $request->material;
                $work->place = $request->place;
                $work->paid = WorkStatus::NOT_PAID;
                $work->client_id = $request->client_id;
        
                if (isset($request->freight_value)) 
                    $work->freight_value = $request->freight_value;
                    
                if (isset($request->price))
                    $work->price = $request->price;
        
                $work->save();

                $msg = 'Trabalho registrado com successo.';
                $type = 'success';

            } 

        } catch(\Throwable $th) {
            $msg = 'Oppss... Algo deu errado.';
        }

        return redirect()->route('clients.show', ['client' => $client])->with('message', ['msg' => $msg, 'type' => $type]);
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
