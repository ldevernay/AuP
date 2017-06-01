<?php

namespace App\Repositories;

use App\Language;

class LanguageRepository extends ResourceRepository
{

    public function __construct(Language $language)
	{
		$this->model = $language;
	}

}
