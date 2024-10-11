<?php

namespace App;

use App\Actualite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Categorieactu extends Model
{
    use HasFactory;
    
    protected $guarded = [''];

    public function actualites()
    {
        return $this->belongsToMany(Actualite::class);
    }
}
