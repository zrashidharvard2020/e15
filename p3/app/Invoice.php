<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    
    /**
     * Get the customer that owns the invoice.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    /**
     * Get the items for the invoice.
     */
    public function items()
    {
        return $this->hasMany('App\InvoiceItems');
    }
}
