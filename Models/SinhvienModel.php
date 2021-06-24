<?php

namespace MVC\Models;

use MVC\Core\Model;

class SinhvienModel extends Model
{
    protected $id;
    protected $hoten;
    protected $khoa;
    protected $namsinh;


    function getId()  
    {  
        return $this->id;  
    }  
    function setId($id)  
    {  
        $this->id = $id;  
    }


    function getHoten()  
    {  
        return $this->hoten;  
    }  
    function setHoten($hoten)  
    {  
        $this->hoten = $hoten;  
    }


    function getKhoa()  
    {  
        return $this->khoa;  
    }
    function setKhoa($khoa)  
    {  
        $this->khoa = $khoa;  
    }

    
    function getNamsinh()  
    {  
        return $this->namsinh;  
    }  
    function setNamsinh($namsinh)  
    {  
        $this->namsinh = $namsinh;  
    }  
      
}