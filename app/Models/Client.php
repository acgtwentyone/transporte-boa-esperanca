<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Work;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'address', 'phone'];

    public function works() {
        return $this->hasMany(Work::class);
    }
}
