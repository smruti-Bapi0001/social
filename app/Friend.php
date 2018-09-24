<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'from_id', 'to_id', 'status',
    ];

    // status 1 = 'friends' 2 = 'request rejected' 3 = 'request pending'

    public function requestedUser(){
        return $this->belongsTo('App\User','from_id');
    }

    public function requestedTo(){
        return $this->belongsTo('App\User','to_id');
    }
}
