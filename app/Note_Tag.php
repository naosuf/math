<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note_Tag extends Model
{
    protected $fillable = [
        'note_id',
        'tag_id',
    ];
    
    protected $table = 'note_tag';
}
