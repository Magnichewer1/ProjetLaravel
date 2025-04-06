<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biographie extends Model
{
    protected $fillable = ['membre_id', 'description'];
    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }
}
