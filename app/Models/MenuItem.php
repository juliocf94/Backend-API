<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'MenuItems';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['item_name', 'url', 'parent_id', 'is_active'];

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    // Relación recursiva para obtener todos los hijos de un elemento del menú
    public function childrenRecursive()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->with('childrenRecursive');
    }
}
