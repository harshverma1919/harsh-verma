<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewUser;

class NewProject extends Model
{
    protected $table = 'new_projects';
    use HasFactory;

    protected $fillable = ['id','project_name', 'user_id'];

    public function newuser()
    {
        return $this->belongsTo(NewUser::class,'');
    }
}
