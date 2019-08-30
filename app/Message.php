<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    // protected $fillable = ['message'];

    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected $guarded = [];

    // protected $dates = ['created_at'];

    // protected $appends = ['CreatedHumanReadable'];

    // public function getCreatedHumanReadable()
    // {
    //     return $this->created_at->diffForHumans();
    // }


    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // public function user()
    // {
    //   return $this->belongsTo(User::class);
    // }
}
