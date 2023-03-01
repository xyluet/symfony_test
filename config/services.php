<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $containerConfigurator) {
  $services = $containerConfigurator
    ->services()
    ->defaults()
    ->autowire()
    ->autoconfigure();

  $services->load('MyApp\\', '../src/')
    ->exclude('../src/{DependencyInjection,Entity,Kernel.php}');
};
