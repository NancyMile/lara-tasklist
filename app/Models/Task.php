<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    //mass assignment
    protected $fillable = ['title','description','long_description'];

    //adding method toggleComplete
    public function toggleComplete()
    {
        $this->completed = !$this->completed;
        $this->save();
    }
}
