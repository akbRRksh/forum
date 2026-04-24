<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
    protected $table = 'profile';
    protected $fillable = ['biodata', 'umur', 'alamat', 'users_id'];

    public function users() {
        return $this->belongsTo('App\User', 'users_id');
    }
}
