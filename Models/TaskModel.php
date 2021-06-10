<?php

namespace MVC\Models;

use MVC\Core\Model;

class TaskModel extends Model
{
    protected $id;
    protected $title;
    protected $description;
    protected $created_at;
    protected $updated_at;


    public function getId()  
    {  
        return $this->id;  
    }  
    public function setId($id)  
    {  
        $this->id = $id;  
    }


    public function getTitle()  
    {  
        return $this->title;  
    }  
    public function setTitle($title)  
    {  
        $this->title = $title;  
    }


    public function getDescription()  
    {  
        return $this->description;  
    }
    public function setDescription($description)  
    {  
        $this->description = $description;  
    }

    
    public function getCreate_at()  
    {  
        return $this->created_at;  
    }  
    public function setCreate_at($created_at)  
    {  
        $this->created_at = $created_at;  
    }  


    public function getUpdate_at()  
    {  
        return $this->updated_at;  
    }  
    public function setUpdate_at($updated_at)  
    {  
        $this->updated_at = $updated_at;  
    }
      
}