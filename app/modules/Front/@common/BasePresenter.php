<?php declare(strict_types = 1);

namespace App\Modules\Front;


use App\Core\Application\View;

abstract class BasePresenter extends \App\Modules\BasePresenter
{

	protected function createLayoutView(): ?View
	{
		$view = new LayoutView();
		$view->parent = parent::createLayoutView();
		return $view;
	}

}
