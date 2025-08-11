<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    
    protected $table = 'contact__message';
    protected $fillable = [
        'contactCode',
        'name',
        'title',
        'message',
        'reply',
        'phone',
        'email',
        'status',
    ];
}
