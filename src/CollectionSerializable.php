<?php


namespace Sonar200\Collection;


use JsonSerializable;

/**
 * Class CollectionSerializable
 *
 * @package Sonar200\Collection
 */
class CollectionSerializable extends CollectionProperties implements JsonSerializable
{

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return json_encode($this->collection, JSON_UNESCAPED_UNICODE);
    }
}