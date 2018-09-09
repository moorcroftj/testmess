<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Messages extends Model
{
    public static function createMessage() {

    }

    public static function readMessage() {
    	return DB::table('messages')
    					->get();


    }

    public static function updateMessage() {
    	
    }

    public static function deleteMessage() {
    	
    }

    protected $fillable = [
        'id', 'name', 'email', 'subject', 'message'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
