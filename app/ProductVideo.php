<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVideo extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['links','title_ch', 'sort','img'];
}
