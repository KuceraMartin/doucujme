<?php declare(strict_types = 1);

namespace App\Modules;

use App\Core\Application\View;
use App\ImplementationException;
use Nette\Application\Responses\TextResponse;
use Nette\Application\UI\Presenter;
use Nette\Utils\Strings;


abstract class BasePresenter extends Presenter
{

	protected function sendView(View $view): void
	{
		$view->parent = $this->createLayoutView();
		$parameters = $view->getParameters();
		$files = [];
		do {
			$files[] = $view->getFileName();
			$view = $view->parent;
		} while (!is_null($view));
		$this->template->setFile(array_shift($files));
		$this->template->setParameters($parameters);
		$this->template->getLatte()->addProvider('coreParentFinder', function () use (&$files) {
			return array_shift($files);
		});
		$this->sendResponse(new TextResponse($this->template));
	}


	protected function createLayoutView(): ?View
	{
		return new LayoutView();
	}


	public static function formatActionMethod(string $action): string
	{
		if ($action === 'default') {
			return 'render';
		}
		return parent::formatActionMethod($action);
	}


	public static function formatRenderMethod(string $action): string
	{
		if ($action === 'default') {
			return 'render';
		}
		return parent::formatActionMethod($action);
	}

}
