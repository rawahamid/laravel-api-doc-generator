<?php

namespace Targettech\LaravelRequestDocs\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Targettech\LaravelRequestDocs\LaravelRequestDocs;

class LaravelRequestDocsController extends Controller
{
    private LaravelRequestDocs $laravelRequestDocs;

    public function __construct(LaravelRequestDocs $laravelRequestDocs)
    {
        $this->laravelRequestDocs = $laravelRequestDocs;
    }

    public function index(): Factory|View|Application
    {
        $docs = $this->laravelRequestDocs->getDocs();
        $docs = $this->laravelRequestDocs->sortDocs($docs, config('request-docs.sort_by', 'default'));

        return view('request-docs::index')->with(compact('docs'));
    }
}
