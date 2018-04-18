<?php

namespace TelegramBot\types;

trait FactoryTrait
{
    /**
     * @throws ReflectionException If [[obj]] contains properties that are not
     * present in the class.
     */
    public static function fromObject($data, $dimension = 0, $class = self::class)
    {
        // These datatypes are not casted to their appropriate class!
        // The telegram API works with JSON, so these datatypes are recognized automatically
        // CallbackGame is not documented and therefore has no corresponding class!
        static $nativeDatatypes = ['bool', 'int', 'float', 'string', 'True', 'CallbackGame'];

        // Handle casting of objects in (nested) arrays
        if ($dimension > 0) {
            return array_map(function ($entry) use ($dimension, $class) {
                return self::fromObject($entry, $dimension - 1, $class);
            }, $data);
        }

        $rc = new \ReflectionClass($class);
        $instance = new $class();

        foreach ($data as $key => $value) {
            $camelize = lcfirst(str_replace(' ', '', ucwords(preg_replace('/[^A-Za-z0-9]+/', ' ', $key))));
            $prop = $rc->getProperty($camelize);

            // As of API 3.6 there are only single datatypes! (e.g. no int|string)
            if (preg_match('/@var\s+(\S+)/i', $prop->getDocComment(), $matches)) {
                $dimension = substr_count($matches[1], '[]');
                if ($dimension > 0) $matches[1] = str_replace("[]", "", $matches[1]);

                if (!in_array($matches[1], $nativeDatatypes)) {
                    $dataType = __NAMESPACE__ . '\\' . $matches[1];
                    // if (class_exists($dataType))
                    $instance->{$prop->name} = $dataType::fromObject($value, $dimension);
                    continue;
                }
            }

            $instance->{$prop->name} = $value;
        }

        return $instance;
    }
}
