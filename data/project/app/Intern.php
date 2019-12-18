<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    protected $fillable = ['firstname', 'lastname', 'age', 'phone_number', 'email'];

    public function skills()
    {
        return $this->belongsToMany('app\Skill');
    }

    //public function skills() {
            //return $this->hasMany(InternSkill::class)->with('intern');
        //}
}


