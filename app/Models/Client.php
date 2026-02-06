<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Client extends Model
{
    // metodo one to one
    public function phone(): HasOne{
        return $this->hasOne(Phone::class);
    }

    //one to many
    public function phones(): HasMany{
        return $this->hasmany(Phone::class);
    }

    public function products():BelongsToMany{
        return $this->belongsToMany(Product::class,'orders','client_id','product_id');
    }
}
