<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','about','avatar','facebook','twitter'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
