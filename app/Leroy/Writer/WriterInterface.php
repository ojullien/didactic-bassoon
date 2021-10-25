<?php

declare(strict_types=1);

namespace App\Leroy\Writer;

interface WriterInterface
{
    /**
     * Set the destination
     *
     * @param string $destination Usely a filename
     * @return void
     */
    public function setDestination(string $destination): void;

    /**
     * Set the data to write
     *
     * @param mixed $data Usely a string
     * @return void
     */
    public function setData(mixed $data): void;

    /**
     * Write to a destination
     *
     * @throws \RuntimeException if an error occures
     * @return void
     */
    public function write(): void;
}
