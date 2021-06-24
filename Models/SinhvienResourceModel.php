<?php

namespace MVC\Models;

use MVC\Core\ResourceModel;
use MVC\Models\SinhvienModel;

class SinhvienResourceModel extends ResourceModel
	{
		public function __construct()
		{
			parent::_init('sinhvien', 'id', new SinhvienModel);
		}

	}

?>