<?php

namespace MVC\Core;

    class Controller
    {
        var $vars = [];
        var $layout = "default";

        function set($d)
        {
            $this->vars = array_merge($this->vars, $d);// gop mang
        }

        function render($filename)
        {
            extract($this->vars);// thuc hien chuyen doi array thành variable
            ob_start(); // khi user request thi du lieu luu vao nho dem dau ra
            $stringNameModel = str_replace('Controller', '', get_class($this));// MVC\s\Sinhvien, get_class: tra ve ten lop cua obj
            $dem = strrpos($stringNameModel, '\\');
            $nameModel= substr($stringNameModel, $dem + 1);
            require(ROOT . "Views/" . $nameModel . '/' . $filename . '.php');// gop cac file php (chen toan bo noi dung cua file import vào file hien tai) 
            $content_for_layout = ob_get_clean();// lay du lieu bo nho dem ra xu ly roi xoa luon trong bo nho tam

            if ($this->layout == false)
            {
                $content_for_layout;
            }
            else
            {
                require(ROOT . "Views/Layouts/" . $this->layout . '.php');
            }
        }

        private function secure_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        protected function secure_form($form)
        {
            foreach ($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
        }

    }
?>