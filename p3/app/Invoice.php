<?php

namespace App;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //use HasFactory;
    
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
