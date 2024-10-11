<?php

namespace App;

use App\Categorieactu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Actualite extends Model
{
    use HasFactory;
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_heur_actu' => 'datetime',
    ];

    protected $guarded = [''];

    public function categories()
    {
        return $this->belongsToMany(Categorieactu::class, 'actualite_categorieactu_pivot', 'actualite_id', 'categorieactu_id');
    }

}
