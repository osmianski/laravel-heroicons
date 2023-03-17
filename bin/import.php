#!/usr/bin/env php
<?php

$command = new ImportCommand();
$command->handle();

/**
 * Imports Heroicons from the original repository into Blade component library.
 */
class ImportCommand
{
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        global $argv;

        $src = $argv[1];

        $this->convertDir("{$src}/src/20/solid", "resources/views/components/mini", true);
        $this->convertDir("{$src}/src/24/solid", "resources/views/components/solid", true);
        $this->convertDir("{$src}/src/24/outline", "resources/views/components/outline", false);
    }

    protected function convertDir(string $src, string $dest, bool $solid): void
    {
        if (!is_dir($dest)) {
            mkdir($dest, 0755, true);
        }
        $this->deleteFiles($dest);

        foreach (new \DirectoryIterator($src) as $fileInfo) {
            /* @var \SplFileInfo $fileInfo */
            if ($fileInfo->isDot()) {
                continue;
            }

            $ext = pathinfo($fileInfo->getFilename(), PATHINFO_EXTENSION);
            if ($ext !== 'svg') {
                continue;
            }

            $name = pathinfo($fileInfo->getFilename(), PATHINFO_FILENAME);
            $this->convertFile("{$src}/{$name}.svg", "{$dest}/{$name}.blade.php", $solid);
        }
    }

    protected function deleteFiles(string $path): void
    {
        foreach (new \DirectoryIterator($path) as $fileInfo) {
            /* @var \SplFileInfo $fileInfo */
            if ($fileInfo->isDot()) {
                continue;
            }

            unlink($fileInfo->getPathname());
        }
    }

    protected function convertFile(string $src, string $dest, bool $solid): void
    {
        $contents = file_get_contents($src);

        if ($solid) {
            $contents = preg_replace('/fill="[^"]+"/', 'fill="currentColor"', $contents);
        }
        else {
            $contents = preg_replace('/stroke="[^"]+"/', 'stroke="currentColor"', $contents);
        }

        $contents = str_replace('<svg ', '<svg {{ $attributes }} ', $contents);

        file_put_contents($dest, $contents);
    }
}
