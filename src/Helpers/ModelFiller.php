<?php

declare(strict_types=1);

namespace Tapfiliate\Helpers;

use JsonSerializable;

class ModelFiller
{
    public function toObject(JsonSerializable $classObject, array $data): mixed
    {
        foreach (array_filter($data) as $key => $value) {
            $camelKey = $this->camelize($key);

            if (property_exists($classObject, $camelKey)) {
                $funcName = 'set' . $this->pascalize($key);
                $classObject->{$funcName}($value);
            }
        }

        return $classObject;
    }

    private function camelize(string $input, string $separator = '_'): string
    {
        return str_replace($separator, '', lcfirst(ucwords($input, $separator)));
    }

    private function pascalize(string $input, string $separator = '_'): string
    {
        return str_replace($separator, '', ucwords($input, $separator));
    }
}
