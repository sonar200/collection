<?php


namespace Sonar200\Collection;


use Generator;

/**
 * Class CollectionProperties
 *
 * @package Sonar200\Collection
 */
class CollectionProperties
{
    /**
     * @var Generator|null
     */
    protected $iterator = null;

    /**
     * Включение строгой типизации для проверки элементов коллекции при добавлении
     *
     * @var bool
     */
    protected $strictMode = true;

    /**
     * Включение дублирующих записей в коллекции
     *
     * @var bool
     */
    protected $enableDublicate = true;

    /**
     * @var array
     */
    protected $collection = [];

    /**
     * @param bool $strictMode
     */
    public function setStrictMode(bool $strictMode): void
    {
        $this->strictMode = $strictMode;
    }

    /**
     * @param bool $enableDublicate
     */
    public function setEnableDublicate(bool $enableDublicate): void
    {
        $this->enableDublicate = $enableDublicate;
    }

    /**
     * @return Generator|null
     */
    public function getIterator(): ?Generator
    {
        return $this->iterator;
    }
}