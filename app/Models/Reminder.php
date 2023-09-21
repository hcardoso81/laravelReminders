<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    public $table = 'reminders';

    public $fillable = [
        'description',
        'date',
        'time',
        'user_id'
    ];

    protected $casts = [
        'description' => 'string',
        'date' => 'string',
        'time' => 'string',
        'user_id' => 'integer'
    ];

    public static array $rules = [
        'description' => 'required|max:500',
        'date' => 'required',
        'time' => 'required',
        'user_id' => 'required'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
