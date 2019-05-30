<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Landlord extends Model
{
    use SoftDeletes;

    public $table = 'landlords';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'title',
        'phone',
        'email',
        'branch',
        'account',
        'kin_name',
        'kin_phone',
        'bank_name',
        'officer_id',
        'account_no',
        'created_at',
        'updated_at',
        'deleted_at',
        'kin_address',
        'account_name',
        'created_by_id',
        'updated_by_id',
        'address_office',
        'address_residence',
    ];

    public function officer()
    {
        return $this->belongsTo(User::class, 'officer_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }
}
