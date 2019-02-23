<?php

namespace App\Models;

use ORM;

class Category {

	public static function getAll()
	{
		return ORM::for_table('categories')->find_many();
	}

}
