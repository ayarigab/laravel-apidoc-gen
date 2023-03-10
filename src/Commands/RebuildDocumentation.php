<?php

namespace Ayarigab\ApiDoc\Commands;

use Illuminate\Console\Command;
use Ayarigab\ApiDoc\Tools\DocumentationConfig;
use Ayarigab\ApiDoc\Writing\Writer;

class RebuildDocumentation extends Command
{
    protected $signature = 'apidoc:rebuild';

    protected $description = 'Rebuild your API documentation from your markdown file.';

    public function handle()
    {
        $sourceOutputPath = 'resources/docs/source';
        if (! is_dir($sourceOutputPath)) {
            $this->error('There is no existing documentation available at ' . $sourceOutputPath . '.');

            return false;
        }

        $this->info('Rebuilding API documentation from ' . $sourceOutputPath . '/index.md');

        $writer = new Writer($this, new DocumentationConfig(config('apidoc')));
        $writer->writeHtmlDocs();
    }
}
