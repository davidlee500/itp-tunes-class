<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey='InvoiceId';
    public $timestamps = false;

    public function invoiceItems(){
        return $this->hasMany('App\InvoiceItem','InvoiceId');
    }
}
