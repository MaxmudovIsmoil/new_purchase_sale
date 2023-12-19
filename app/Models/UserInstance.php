<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInstance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'instance_id',
    ];

    public function instance()
    {
        return $this->hasOne(Instance::class, 'id', 'instance_id');
    }

    public function user_plan()
    {
        return $this->hasMany(UserPlan::class,'user_instance_id', 'instance_id')
            ->orderBy('stage', 'ASC');
    }

    public $timestamps = false;
}
