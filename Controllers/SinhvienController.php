<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\SinhvienRepository;
use MVC\Models\SinhvienModel;

class SinhvienController extends Controller
{
    function index()
    {
        $sinhvienRepository = new SinhvienRepository();

        $d['sinhviens'] = $sinhvienRepository->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["name"]))
        {
            $sinhvienRepository= new SinhvienRepository();
            $sinhvienModel = new SinhvienModel();

            $sinhvienModel->setHoten($_POST["name"]);
            $sinhvienModel->setKhoa($_POST["course"]);

            if ($sinhvienRepository->add($sinhvienModel))
            {
                header("Location: " . WEBROOT . "Sinhvien/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        
        
        $sinhvienRepository= new SinhvienRepository();
        $d["sinhvien"] = $sinhvienRepository->get($id);        
        if (isset($_POST["name"]))
        {
            
            $sinhvienModel = new SinhvienModel();

            $sinhvienModel->setId($id);
            $sinhvienModel->setHoten($_POST["name"]);
            $sinhvienModel->setKhoa($_POST["course"]);
            if ($sinhvienRepository->edit($sinhvienModel))
            {
                header("Location: " . WEBROOT . "Sinhvien/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($model)
    {
        $sinhvienRepository = new SinhvienRepository();
        $sinhvienModel = new SinhvienModel();
        $sinhvienModel->setId($model);
        if ($sinhvienRepository->delete($sinhvienModel))
        {
            header("Location: " . WEBROOT . "Sinhvien/index");
        }
    }
}
?>