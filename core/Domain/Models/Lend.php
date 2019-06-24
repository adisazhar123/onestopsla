<?php

namespace OneStopSla\Core\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    protected $table = 'lends';
    protected $primaryKey = 'id';
    protected $fillable = ['users_id', 'description', 'item_type', 'start_date_time',
        'end_date_time', 'usage_type', 'controlled_by', 'status', 'name', 'nip', 'driver', 'individuals_quantity'];

    public function items()
    {
        return $this->belongsToMany(Item::class)->withTimestamps();
    }
}
