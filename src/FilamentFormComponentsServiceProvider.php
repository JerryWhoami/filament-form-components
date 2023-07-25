<?php

namespace JerryWhoami\FilamentFormComponents;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentFormComponentServiceProvider extends PluginServiceProvider
{
  public function configurePackage(Package $package): void
  {
    $package
      ->name(self::$name)
      ->hasConfigFile()
      ->hasViews();
  }
}
