<?php

namespace Targettech\LaravelRequestDocs;

use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Targettech\LaravelRequestDocs\Commands\LaravelRequestDocsCommand;
use Targettech\LaravelRequestDocs\Controllers\LaravelRequestDocsController;

class LaravelRequestDocsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-request-docs')
            ->hasConfigFile('request-docs')
            ->hasViews()
            ->hasCommand(LaravelRequestDocsCommand::class);

        Route::get(config('request-docs.url'), [LaravelRequestDocsController::class, 'index'])
            ->name('request-docs.index')
            ->middleware(config('request-docs.middlewares'));
    }
}
