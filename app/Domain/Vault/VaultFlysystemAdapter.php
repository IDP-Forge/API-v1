<?php

namespace App\Domain\Vault;

use League\Flysystem\Config;
use League\Flysystem\FileAttributes;
use League\Flysystem\FilesystemAdapter;
use App\Domain\Vault\Exceptions\WriteException;
use App\Domain\Vault\Exceptions\UnsupportedActionException;

class VaultFlysystemAdapter implements FilesystemAdapter
{
    public function __construct(
        public readonly HashicorpVault $vault
    )
    {}

    public function fileExists(string $path): bool
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function directoryExists(string $path): bool
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function write(string $path, string $contents, Config $config): void
    {
        /** @var HashicorpVault $hcp */
        $hcp = app(HashicorpVault::LARAVEL_NAME);

        [$filepath, $data] = APIHelper::pathToParams($path, $contents);

        $result = $hcp->write($filepath, $data);

        if($result->getStatusCode() !== 200)
        {
            throw new WriteException('Unable to write to Vault');
        }
    }

    public function writeStream(string $path, $contents, Config $config): void
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function read(string $path): string
    {
        /** @var HashicorpVault $hcp */
        $hcp = app(HashicorpVault::LARAVEL_NAME);

        $result = $hcp->read($path);

        return $result->getValue();
    }

    public function readStream(string $path)
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function delete(string $path): void
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function deleteDirectory(string $path): void
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function createDirectory(string $path, Config $config): void
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function setVisibility(string $path, string $visibility): void
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function visibility(string $path): FileAttributes
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function mimeType(string $path): FileAttributes
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function lastModified(string $path): FileAttributes
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function fileSize(string $path): FileAttributes
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function listContents(string $path, bool $deep): iterable
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function move(string $source, string $destination, Config $config): void
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }

    public function copy(string $source, string $destination, Config $config): void
    {
        throw new UnsupportedActionException('Unsupported action: "'. __METHOD__ .'"');
    }
}
