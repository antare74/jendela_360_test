<?php

namespace App\Models\Products;

use App\Models\invoices\Invoices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Products extends Model
{
    use SoftDeletes;
    protected $table    = 'products';
    protected $guarded  = [];

    public function invoices(){
        return $this->hasMany(Invoices::class,'products_id', 'id');
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($product) {
            $product->invoices()->delete();
        });
    }
}
