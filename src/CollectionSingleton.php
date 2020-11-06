<?php


namespace Sonar200\Collection;


/**
 * Class Style
 *
 * @package Core\Base\Template
 *
 */
class CollectionSingleton extends Collection
{
    /**
     * Object instances
     *
     * @var array
     */
    protected static array $instances = [];

    /**
     * Constructor
     *
     */
    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * Clone method
     *
     * @return void
     *
     */
    protected function __clone()
    {
    }

    /**
     * Wakeup method
     *
     */
    public function __wakeup()
    {
    }

    public function copy(){
        return $this;
    }

    /**
     * Gets the instance
     *
     * @return Collection
     *
     */
    public static function get()
    {
        $class = get_called_class();

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }
}