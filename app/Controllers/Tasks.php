<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function today()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('task_date', date('Y-m-d'))
            ->where('is_archived', 0)
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('tasks/today', [
            'tasks' => $tasks
        ]);
    }

    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('tasks/index', [
            'tasks' => $tasks
        ]);
    }

    public function newTask()
    {
        return view('tasks/new');
    }

    public function create()
    {
        $rules = [
            'title' => 'required|min_length[2]',
            'task_date' => 'required'
        ];

        if (! $this->validate($rules)) {
            return view('tasks/new', [
                'validation' => $this->validator
            ]);
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date' => $this->request->getPost('task_date'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (! $task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|min_length[2]',
            'task_date' => 'required'
        ];

        $taskModel = new TaskModel();
        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (! $task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (! $this->validate($rules)) {
            return view('tasks/edit', [
                'task' => $task,
                'validation' => $this->validator
            ]);
        }

        $taskModel->update($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks');
    }

    public function archive($id)
    {
        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks');
    }
}