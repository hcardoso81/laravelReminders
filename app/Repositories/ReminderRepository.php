<?php

namespace App\Repositories;

use App\Models\Reminder;
use App\Repositories\BaseRepository;

class ReminderRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'description',
        'date',
        'time',
        'user_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Reminder::class;
    }
}
