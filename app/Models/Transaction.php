<?php

namespace App\Models;

use App\Models\User;
use App\Models\TravelPackage;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id', 'users_id', 'additional_visa',
        'transaction_total', 'transaction_status'
    ];

    protected $hidden = [

    ];

    public function details() {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    public function travel_package() {
        return $this->belongsTo(TravelPackage::class, 'transactions_id', 'id');
    }

    public function user() {
        return $this->hasMany(User::class, 'users_id', 'id');
    }


}
