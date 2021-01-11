<?php


namespace Sonar200\Collection;

/**
 * Class CollectionModify
 *
 * @package Sonar200\Collection
 */
class CollectionModify extends CollectionCountable implements CollectionInterface
{
    /**
     * @param mixed $value
     */
    public function add($value)
    {
        if ($this->enableDublicate || (!$this->enableDublicate && !$this->contains($value))) {
            $this->push($value);
        }
    }

    /**
     * @param mixed ...$values
     */
    protected function push(...$values)
    {
        foreach ($values as $value) {
            $this->collection[] = $value;
        }
    }

    /**
     * Проверка наличия объекта в коллекции
     *
     * @param mixed ...$values
     *
     * @return bool
     */
    public function contains(...$values): bool
    {
        foreach ($values as $value) {
            if ($this->find($value) === false) {
                return false;
            }
        }
        return true;
    }

    /**
     * Поиск элемента в коллекции
     *
     * @param $searchValue
     *
     * @return false|int|string
     */
    public function find($searchValue)
    {
        return array_search($searchValue, $this->collection, $this->strictMode && gettype($searchValue) != 'object');
    }

    /**
     * Очистка коллекции
     */
    public function clear(): void
    {
        $this->collection = [];
    }

    /**
     * Копирование коллекции
     *
     * @return mixed
     */
    public function copy()
    {
        $copy = new static();
        foreach ($this as $value){
            $copy->add($value);
        }
        return $copy;
    }

    public function isEmpty(): bool
    {
        return $this->count() == 0;
    }

    public function toArray(): array
    {
        return $this->collection;
    }
}