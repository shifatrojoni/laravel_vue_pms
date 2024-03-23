<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicesModel extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    public function getCustomersName(){
        return $this->belongsTo(CustomersModel::class,'customers_id');
    }
}
