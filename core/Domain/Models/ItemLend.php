<?php

namespace OneStopSla\Core\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class ItemLend extends Model
{
    protected $table = 'item_lend';
    protected $primaryKey = 'id';
    protected $fillable = ['lend_id', 'item_id'];

    public function lend()
    {
        return $this->belongsTo(Lend::class, 'lend_id', 'id');
    }
}
