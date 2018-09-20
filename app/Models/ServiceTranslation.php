<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceTranslation extends Model
{
    use SoftDeletes;

    protected $table = 'services_translations';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'services_id',
        'lang',
        'name',
        'short_description',
        'description'
    ];
}
