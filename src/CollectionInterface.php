<?php


namespace Sonar200\Collection;


/**
 * Interface CollectionInterface
 *
 * @package Sonar200\Collection
 */
interface CollectionInterface
{
    /**
     * Вставка в конец коллекции
     *
     * @param $value
     *
     * @return mixed
     */
    public function add($value);

    /**
     * Поиск значения в коллекции
     *
     * @param $searchValue
     *
     * @return mixed
     */

    public function find($searchValue);

    public function contains(...$value);

    public function clear(): void;

    public function copy();

    public function isEmpty(): bool;

    public function toArray(): array;
}