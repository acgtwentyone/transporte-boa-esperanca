<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Invoice extends Model
{
    use HasFactory;

    /**
     * 
     *
     * @param   string   aParam  Param
     *
     * @return  void
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
