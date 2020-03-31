<?php declare(strict_types = 1);

namespace App;

use Nette\Configurator;
use Nette\DI\Container;


class Bootstrap
{

	private const ENV_CLI = 'cli';
	private const ENV_WEB = 'web';


	public static function bootCli(): Container
	{
		return self::boot(self::ENV_CLI);
	}


	public static function bootWeb(): Container
	{
		return self::boot(self::ENV_WEB);
	}


	private static function boot(string $env): Container
	{
		$configurator = new Configurator();

		$configurator->setDebugMode(getenv('DEBUG') === '1');
		$configurator->enableTracy(__DIR__ . '/../log');

		$configurator->setTimeZone('Europe/Prague');
		$configurator->setTempDirectory(__DIR__ . '/../temp');

		$configurator->createRobotLoader()
			->addDirectory(__DIR__)
			->register();

		$configurator->addConfig(__DIR__ . '/config/parameters.neon');
		$configurator->addConfig(__DIR__ . '/config/extensions.neon');
		$configurator->addConfig(__DIR__ . '/config/services.neon');
		$configurator->addConfig(__DIR__ . "/config/environments/$env.neon");

		return $configurator->createContainer();
	}

}
