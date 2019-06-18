<?php

namespace OneStopSla\Core\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'complaints';
    protected $primaryKey = 'id';
    protected $fillable = ['users_id', 'subject', 'description'];
}
