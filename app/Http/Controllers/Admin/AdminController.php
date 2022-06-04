<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Work;
use App\Models\Invoice;
use App\Models\Fuel;
use Illuminate\Support\Str;

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
            'clients' => $clients->take(3)->get()->map(function($client) {
                return [
                    'id' => $client->id,
                    'name' => $client->name,
                    'phone' => $client->phone,
                    'address' => $client->address,
                    'created_at' => $client->created_at->toDateTimeString(), 
                    'total_works' => $client->works()->count(),
                ];
            }),
            'works' => $works->take(3)->get()->map(function($work) {
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
            }),
            'fuels' => $fuels->take(3)->get()->map(function($invoice) {
                return [
                    'id' => $invoice->id,
                    'date' => $invoice->date,
                    'file' => $invoice->file,
                    'driver' => $invoice->driver,
                    'plate' => $invoice->plate,
                    'obs' => Str::of($invoice->obs)->length() > 50 ? Str::substr($invoice->obs, 0, 49) . '...' : $invoice->obs,
                    'created_at' => $invoice->created_at->toDateTimeString(), 
                ];
            }),
            'invoices' => $invoices->take(3)->get()->map(function($invoice) {
                return [
                    'id' => $invoice->id,
                    'date' => $invoice->date,
                    'file' => $invoice->file,
                    'obs' => Str::of($invoice->obs)->length() > 50 ? Str::substr($invoice->obs, 0, 49) . '...' : $invoice->obs,
                    'client' => $invoice->client->name,
                    'created_at' => $invoice->created_at->toDateTimeString(), 
                    'client' => $invoice->client,
                ];
            }),
            'total_clients' => $clients->count(),
            'total_works' => $works->count(),
            'total_invoices' => $invoices->count(),
            'total_fuels' => $fuels->count(),
        ]);
    }
}
