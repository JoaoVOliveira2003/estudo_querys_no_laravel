<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function clients():BelongsToMany{
        return $this->belongsToMany(Product::class,'clients','product_id','client_id');
    }
}

