<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Work;
use App\Models\Invoice;
use App\Models\Fuel;

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
        $invoices = Invoice::orderByDesc('created_at'); 
        $fuels = Fuel::orderByDesc('created_at'); 

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
                    'material' => $work->material,
                    'place' => $work->place,
                    'freight_value' => $work->freight_value,
                    'paid' => $work->paid,
                    'debt_value' => $work->debt_value,
                    'price' => $work->price,
                    'debt_date' => $work->debt_date,
                    'created_at' => $work->created_at->toDateTimeString(),
                ];
            }),
            'total_clients' => $clients->count(),
            'total_works' => $works->count(),
            'total_invoices' => $invoices->count(),
            'total_fuels' => $fuels->count(),
        ]);
    }
}
