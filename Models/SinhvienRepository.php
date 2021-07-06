<?php

namespace MVC\Models;

use MVC\Models\SinhvienResourceModel;

class SinhvienRepository
{
    public $data_model;

    public function __construct()
    {
        $this->data_model = new SinhvienResourceModel();// khoi tao lop SVRM 
    }
    public function add($model)
    {
        return $this->data_model->save($model);// truy xuat den thuoc tinh data_model va goi phương thuc save
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