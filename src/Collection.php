<?php


namespace Sonar200\Collection;


use Iterator;

/**
 * Class Style
 *
 * @package Core\Base\Template
 *
 */
class Collection extends CollectionAbstract implements Iterator
{
    public function current()
    {
        return $this->iterator->current();
    }

    public function next()
    {
        $this->iterator->next();
    }

    public function key()
    {
        return $this->iterator->key();
    }

    public function valid()
    {
        return $this->iterator->valid();
    }

    public function rewind()
    {
        $this->iterator = $this->getIterator();
    }
}