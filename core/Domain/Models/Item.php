<?php

namespace OneStopSla\Core\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'quantity', 'category'];
}
