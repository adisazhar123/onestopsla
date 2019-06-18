<?php

namespace OneStopSla\Core\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Vidcon extends Model
{
    protected $table = 'vidcons';
    protected $primaryKey = 'id';
    protected $fillable = ['users_id', 'subject', 'start_date_time', 'end_date_time',
        'individuals_quantity'];
}
