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
        'property_id',
        'description',
        'created_by_id',
        'updated_by_id',
        'property_tag_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function property_tag()
    {
        return $this->belongsTo(PropertyTag::class, 'property_tag_id');
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
