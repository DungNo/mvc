<?php

namespace MVC\Core;

use MVC\Core\ResourceModelInterface;
use MVC\Config\Database;
use MVC\Models\TaskModel;
use PDO;

class ResourceModel implements ResourceModelInterface
{
    protected $table;
    protected $id;
    protected $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }
    public function save($model)
    {
        $properties = $model->getObj();
        $arrNewModel = [];
        $arrUpdateModel = [];
        $insert_key = [];

        foreach ($properties as $key => $value) {
            $insert_key[] = $key;
            array_push($arrNewModel, ':' . $key);
            array_push($arrUpdateModel, $key . ' = :' . $kye);
        }
        if ($model->getId() === null) {            
            $strKey = implode(', ', $insert_key);
            $strArrNew = implode(', ', $arrNewModel);     
            $sql = "INSERT INTO $this->table ({$strKey}) VALUE ({$strArrNew})";

        } else {
            $id = $model->getId();
            $strUpdate = implode(', ', $arrUpdateModel);
            $sql = "UPDATE {$this->table} SET $strUpdate WHERE $this->id =" . $id;
        }
        $req = Database::getBdd()->prepare($sql);
        return $req_new->execute($properties);
    }
    public function delete($model)
    {
        $id = $model->getId();
        $sql = "DELETE FROM $this->table WHERE $this->id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }
    public function showAll()
    {
        $sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    public function find($id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute([$this->id => $id]); 
        return $req->fetchObject();
    }
}

?>