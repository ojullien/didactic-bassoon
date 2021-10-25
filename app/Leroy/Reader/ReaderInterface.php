<?php

declare(strict_types=1);

namespace App\Leroy\Reader;

interface ReaderInterface
{
    /**
     * Set the source to read
     *
     * @param string $source (filename, api endpoint)
     * @return void
     */
    public function setSource(string $source): void;

    /**
     * Read from a source
     *
     * @throws \RuntimeException if an error occures
     * @return string
     */
    public function read(): string;
}
