<?php

namespace App\Domain\Vault;

use League\Flysystem\Config;
use League\Flysystem\FileAttributes;
use League\Flysystem\FilesystemAdapter;

class VaultFlysystemAdapter implements FilesystemAdapter
{
    public function __construct(
        public readonly HashicorpVault $vault
    )
    {}

    public function fileExists(string $path): bool
    {
        // TODO: Implement fileExists() method.
    }

    public function directoryExists(string $path): bool
    {
    }

    public function write(string $path, string $contents, Config $config): void
    {
    }

    public function writeStream(string $path, $contents, Config $config): void
    {
    }

    public function read(string $path): string
    {

    }

    public function readStream(string $path)
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function delete(string $path): void
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function deleteDirectory(string $path): void
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function createDirectory(string $path, Config $config): void
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function setVisibility(string $path, string $visibility): void
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function visibility(string $path): FileAttributes
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function mimeType(string $path): FileAttributes
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function lastModified(string $path): FileAttributes
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function fileSize(string $path): FileAttributes
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function listContents(string $path, bool $deep): iterable
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function move(string $source, string $destination, Config $config): void
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }

    public function copy(string $source, string $destination, Config $config): void
    {
        //throw new UnsupportedAction('Unsupported action: "'. __METHOD__ .'"');
    }
}
