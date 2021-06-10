<?php

namespace MVC\Core;

    class Model
    {
        public function getObj()
        {
            return get_object_vars($this);
        }
    }
?>