<?php

namespace Targettech\LaravelRequestDocs;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Targettech\LaravelRequestDocs\LaravelRequestDocs
 */
class LaravelRequestDocsFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-api-doc-generator';
    }
}
