<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    //name
    public function getnameAttribute($value)
    {
        return lcfirst($value);
    }

    //content
    public function getcontentAttribute($value)
    {
        return lcfirst($value);
    }

    public function getStatusTextAttribute()
    {
        if($this->status == 1)
        {
            return "Lam lai";
        }
        if($this->status == 2){
            return "Hoan thanh";
        }
    }
}
