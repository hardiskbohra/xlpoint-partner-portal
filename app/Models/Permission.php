<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public $table = 'permissions';
    protected $fillable = [
    	'name','description', 'parent_id'
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }
    
    public function childPermissions()
    {
        return $this->hasMany(Permission::class, 'parent_id')->orderBy('name');
    }
}
