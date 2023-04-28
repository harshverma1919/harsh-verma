<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewProject;
class NewUser extends Model
{
    protected $table = 'new_users';
    use HasFactory;

    protected $fillable = ['name','id',
   ];

    public function newproject()
    {
        return $this->hasMany(NewProject::class,'user_id','id');
    }
}
