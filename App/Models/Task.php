<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
  use App\Models\Category;

class Task extends Model
{
    protected $table = 'tasks';

    public function category() {
        return $this->belongsTo(Category::class);
    }
}



?>