<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reminder extends Model
{
    use HasFactory;
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

    public static array $messages = [
        'description.required' => 'El campo Descripción es obligatorio.',
        'description.max' => 'El campo Descripción no debe superar los 500 caracteres.',
        'date.required' => 'El campo Fecha es obligatorio.',
        'time.required' => 'El campo Hora es obligatorio.',
        'user_id.required' => 'El campo Usuario es obligatorio.'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
