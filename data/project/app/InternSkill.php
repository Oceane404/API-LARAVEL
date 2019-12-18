<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternSkill extends Model
{
    //return $this->belongsToMany('app\Intern');

    public function Intern() {
        return $this->belongsTo(Intern::class);
    }
    
    public function Skill() {
        return $this->belongsTo(Skill::class);
    }

}