<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ReminderRepository;
use Illuminate\Http\Request;
use Flash;

class ReminderController extends AppBaseController
{
    /** @var ReminderRepository $reminderRepository*/
    private $reminderRepository;

    public function __construct(ReminderRepository $reminderRepo)
    {
        $this->reminderRepository = $reminderRepo;
    }

    /**
     * Display a listing of the Reminder.
     */
    public function index(Request $request)
    {
        $reminders = $this->reminderRepository->paginate(10);

        return view('reminders.index')
            ->with('reminders', $reminders);
    }

    /**
     * Show the form for creating a new Reminder.
     */
    public function create()
    {
        return view('reminders.create');
    }

    /**
     * Store a newly created Reminder in storage.
     */
    public function store(CreateReminderRequest $request)
    {
        $input = $request->all();

        $reminder = $this->reminderRepository->create($input);

        Flash::success('Reminder saved successfully.');

        return redirect(route('reminders.index'));
    }

    /**
     * Display the specified Reminder.
     */
    public function show($id)
    {
        $reminder = $this->reminderRepository->find($id);

        if (empty($reminder)) {
            Flash::error('Reminder not found');

            return redirect(route('reminders.index'));
        }

        return view('reminders.show')->with('reminder', $reminder);
    }

    /**
     * Show the form for editing the specified Reminder.
     */
    public function edit($id)
    {
        $reminder = $this->reminderRepository->find($id);

        if (empty($reminder)) {
            Flash::error('Reminder not found');

            return redirect(route('reminders.index'));
        }

        return view('reminders.edit')->with('reminder', $reminder);
    }

    /**
     * Update the specified Reminder in storage.
     */
    public function update($id, UpdateReminderRequest $request)
    {
        $reminder = $this->reminderRepository->find($id);

        if (empty($reminder)) {
            Flash::error('Reminder not found');

            return redirect(route('reminders.index'));
        }

        $reminder = $this->reminderRepository->update($request->all(), $id);

        Flash::success('Reminder updated successfully.');

        return redirect(route('reminders.index'));
    }

    /**
     * Remove the specified Reminder from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reminder = $this->reminderRepository->find($id);

        if (empty($reminder)) {
            Flash::error('Reminder not found');

            return redirect(route('reminders.index'));
        }

        $this->reminderRepository->delete($id);

        Flash::success('Reminder deleted successfully.');

        return redirect(route('reminders.index'));
    }
}
