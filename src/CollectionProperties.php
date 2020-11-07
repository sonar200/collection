<?php


namespace Sonar200\Collection;


use Generator;

class CollectionProperties
{
    /**
     * @var Generator|null
     */
    protected ?Generator $iterator = null;

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
}