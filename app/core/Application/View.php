<?php declare(strict_types = 1);

namespace App\Core\Application;


use App\ImplementationException;
use Nette\Utils\Strings;

abstract class View
{

	public ?View $parent = null;


	public function getFileName(): string
	{
		$viewFile = (new \ReflectionClass($this))->getFileName();
		$name = Strings::before($viewFile, 'View.php');
		if (is_null($name)) {
			throw new ImplementationException('View file must be named *View.php');
		}
		return "$name.latte";
	}


	public function getParameters(): array
	{
		$rc = new \ReflectionClass($this);
		$parameters = [];
		foreach ($rc->getProperties(\ReflectionProperty::IS_PUBLIC) as $prop) {
			$parameters[$prop->getName()] = $prop->getValue($this);
		}
		return $parameters + ($this->parent ? $this->parent->getParameters() : []);
	}

}
