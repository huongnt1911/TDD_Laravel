<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = ['name', 'content'];

    public function search(string $content){
        return $this->where('name','like','%'.$content.'%')->latest('id')->paginate(100);
    }
}
