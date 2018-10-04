<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'message',
        'services_id',
        'status'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'services_id', 'id');
    }
}
