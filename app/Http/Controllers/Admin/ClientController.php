<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $params = [
            'clients' => Client::orderByDesc('created_at')->when($request->term, function($query, $term) {
                $query->where('name', 'LIKE', '%'. $term .'%');
            })->paginate(8)->withQueryString()->through(function($client) {
                return [
                    'id' => $client->id,
                    'name' => $client->name,
                    'phone' => $client->phone,
                    'address' => $client->address,
                    'created_at' => $client->created_at->toDateTimeString(), 
                ];
            }),
        ];

        return Inertia::render('Clients/Index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Clients/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        try {

            $client = new Client;

            $client->name = $request->name;
            $client->phone = $request->phone;
            $client->address = $request->address;

            $client->save();

            return redirect()->route('clients.index')->with('message', ['msg' => 'Cliente registrado com successo.', 'type' => 'success']);
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return Inertia::render('Clients/Show', [
            'client' => $client,
            'works' => $client->works()->orderByDesc('created_at')->paginate(8)->withQueryString()->through(function($work) {
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
                    'client_id' => $work->client_id,
                ];
            }),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return Inertia::render('Clients/Edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        try {

            $client->update($request->all());

            return redirect()->route('clients.index')->with('message', ['msg' => 'Cliente atualizado com successo.', 'type' => 'success']);
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        try {
            
            $client->delete();

            return redirect()->back()->with('message', ['msg' => 'Cliente removido com successo.', 'type' => 'success']);
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
