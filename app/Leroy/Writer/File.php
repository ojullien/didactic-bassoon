<?php

declare(strict_types=1);

namespace App\Leroy\Writer;

class File implements WriterInterface
{
    /**
     * Filename.
     *
     * @var string sDestination
     */
    protected string $sDestination = '';

    /**
     * Data.
     *
     * @var mixed data
     */
    protected string $data = '';

    /**
     * Set the filename.
     *
     * @param string $destination
     * @return void
     */
    public function setDestination(string $destination): void
    {
        $this->sDestination = trim($destination);
    }

    /**
     * Set the data to write
     *
     * @param mixed $data Usely a string
     * @return void
     */
    public function setData(mixed $data): void
    {
        $this->data = $data;
    }

    /**
     * Write to a file.
     *
     * @throws \RuntimeException if the response status code indicates a client or server error.
     * @return void
     */
    public function write(): void
    {
        $return = \file_put_contents($this->sSource, $this->data);

        if (false === $return) {
            throw new \RuntimeException('An error occures while writing to the file', 500);
        }
    }
}
