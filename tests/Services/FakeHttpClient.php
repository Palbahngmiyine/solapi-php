<?php

namespace Nurigo\Solapi\Tests\Services;

use Nyholm\Psr7\Response;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

/**
 * PSR-18 fake client for deterministic SDK tests.
 *
 * Maps HTTP method + URL path to canned responses. Records all received
 * requests so tests can assert how the SDK called the API.
 */
class FakeHttpClient implements ClientInterface
{
    /** @var array<string, array{0:int,1:string}> */
    private $responses = [];

    /** @var RequestInterface[] */
    public $receivedRequests = [];

    /** @var ?\Throwable */
    private $exceptionToThrow = null;

    public function respondTo(string $method, string $path, int $status, string $body): void
    {
        $this->responses[$this->key($method, $path)] = [$status, $body];
    }

    public function throwOnceOnNextRequest(\Throwable $exception): void
    {
        $this->exceptionToThrow = $exception;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->receivedRequests[] = $request;

        if ($this->exceptionToThrow !== null) {
            $e = $this->exceptionToThrow;
            $this->exceptionToThrow = null;
            if ($e instanceof ClientExceptionInterface) {
                throw $e;
            }
            throw new RuntimeException($e->getMessage(), 0, $e);
        }

        $key = $this->key($request->getMethod(), $request->getUri()->getPath());
        if (!isset($this->responses[$key])) {
            throw new RuntimeException("No canned response registered for: $key");
        }
        [$status, $body] = $this->responses[$key];
        return new Response($status, ['Content-Type' => 'application/json'], $body);
    }

    private function key(string $method, string $path): string
    {
        return strtoupper($method) . ' ' . $path;
    }
}
