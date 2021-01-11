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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
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
        $this->iterator->key();
    }

    public function valid(): bool
    {
        return $this->iterator->valid();
    }

    public function rewind()
    {
        $this->iterator = $this->getIterator();
    }
}