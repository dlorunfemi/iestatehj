<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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
        'property_id',
        'kin_address',
        'apartment_id',
        'created_by_id',
        'updated_by_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function apartment()
    {
        return $this->belongsTo(Vacancy::class, 'apartment_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public static function getVacantApartment($id=0){

      if($id==0){
        $value=DB::table('vacancies')->orderBy('id', 'asc')->get();
      }else{
        $value=DB::table('vacancies')->where('property_id', $id)->where('is_vacant', 'Yes')->get();
      }
      return $value;

    }
}
