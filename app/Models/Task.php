<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'id_task';
    protected $fillable   = ['title', 'description', 'due_date', 'status', 'category_id', 'user_id'];

    public function user()     { return $this->belongsTo(User::class, 'user_id', 'id_user'); }
    public function category() { return $this->belongsTo(Category::class, 'category_id', 'id_category'); }
}
