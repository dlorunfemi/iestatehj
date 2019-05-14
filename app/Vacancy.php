<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use SoftDeletes;

    public $table = 'vacancies';

    const IS_VACANT_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'rent',
        'is_vacant',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'created_by_id',
        'updated_by_id',
    ];

    public function properties()
    {
        return $this->belongsToMany(Product::class);
    }

    public function property_tags()
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
