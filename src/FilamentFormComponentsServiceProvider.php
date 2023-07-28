<?php

namespace JerryWhoami\FilamentFormComponents;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentFormComponentsServiceProvider extends PluginServiceProvider
{
  public static string $name = 'filament-form-components';

  protected array $scripts = [
    'filament-form-components' => __DIR__ . '/../public/jsoneditor/jsoneditor.min.js',
  ];

  protected array $styles = [
    'filament-form-components' => __DIR__ . '/../public/jsoneditor/jsoneditor.min.css',
  ];

  public function configurePackage(Package $package): void
  {
    $package
      ->name(self::$name)
      ->hasConfigFile()
      ->hasViews();
  }
}
