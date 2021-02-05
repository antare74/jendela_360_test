<?php

namespace App\Models\invoices;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoices extends Model
{
    use SoftDeletes;
    protected $table    = 'invoices';
    protected $guarded  = [];

    public function getGenerateInvoiceAttribute(){
        return 'INV'.Carbon::now()->timestamp;
    }
}
