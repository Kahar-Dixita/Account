<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;

class account extends Model
{
    use HasFactory;
    // use Uuid;
    use SoftDeletes;
    // protected $table="accounts";
    protected $fillable = ['name','contact_no','email','gender','hobbies','account_id'];

    public function setHobbiesAttribute($value)
    {
        $this->attributes['hobbies']= implode(',',(array)$value);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class,'account_id');
    }
}
