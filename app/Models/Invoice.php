<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    // protected $guarded = ["id"];
    protected $fillable = [
        'user_id',
        'total_price',
        'id'
    ];
    protected $table = 'invoice_headers';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Toy()
    {
        return $this->belongsTo(Toy::class);
    }

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_header_id');
    }

}
