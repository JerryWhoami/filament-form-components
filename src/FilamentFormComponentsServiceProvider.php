<?php

namespace JerryWhoami\FilamentFormComponents;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentFormComponentsServiceProvider extends PluginServiceProvider
{
  protected array $scripts = [
    'filament-form-components' => __DIR__ . '/../public/jsoneditor/jsoneditor.min.js',
  ];

  protected array $styles = [
    'filament-form-components' => __DIR__ . '/../public/jsoneditor/jsoneditor.min.css',
  ];

  public function configurePackage(Package $package): void
  {
    $package
      ->name("filament-form-components")
      ->hasConfigFile()
      ->hasViews();

    $this->publishes([
      __DIR__ . '/../public/jsoneditor/img/jsoneditor-icons.svg' => public_path('filament/assets/img/jsoneditor-icons.svg'),
    ], 'filament-jsoneditor-img');
  }
}
