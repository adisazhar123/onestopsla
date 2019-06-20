<?php

namespace OneStopSla\Core\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'quantity', 'category'];

    public function lends()
    {
        return $this->belongsToMany(Lend::class)->withTimestamps();
    }

    public function itemsLends()
    {
        return $this->hasMany(ItemLend::class, 'item_id', 'id');
    }
}
