<?php

namespace MVC\Models;

use MVC\Models\SinhvienResourceModel;

class SinhvienRepository
{
    public $data_model;

    public function __construct()
    {
        $this->data_model = new SinhvienResourceModel();
    }
    public function add($model)
    {
        return $this->data_model->save($model);
    }
    public function edit($model)
    {
        return $this->data_model->save($model);
    }
    public function get($id)
    {
        return $this->data_model->find($id);
    }
    public function delete($model)
    {
        return $this->data_model->delete($model);
    }
    public function getAll()
    {
        return $this->data_model->showAll();
    }
}

?>