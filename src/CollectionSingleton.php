<?php


namespace Sonar200\Collection;


/**
 * Class CollectionSingleton
 *
 * @package Sonar200\Collection
 *
 */
class CollectionSingleton extends Collection
{
    /**
     * Object instances
     *
     * @var array
     */
    protected static $instances = [];

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

    public function copy(): CollectionSingleton
    {
        return $this;
    }

    /**
     * Gets the instance
     *
     * @return Collection
     *
     */
    public static function getInstance(): Collection
    {
        $class = get_called_class();

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }
}