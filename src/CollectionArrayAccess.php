<?php


namespace Sonar200\Collection;


use ArrayAccess;


/**
 * Class CollectionArrayAccess
 *
 * @package Sonar200\Collection
 */
class CollectionArrayAccess extends CollectionModify implements ArrayAccess
{
    /**
     * Проверка существования ключа в коллекции
     *
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->collection[$offset]);
    }

    /**
     * Получение элемента коллекции по ключу
     *
     * @param mixed $offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->collection[$offset];
        }

        return null;
    }

    /**
     * Замена значения элемента коллекции
     *
     * @param mixed $offset
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if ($this->offsetExists($offset)) {
            $this->collection[$offset] = $value;
        }
        else{
            $this->push($value);
        }
    }

    /**
     * Удаление элемента коллекции по ключу
     *
     * @param mixed $offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->collection[$offset]);
        }
    }
}