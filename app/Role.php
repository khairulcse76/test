<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'alias',
    ];

    public function users()
    {
        return $this->hasMany(Config("authorization.user-model"));
    }

    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }
}
