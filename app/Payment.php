<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Payment extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'payments';

    const IS_CANCELLED_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    const IS_FULL_PAYMENT_SELECT = [
        'No'  => 'No',
        'Yes' => 'Yes',
    ];

    const IS_PART_PAYMENT_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    const IS_CONFIRMED_GM_SELECT = [
        'False' => 'False',
        'True'  => 'True',
    ];

    const IS_CONFIRMED_CEO_SELECT = [
        'False' => 'False',
        'True'  => 'True',
    ];

    const IS_CONFIRMED_SELECT = [
        'Pending'   => 'Pending',
        'Confirmed' => 'Confirmed',
    ];

    const PAYMENT_TYPE_SELECT = [
        'Cash'         => 'Cash',
        'Cheque'       => 'Cheque',
        'Bank Deposit' => 'Bank Deposit',
        'Bank Draft'   => 'Bank Draft',
    ];

    protected $dates = [
        'rent_to',
        'rent_from',
        'created_at',
        'updated_at',
        'deleted_at',
        'payment_date',
        'date_cancelled',
        'is_confirmed_date',
        'is_confirmed_gm_date',
        'is_confirmed_ceo_date',
    ];

    protected $fillable = [
        'note',
        'rent_to',
        'legal_fee',
        'cheque_no',
        'bank_name',
        'rent_from',
        'deleted_at',
        'updated_at',
        'created_at',
        'agency_fee',
        'amount_paid',
        'is_cancelled',
        'is_confirmed',
        'payment_type',
        'payment_date',
        'updated_by_id',
        'created_by_id',
        'apartmernt_id',
        'annual_charge',
        'date_cancelled',
        'service_charge',
        'management_fee',
        'caution_deposit',
        'company_account',
        'is_confirmed_gm',
        'cancelled_by_id',
        'is_full_payment',
        'is_part_payment',
        'landlord_account',
        'is_confirmed_ceo',
        'is_confirmed_date',
        'is_confirmed_gm_date',
        'is_confirmed_ceo_date',
        'is_confirmed_gm_name_id',
        'is_confirmed_ceo_name_id',
    ];

    public function properties()
    {
        return $this->belongsToMany(Product::class);
    }

    public function landlords()
    {
        return $this->belongsToMany(Landlord::class);
    }

    public function tenants()
    {
        return $this->belongsToMany(Tenant::class);
    }

    public function apartmernt()
    {
        return $this->belongsTo(ProductTag::class, 'apartmernt_id');
    }

    public function getPaymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRentFromAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRentFromAttribute($value)
    {
        $this->attributes['rent_from'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRentToAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRentToAttribute($value)
    {
        $this->attributes['rent_to'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getdocumentAttribute()
    {
        return $this->getMedia('document');
    }

    public function confirm_staffs()
    {
        return $this->belongsToMany(User::class);
    }

    public function getIsConfirmedDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setIsConfirmedDateAttribute($value)
    {
        $this->attributes['is_confirmed_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function is_confirmed_gm_name()
    {
        return $this->belongsTo(User::class, 'is_confirmed_gm_name_id');
    }

    public function getIsConfirmedGmDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setIsConfirmedGmDateAttribute($value)
    {
        $this->attributes['is_confirmed_gm_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function is_confirmed_ceo_name()
    {
        return $this->belongsTo(User::class, 'is_confirmed_ceo_name_id');
    }

    public function getIsConfirmedCeoDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setIsConfirmedCeoDateAttribute($value)
    {
        $this->attributes['is_confirmed_ceo_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDateCancelledAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateCancelledAttribute($value)
    {
        $this->attributes['date_cancelled'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function cancelled_by()
    {
        return $this->belongsTo(User::class, 'cancelled_by_id');
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
