<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id_category';
    protected $fillable   = ['name', 'user_id'];

    public function user()  { return $this->belongsTo(User::class, 'user_id', 'id_user'); }
    public function tasks() { return $this->hasMany(Task::class, 'category_id', 'id_category'); }
}
