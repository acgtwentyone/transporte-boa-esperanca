<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Work;

class AdminController extends Controller
{
    
    /**
     * 
     *
     * @param   string   aParam  Param
     *
     * @return  void
     */
    public function index ()
    {
        $clients = Client::orderByDesc('created_at'); 
        $works = Work::orderByDesc('created_at'); 

        return Inertia::render('AdminDashboard', [
            'clients' => $clients->take(5)->get()->map(function($client) {
                return [
                    'id' => $client->id,
                    'name' => $client->name,
                    'phone' => $client->phone,
                    'address' => $client->address,
                    'created_at' => $client->created_at->toDateTimeString(), 
                ];
            }),
            'works' => $works->take(5)->get()->map(function($work) {
                return [
                    'id' => $work->id,
                    'date' => $work->date,
                    'place' => $work->place,
                    'created_at' => $work->created_at->toDateTimeString(), 
                ];
            }),
            'total_clients' => $clients->count(),
            'total_works' => $works->count(),
        ]);
    }
}
