<?php declare(strict_types = 1);

namespace App\Modules\Front;


class HomepagePresenter extends BasePresenter
{

	public function render()
	{
		$this->sendView(new HomepageView());
	}

}
