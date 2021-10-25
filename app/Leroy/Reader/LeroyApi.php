<?php

declare(strict_types=1);

namespace App\Leroy\Reader;

use Illuminate\Support\Facades\Http;

class LeroyApi implements ReaderInterface
{
    /**
     * Endpoint.
     *
     * @var string sSource.
     */
    protected string $sSource = '';

    /**
     * Api key.
     *
     * @var string sKey.
     */
    protected string $sKey = '';

    /**
     * Set the endpoint.
     *
     * @param string $source
     * @return void
     */
    public function setSource(string $source): void
    {
        $this->sSource = trim($source);
    }

    /**
     * Set the api key.
     *
     * @param string $key
     * @return void
     */
    public function setApiKey(string $key): void
    {
        $this->sKey = trim($key);
    }

    /**
     * Use the http client to read the endpoint.
     *
     * @throws \RuntimeException if the response status code indicates a client or server error.
     * @return string
     */
    public function read(): string
    {

        $pResponse = Http::withHeaders(['x-gateway-apikey' => $this->sKey])->get($this->sSource);

        if ($pResponse->clientError() or $pResponse->serverError()) {
            throw new \RuntimeException($pResponse->getReasonPhrase(), $pResponse->getStatusCode());
        }

        return (string)$pResponse->getBody();
    }
}
