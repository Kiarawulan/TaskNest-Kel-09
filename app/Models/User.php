<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'id_user';
    protected $fillable = ['username', 'email', 'password'];
    protected $hidden   = ['password', 'remember_token'];

    public function tasks()      { return $this->hasMany(Task::class, 'user_id', 'id_user'); }
    public function categories() { return $this->hasMany(Category::class, 'user_id', 'id_user'); }
}
