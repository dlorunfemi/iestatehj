<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use SoftDeletes;

    public $table = 'tenants';

    const IS_ACTIVE_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

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
        'kin_name',
        'kin_phone',
        'is_active',
        'work_place',
        'created_at',
        'updated_at',
        'deleted_at',
        'kin_address',
        'created_by_id',
        'updated_by_id',
    ];

    public function properties()
    {
        return $this->belongsToMany(Product::class);
    }

    public function apartments()
    {
        return $this->belongsToMany(ProductTag::class);
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
