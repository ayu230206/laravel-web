<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'customer';

    // Primary key
    protected $primaryKey = 'customer_id';

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'address_line',
        'city',
        'state',
        'postal_code',
        'country',
        'membership_type',
        'registration_date',
        'last_purchase_date',
        'total_spent',
        'preferred_contact_method',
    ];
}
