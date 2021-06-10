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
        if ($model->getId() === null) {
            foreach ($properties as $key => $value) {
                $insert_key[] = $key;
                array_push($arrNewModel, ':' . $key);
            }

            $strKey = implode(', ', $insert_key);

            $strArrNew = implode(', ', $arrNewModel);
     
            $sql_insert = "INSERT INTO $this->table ({$strKey}) VALUE ({$strArrNew})";

            $req_new = Database::getBdd()->prepare($sql_insert);

            return $req_new->execute($properties);

        } else {
            foreach ($properties as $k => $item) {
                array_push($arrUpdateModel, $k . ' = :' . $k);
            }
            //update
            $id = $model->getId();
            $strUpdate = implode(', ', $arrUpdateModel);
            $sql_update = "UPDATE {$this->table} SET $strUpdate WHERE id =" . $id;
            $req_update = Database::getBdd()->prepare($sql_update);
            return $req_update->execute($properties);
        }
    }
    public function delete($model)
    {
        $id = $model->getId();
        $sql = "DELETE FROM $this->table WHERE id =" . $id;
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
        $sql = "SELECT * FROM $this->table WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }
}

?>