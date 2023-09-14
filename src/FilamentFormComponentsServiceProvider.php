<?php

namespace JerryWhoami\FilamentFormComponents;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentFormComponentsServiceProvider extends PackageServiceProvider
{
  public static string $name = 'filament-form-components';

  public function configurePackage(Package $package): void
  {
    $package
      ->name(static::$name)
      ->hasConfigFile()
      ->hasViews();

    $this->publishes([
      __DIR__ . '/../node_modules/jsoneditor/dist/img/jsoneditor-icons.svg' => public_path('css/jerry-whoami/filament-form-components/img/jsoneditor-icons.svg'),
    ], 'jsoneditor');
  }

  public function packageBooted(): void
  {
    FilamentAsset::register(
      [
        Css::make('jsoneditor', __DIR__ . '/../node_modules/jsoneditor/dist/jsoneditor.min.css'),
        Js::make('jsoneditor', __DIR__ . '/../node_modules/jsoneditor/dist/jsoneditor.min.js'),
      ],
      package: 'jerry-whoami/filament-form-components'
    );
  }
}
