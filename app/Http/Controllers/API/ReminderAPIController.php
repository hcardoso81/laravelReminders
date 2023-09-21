<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReminderAPIRequest;
use App\Http\Requests\API\UpdateReminderAPIRequest;
use App\Models\Reminder;
use App\Repositories\ReminderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ReminderAPIController
 */
class ReminderAPIController extends AppBaseController
{
    private ReminderRepository $reminderRepository;

    public function __construct(ReminderRepository $reminderRepo)
    {
        $this->reminderRepository = $reminderRepo;
    }

    /**
     * Display a listing of the Reminders.
     * GET|HEAD /reminders
     */
    public function index(Request $request): JsonResponse
    {
        $reminders = $this->reminderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($reminders->toArray(), 'Reminders retrieved successfully');
    }

    /**
     * Store a newly created Reminder in storage.
     * POST /reminders
     */
    public function store(CreateReminderAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $reminder = $this->reminderRepository->create($input);

        return $this->sendResponse($reminder->toArray(), 'Reminder saved successfully');
    }

    /**
     * Display the specified Reminder.
     * GET|HEAD /reminders/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Reminder $reminder */
        $reminder = $this->reminderRepository->find($id);

        if (empty($reminder)) {
            return $this->sendError('Reminder not found');
        }

        return $this->sendResponse($reminder->toArray(), 'Reminder retrieved successfully');
    }

    /**
     * Update the specified Reminder in storage.
     * PUT/PATCH /reminders/{id}
     */
    public function update($id, UpdateReminderAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Reminder $reminder */
        $reminder = $this->reminderRepository->find($id);

        if (empty($reminder)) {
            return $this->sendError('Reminder not found');
        }

        $reminder = $this->reminderRepository->update($input, $id);

        return $this->sendResponse($reminder->toArray(), 'Reminder updated successfully');
    }

    /**
     * Remove the specified Reminder from storage.
     * DELETE /reminders/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Reminder $reminder */
        $reminder = $this->reminderRepository->find($id);

        if (empty($reminder)) {
            return $this->sendError('Reminder not found');
        }

        $reminder->delete();

        return $this->sendSuccess('Reminder deleted successfully');
    }
}
