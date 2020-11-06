<?php


namespace Sonar200\Collection;


use Ds\Vector;
use Generator;
use Iterator;

/**
 * Class Style
 *
 * @package Core\Base\Template
 *
 */
class Collection implements Iterator
{
    /**
     * @var Collection[]
     */
    protected static array $instances = [];

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
     * @var Vector
     */
    protected Vector $vector;

    /**
     * @var Generator|null
     */
    protected ?Generator $iterator;

    /**
     * Collection constructor.
     */
    protected function __construct() {
        $this->vector = new Vector();
        $this->iterator = $this->vector->getIterator();
    }

    /**
     * @param mixed $value
     */
    public function add($value)
    {
        if ($this->enableDublicate || (!$this->enableDublicate && !$this->contains($value))) {
            $this->vector->push($value);
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
        return array_search($value, $this->list(), $this->strictMode && gettype($value) != 'object');
    }

    public function count()
    {
        return $this->vector->count();
    }

    /**
     * @param int $index
     *
     * @return mixed
     */
    public function get(int $index)
    {
        return $this->vector->offsetGet($index);
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->iterator->current();
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        $this->iterator->next();
    }


    public function each()
    {
        if($this->iterator->valid()){
            $item = $this->iterator->current();
            $this->iterator->next();
            return $item;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->iterator->key();
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return $this->iterator->valid();
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        $this->iterator = null;
        $this->iterator = $this->vector->getIterator();
    }

    public function first()
    {
        return $this->vector->first();
    }

    public function last()
    {
        return $this->vector->last();
    }

    public function list()
    {
        return $this->vector->toArray();
    }

    public static function getInstance()
    {
        $class = get_called_class();

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new $class;
        }
        return self::$instances[$class];
    }

    protected function __clone()
    {
    }

    protected function __wakeup()
    {
    }
}