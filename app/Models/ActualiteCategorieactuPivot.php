<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ActualiteCategorieactuPivot extends Pivot
{
    use HasFactory;

    protected $table = "actualite_categorieactu";

    protected $guarded = [''];
}
