<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskRepository;
use MVC\Models\TaskModel;

class TasksController extends Controller
{
    function index()
    {
        $taskRepository = new TaskRepository();
        $d['tasks'] = $taskRepository->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            $taskRepository = new TaskRepository();
            $taskModel = new TaskModel();
            $taskModel->setTitle($_POST["title"]);
            $taskModel->setDescription($_POST["description"]);

            if ($taskRepository->add($taskModel)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->render("create");
    }

    function edit($id)
    {
        $taskRepository = new TaskRepository();

        $d["task"] = $taskRepository->get($id);

        if (isset($_POST["title"]))
        {           
            $taskModel = new TaskModel();

            $taskModel->setId($id);
            $taskModel->setTitle($_POST["title"]);
            $taskModel->setDescription($_POST["description"]);
            if ($taskRepository->edit($taskModel))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($model)
    {
        $taskRepository = new TaskRepository();
        $taskModel = new TaskModel();
        $taskModel->setId($model);
        if ($taskRepository->delete($taskModel))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>