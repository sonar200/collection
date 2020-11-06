<?php


namespace Sonar200\Collection;


use Generator;

abstract class CollectionAbstract implements CollectionInterface
{
    /**
     * @var Generator|null
     */
    protected ?Generator $iterator = null;

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
     * Включение строгой типизации для проверки элементов коллекции при добавлении
     *
     * @var bool
     */
    protected bool $strictMode = true;

    /**
     * Включение дублирующих записей в коллекции
     *
     * @var bool
     */
    protected bool $enableDublicate = true;

    /**
     * @var array
     */
    protected array $collection = [];


    public function offsetExists($offset)
    {
        return isset($this->collection[$offset]);
    }

    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->collection[$offset];
        }

        return null;
    }

    public function offsetSet($offset, $value)
    {
        if ($this->offsetExists($offset)) {
            $this->collection[$offset] = $value;
        }
        else{
            $this->push($value);
        }
    }

    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->collection[$offset]);
        }
    }

    public function count()
    {
        return count($this->collection);
    }

    public function clear(): void
    {
        $this->collection = [];
    }

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

    public function jsonSerialize()
    {
        return json_encode($this->collection, JSON_UNESCAPED_UNICODE);
    }

    /**
     *
     */
    public function getIterator()
    {
        foreach ($this->collection as $item) {
            yield $item;
        }
    }

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
     * @param $value
     *
     * @return false|int|string
     */
    public function find($value)
    {
        return array_search($value, $this->collection, $this->strictMode && gettype($value) != 'object');
    }


    /**
     * @param mixed ...$values
     */
    private function push(...$values)
    {
        foreach ($values as $value) {
            $this->collection[] = $value;
        }
    }

    /**
     * @param int $index
     *
     * @return bool
     */
    private function validIndex(int $index)
    {
        return $index >= 0 && $index < count($this->collection);
    }
}