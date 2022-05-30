<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Client;

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

        return Inertia::render('AdminDashboard', [
            'clients' => $clients->take(2)->get(),
            'total_clients' => $clients->count()
        ]);
    }
}
