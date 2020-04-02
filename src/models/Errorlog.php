<?php

namespace Shuvo\Errorlog\models;

use Illuminate\Database\Eloquent\Model;

class Errorlog extends Model
{
    protected $table = 'error_logs';

    protected $fillable = [
        'method_name',
        'line_number',
        'file_path',
        'exception_message',
        'object',
        'type',
        'screenshot',
        'page_url',
        'arguments',
        'prefix',
        'domain',
        'is_resolved'
    ];
}
