<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesModel extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    public function getSuppliersName(){
        return $this->belongsTo(SuppliersModel::class,'suppliers_id');

    }

}
