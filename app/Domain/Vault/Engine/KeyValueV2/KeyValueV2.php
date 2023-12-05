<?php

namespace App\Domain\Vault\Engine\KeyValueV2;

use Illuminate\Http\Client\PendingRequest;
use App\Domain\Vault\Engine\EngineInterface;
use App\Domain\Vault\ValueObject\ResponseValueObject;
use App\Domain\Vault\Authentication\AuthMethodInterface;
use App\Domain\Vault\ValueObject\ReadValueObjectInterface;
use App\Domain\Vault\ValueObject\WriteValueObjectInterface;

class KeyValueV2 implements EngineInterface
{
    public function __construct(
        public readonly AuthMethodInterface $auth
    ){}

    public function read(ReadValueObjectInterface $read): ResponseValueObject
    {
        [$valueKey, $apiPath] = $this->getPathAndKey($read);

        $response = $this->getVaultClient()->get($apiPath);

        return new ResponseValueObject(
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

    public function write(WriteValueObjectInterface $write)
    {
        $client = $this->getVaultClient();

        $path = $this->getWriteAPIPath($write);

        $response = $client->post($path, $write->getValue());

        print_r($response->status(), $response->json());

        // return $this->client->post('{+baseUrl}/'. $path, ['data' => $write->getValue()]);
    }

    protected function getPathAndKey(ReadValueObjectInterface $read): array
    {
        $api_path = $this->getVaultKvAPIPath($read->getPath());

        $key = array_pop($api_path);

        return [$key, '{+baseUrl}/'. implode('/', $api_path)];
    }

    public function getWriteAPIPath(WriteValueObjectInterface $write): string
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
