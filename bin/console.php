<?php declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

$container = \App\Bootstrap::bootCli();

$application = $container->getByType(\Symfony\Component\Console\Application::class);
assert($application instanceof \Symfony\Component\Console\Application);
exit($application->run());
