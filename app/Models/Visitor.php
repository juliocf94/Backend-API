<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'Visitors';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['dui', 'name', 'email', 'birth_date', 'phone'];
}
