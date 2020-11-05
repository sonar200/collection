<?php


namespace Sonar200\Collection;


use Ds\Vector;
use Iterator;

/**
 * Class Style
 *
 * @package Core\Base\Template
 *
 */
class Collection implements Iterator
{
    /** @var Collection[] */
    protected static array $instances = [];

    protected Vector $vector;
    protected int $increment = 0;

    protected function __construct() {
        $this->vector = new Vector();
    }

    /**
     * @param mixed $value
     */
    public function add($value)
    {
        $containsObject = gettype($value) == 'object' && !$this->containsObject($value);
        $contains = gettype($value) != 'object' && !$this->vector->contains($value);

        if ($containsObject || $contains) {
            $this->vector->push($value);
        }
    }

    /**
     * Проверка наличия объекта в коллекции
     *
     * @param mixed $value
     *
     * @return bool
     */
    private function containsObject($value): bool
    {
        $list = $this->list();

        foreach ($list as $item) {
            if ($item == $value) {
                return true;
            }
        }

        return false;
    }

    public function count()
    {
        return $this->vector->count();
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->vector->get($this->increment);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        $this->increment++;

        if($this->vector->offsetExists($this->increment)){
            return $this->vector->get($this->increment);
        }

        return false;
    }

    public function prev()
    {
        $this->increment--;

        if($this->vector->offsetExists($this->increment)){
            return $this->vector->get($this->increment);
        }

        return false;
    }

    public function each()
    {
        if($this->vector->offsetExists($this->increment)){
            return $this->vector->get($this->increment++);
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->increment;
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {

    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        $this->increment = 0;
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
        $this->rewind();
        $list = [];

        while($item = $this->each()){
            array_push($list, $item);
        }
        $this->rewind();

        return $list;
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