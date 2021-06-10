<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskRepository;
use MVC\Models\TaskModel;

class TasksController extends Controller
{
    function index()
    {
        $task = new TaskRepository();
        $d['tasks'] = $task->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            $task = new TaskRepository();
            $task1 = new TaskModel();
            $task1->setTitle($_POST["title"]);
            $task1->setDescription($_POST["description"]);

            if ($task->add($task1)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->render("create");
    }

    function edit($id)
    {
        $task = new TaskRepository();

        $d["task"] = $task->get($id);

        if (isset($_POST["title"]))
        {           
            $task1 = new TaskModel();

            $task1->setId($id);
            $task1->setTitle($_POST["title"]);
            $task1->setDescription($_POST["description"]);
            if ($task->edit($task1))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($model)
    {
        $task = new TaskRepository();
        $task1 = new TaskModel();
        $task1->setId($model);
        if ($task->delete($task1))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>