<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Service\FileUploader;

return static function (ContainerConfigurator $containerConfigurator) {
$services = $containerConfigurator->services();

$services->set(FileUploader::class)
->arg('$targetDirectory', '%upload_directory%')
;
};