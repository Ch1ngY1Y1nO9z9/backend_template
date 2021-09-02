<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
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
    protected $fillable = ['type' , 'name_ch', 'content_ch', 'datail_ch', 'sort', 'img','links', 'created_at', 'updated_at'];

    public function ProductType()
    {
        return $this->belongsTo('App\ProductType', 'product_type_id');
    }

    protected $table = 'products';
}
