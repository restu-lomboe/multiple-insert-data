<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'customers';

    public function detail()
    {
        return $this->hasMany(DetailCustomer::class, 'customer_id');
    }
}
