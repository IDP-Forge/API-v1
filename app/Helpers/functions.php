<?php

namespace App\Helpers;

if(!function_exists('tableOf'))
{
    function tableOf(string $class): string | null
    {
        if(!class_exists($class)) return null;

        $object = new $class;

        if(!method_exists($object, 'getTable')) return null;

        return $object->getTable();
    }
}
