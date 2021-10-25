<?php

declare(strict_types=1);

namespace App\Leroy\Reader;

class File implements ReaderInterface
{
    /**
     * Filename.
     *
     * @var string sSource.
     */
    protected string $sSource = '';

    /**
     * Set the filename.
     *
     * @param string $source
     * @return void
     */
    public function setSource(string $source): void
    {
        $this->sSource = trim($source);
    }

    /**
     * Read a file.
     *
     * @throws \RuntimeException if an error occures
     * @return string
     */
    public function read(): string
    {
        if (false === \is_readable($this->sSource)) {
            throw new \RuntimeException('File does  not exist nor readable', 404);
        }

        $sResponse = \file_get_contents($this->sSource);

        if (false === $sResponse) {
            throw new \RuntimeException('An error occures while reading the file', 500);
        }

        return $sResponse;
    }
}
