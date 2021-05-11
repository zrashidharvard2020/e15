<?php

namespace App;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItems extends Model
{
    //use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice_items';

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
