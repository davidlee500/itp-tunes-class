<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $primaryKey='InvoiceLineId';
    public $timestamps = false;

    public function invoice(){
        return $this->belongsTo('App\Invoice','InvoiceLineId');
    }
}
