<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    public function biographie()
    {
        return $this->hasOne(Biographie::class);
    }
}
