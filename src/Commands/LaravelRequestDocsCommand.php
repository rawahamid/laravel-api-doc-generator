<?php

namespace Targettech\LaravelRequestDocs\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Targettech\LaravelRequestDocs\LaravelRequestDocs;

class LaravelRequestDocsCommand extends Command
{
    public $signature = 'lrd:generate';

    public $description = 'Generate request docs to HTML';

    private LaravelRequestDocs $laravelRequestDocs;

    public function __construct(LaravelRequestDocs $laravelRequestDocs)
    {
        $this->laravelRequestDocs = $laravelRequestDocs;
        parent::__construct();
    }

    public function handle()
    {
        $destinationPath = config('request-docs.docs_path') ?? base_path('docs/request-docs/');

        $docs = $this->laravelRequestDocs->getDocs();
        $docs = $this->laravelRequestDocs->sortDocs($docs, config('request-docs.sort_by', 'default'));

        if (! File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }
        File::put($destinationPath.'/index.html',
            view('request-docs::index')
                ->with(compact('docs'))
                ->render()
        );
        $this->comment("Static HTML generated: $destinationPath");
    }
}
