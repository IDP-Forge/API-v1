<?php

namespace App\Domain\Vault\Engine\KeyValueV2;

use Illuminate\Http\Client\PendingRequest;
use App\Domain\Vault\Engine\EngineInterface;
use App\Domain\Vault\Authentication\AuthMethodInterface;
use App\Domain\Vault\ValueObject\Response\Read\ReadResponse;
use App\Domain\Vault\ValueObject\Response\Write\WriteResponse;
use App\Domain\Vault\ValueObject\Request\Read\ReadRequestInterface;
use App\Domain\Vault\ValueObject\Response\Read\ReadResponseInterface;
use App\Domain\Vault\ValueObject\Request\Write\WriteRequestInterface;
use App\Domain\Vault\ValueObject\Response\Write\WriteResponseInterface;

readonly class KeyValueV2 implements EngineInterface
{
    public function __construct(
        public AuthMethodInterface $auth
    ){}

    public function read(ReadRequestInterface $read): ReadResponseInterface
    {
        [$valueKey, $apiPath] = $this->getPathAndKey($read);

        $response = $this->getVaultClient()->get($apiPath);

        return new ReadResponse(
            $response->json('data.data.'. $valueKey),
            200 === $response->status(),
            $response->status(),
            $response->json('request_id'),
            $response->json('lease_id'),
            $response->json('renewable'),
            $response->json('lease_duration'),
            $response->json('data.metadata')
        );
    }

    public function write(WriteRequestInterface $write): WriteResponseInterface
    {
        $client = $this->getVaultClient();

        $path = $this->getWriteAPIPath($write);

        $response = $client->post($path, $write->getValue());

        return new WriteResponse(
            $response->status(),
            $response->json('request_id'),
            (bool)$response->json('renewable', false),
            (int)$response->json('lease_duration', 0),
            $response->json('data'),
            $response->json('wrap_info'),
            $response->json('warnings'),
            $response->json('auth')
        );
    }

    protected function getPathAndKey(ReadRequestInterface $read): array
    {
        $api_path = $this->getVaultKvAPIPath($read->getPath());

        $key = array_pop($api_path);

        return [$key, '{+baseUrl}/'. implode('/', $api_path)];
    }

    public function getWriteAPIPath(WriteRequestInterface $write): string
    {
        return '{+baseUrl}/'. implode('/', $this->getVaultKvAPIPath($write->getPath()));
    }

    protected function getVaultKvAPIPath(string $path): array
    {
        $string = ltrim($path, '/');

        $segments = explode('/', $string);

        array_splice($segments, 1, 0, 'data');
        array_splice($segments, 0, 0, 'v1');

        return $segments;
    }

    protected function getVaultClient(): PendingRequest
    {
        return $this->auth->getAuthenticatedClient();
    }
}
