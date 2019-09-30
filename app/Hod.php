<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hod extends Model
{
    public function isHod(){
        return $this->users()->where('role','hod')->exists();
    }
}
