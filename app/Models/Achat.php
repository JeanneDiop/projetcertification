<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Achat extends Model
{
    use HasFactory;

    public function produitachat()
    {
        return $this->hasMany(Produit_Achat::class);
    }
}
