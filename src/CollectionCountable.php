<?php


namespace Sonar200\Collection;


use Countable;

class CollectionCountable extends CollectionSerializable implements Countable
{

    /**
     * Размер коллекции
     */
    public function count()
    {
        return count($this->collection);
    }
}