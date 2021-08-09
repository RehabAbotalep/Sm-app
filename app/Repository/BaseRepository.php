<?php


namespace App\Repository;


class BaseRepository
{
    public function __call($name, $arguments)
    {
        return static::$model->$name(...$arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        return static::$model->$name(...$arguments);
    }
}
