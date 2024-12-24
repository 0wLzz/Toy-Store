<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    // protected $fillable = [
    //     'invoice_header_id',
    //     'toy_id',
    //     'quantity',
    //     'subTotal'
    // ];

    public function toy() {
        return $this->belongsTo(Toy::class);
    }
}
