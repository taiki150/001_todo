<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
  use App\Models\Color;

class Color extends Model
{
    protected $table = 'color';

    public function category() {
        return $this->belongsTo(Category::class);
    }
}



?>