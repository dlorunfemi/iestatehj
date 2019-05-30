<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requistion extends Model
{
    use SoftDeletes;

    public $table = 'requistions';

    const IS_RETURNED_SELECT = [
        'No'  => 'No',
        'Yes' => 'Yes',
    ];

    const GM_SELECT = [
        'Not Confirmed' => 'Not Confirmed',
        'Confirmed'     => 'Confirmed',
    ];

    const CEO_SELECT = [
        'Not Confirmed' => 'Not Confirmed',
        'Confirmed'     => 'Confirmed',
    ];

    const ACCOUNTANT_SELECT = [
        'Not Confirmed' => 'Not Confirmed',
        'Confirmed'     => 'Confirmed',
    ];

    const STATUS_SELECT = [
        'Pending'   => 'Pending',
        'Withdrawn' => 'Withdrawn',
        'Declined'  => 'Declined',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'return_date',
        'gm_conf_date',
        'acc_conf_date',
        'ceo_conf_date',
    ];

    protected $fillable = [
        'gm',
        'ceo',
        'status',
        'deleted_at',
        'updated_at',
        'created_at',
        'accountant',
        'return_date',
        'is_returned',
        'property_id',
        'landlord_id',
        'gm_conf_date',
        'ceo_conf_date',
        'acc_conf_date',
        'return_user_id',
        'amount_withdraw',
        'initiating_staff_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class, 'landlord_id');
    }

    public function initiating_staff()
    {
        return $this->belongsTo(User::class, 'initiating_staff_id');
    }

    public function getAccConfDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setAccConfDateAttribute($value)
    {
        $this->attributes['acc_conf_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getGmConfDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setGmConfDateAttribute($value)
    {
        $this->attributes['gm_conf_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getCeoConfDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setCeoConfDateAttribute($value)
    {
        $this->attributes['ceo_conf_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function return_user()
    {
        return $this->belongsTo(User::class, 'return_user_id');
    }

    public function getReturnDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setReturnDateAttribute($value)
    {
        $this->attributes['return_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
