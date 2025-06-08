<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
  use App\Models\Task;

class Category extends Model
{
    protected $table = 'categories';

    public function task() {
        return $this->hasMany(Task::class);
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }
}



?>