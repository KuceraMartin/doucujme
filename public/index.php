<?php declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

$container = \App\Bootstrap::bootWeb();
$app = $container->getByType(\Nette\Application\Application::class);
assert($app instanceof \Nette\Application\Application);
$app->run();
