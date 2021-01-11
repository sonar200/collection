<?php


namespace Sonar200\Collection;


use Generator;

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
}