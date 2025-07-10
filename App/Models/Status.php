<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Status extends Model
{
    protected $table = 'statuses';

    public function task() {
        return $this->hasMany(Task::class);
    }
}



?>