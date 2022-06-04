<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WorkRequest;
use App\Models\Work;
use App\Models\Client;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Helpers\WorkStatus;
use App\Helpers\ResponseMessage;
use App\Helpers\ResponseStatus;

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
                    'client' => $work->client,
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

            $msg = ResponseMessage::DEFAULT;
            $type = ResponseStatus::ERROR;

            $work = new Work;

            $client = Client::findOrFail($request->client_id);

            if (isset($client)) {

                $work->date = $request->date;
                $work->material = $request->material;
                $work->place = $request->place;
                $work->client_id = $request->client_id;
        
                if (isset($request->freight_value)) 
                    $work->freight_value = $request->freight_value;
                    
                if (isset($request->price))
                    $work->price = $request->price;

                if (isset($request->paid)) 
                    $work->paid = $request->paid['code'];
                else 
                    $work->paid = WorkStatus::NOT_PAID;
        
                $work->save();

                $msg = 'Trabalho registrado com successo.';
                $type = 'success';

            } 

        } catch(\Throwable $th) {
            // log to database
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
        return Inertia::render('Works/Show', [
            'work' => $work,
            'client' => $work->client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
    }

    public function editWork(Work $work, int $from_client=0)
    {
        return Inertia::render("Works/Edit", [
            'work' => $work,
            'from_client' => $from_client,
        ]);
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

    }

    public function updateWork(WorkRequest $request, Work $work, int $from_client=0)
    {
        try {

            $msg = ResponseMessage::DEFAULT;
            $type = ResponseStatus::ERROR;

            $client = $work->client;

            if (isset($client)) {

                $fields = ["date", "material", "place", "freight_value", "price"];

                foreach ($fields as $field) {
                    if (isset($request[$field])) 
                        $work->$field = $request[$field];
                }

                if (isset($request->paid) && isset($request->paid['code']) && ($request->paid['code'] == WorkStatus::PAID || $request->paid['code'] == WorkStatus::NOT_PAID))
                    $work->paid = $request->paid['code'];
        
                $work->save();

                $msg = 'Trabalho atualizado com successo.';
                $type = 'success';

            } 

        } catch(\Throwable $th) {
            // log error to database
        }

        return 1 == $from_client ? redirect()->route('clients.show', ['client' => $client])->with('message', ['msg' => $msg, 'type' => $type]) : redirect()->route('works.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        try {

            $msg = ResponseMessage::DEFAULT;
            $type = ResponseStatus::ERROR;
            
            $work->delete();

            $msg = 'Trabalho removido com successo.';
            $type = ResponseStatus::SUCCESS;
            
        } catch (\Throwable $th) {
            // log to database
        }

        return redirect()->back()->with('message', ['msg' => $msg, 'type' => $type]);
    }
}
