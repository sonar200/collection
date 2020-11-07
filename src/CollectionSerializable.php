<?php


namespace Sonar200\Collection;


use JsonSerializable;

class CollectionSerializable extends CollectionProperties implements JsonSerializable
{
    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return json_encode($this->collection, JSON_UNESCAPED_UNICODE);
    }
}