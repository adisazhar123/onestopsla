<?php

namespace OneStopSla\Core\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class LendItem extends Model
{
    protected $table = 'lends_items';
    protected $primaryKey = 'id';
    protected $fillable = ['lends_id', 'items_id'];
}
