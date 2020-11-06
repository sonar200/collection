<?php


namespace Sonar200\Collection;


/**
 * Interface CollectionInterface
 *
 * @package Sonar200\Collection
 */
interface CollectionInterface extends  \ArrayAccess, \Countable, \JsonSerializable
{
    public function add($value);

    public function find($searchValue);

    public function contains(...$value);

    public function clear(): void;

    public function copy();

    public function isEmpty(): bool;

    public function toArray(): array;
}