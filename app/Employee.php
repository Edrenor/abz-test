<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = 'employees';

    protected $fillable = [
        'full_name',
        'position_id',
        'employment_date',
        'phone_number',
        'email',
        'salary',
        'head_id',
        'admin_created_at_id',
        'admin_updated_at_id'
    ];

    public function photo_id()
    {
        return $this->hasOne('App\Photo');
    }

    public function position_id()
    {
        return $this->hasOne('App\Position');
    }
}
