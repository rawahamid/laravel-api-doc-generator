<?php

namespace Rakutentech\LaravelRequestDocs\Controllers;

use Illuminate\Routing\Controller;
use Rakutentech\LaravelRequestDocs\LaravelRequestDocs;

class LaravelRequestDocsController extends Controller
{
    private $laravelRequestDocs;

    public function __construct(LaravelRequestDocs $laravelRequestDocs)
    {
        $this->laravelRequestDocs = $laravelRequestDocs;
    }

    public function index()
    {
        $docs = $this->laravelRequestDocs->getDocs();
        $docs = $this->laravelRequestDocs->sortDocs($docs, config('request-docs.sort_by', 'default'));

        return view('request-docs::index')->with(compact('docs'));
    }
}
