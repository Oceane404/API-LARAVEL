<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name'];

        public function interns()
        {
            return $this->belongsToMany('app\Intern');
        }

        //public function interns() {
            //return $this->hasMany(InternSkill::class)->with('skill');
        //}
}
