<?php


namespace Sonar200\Collection;


abstract class CollectionAbstract extends CollectionArrayAccess
{
    /**
     * CollectionAbstract constructor.
     */
    public function __construct()
    {
        if (!$this->iterator) {
            $this->iterator = $this->getIterator();
        }
    }

    /**
     *  Генерация итератора
     */
    public function getIterator()
    {
        foreach ($this->collection as $item) {
            yield $item;
        }
    }
}