<?php

namespace Nurigo\Solapi\Libraries;

/**
 * Internal helper that converts json_decode()'d stdClass values into the SDK's
 * typed Response objects. Centralizes the SOLAPI-specific quirk where list
 * fields may arrive either as a JSON array or as a JSON object keyed by
 * resource id (e.g. groupList: {G4V01: {...}}).
 */
class ResponseMapper
{
    /**
     * Wrap a stdClass value in $class, or return null when the value is absent.
     *
     * @template T of object
     * @param mixed $value
     * @param class-string<T> $class
     * @return T|null
     */
    public static function mapObject($value, string $class)
    {
        if ($value === null) {
            return null;
        }
        if (is_array($value)) {
            $value = (object) $value;
        }
        if (!is_object($value)) {
            return null;
        }

        return new $class($value);
    }

    /**
     * Convert a JSON array or object-keyed list into a plain indexed array.
     *
     * @param mixed $value
     * @return array|null
     */
    public static function normalizeList($value): ?array
    {
        if ($value === null) {
            return null;
        }
        if (is_array($value)) {
            $items = $value;
        } else if (is_object($value)) {
            $items = get_object_vars($value);
        } else {
            return null;
        }

        return array_values($items);
    }

    /**
     * Convert a list-like value into an array of $class instances.
     *
     * Accepts both JSON arrays and JSON objects (SOLAPI sometimes keys lists
     * by resource id). Returns null when the value is absent so callers can
     * distinguish "missing" from "empty".
     *
     * @template T of object
     * @param mixed $value
     * @param class-string<T> $class
     * @return T[]|null
     */
    public static function mapList($value, string $class): ?array
    {
        $items = self::normalizeList($value);
        if ($items === null) {
            return null;
        }

        $mapped = array_map(static function ($item) use ($class) {
            return self::mapObject($item, $class);
        }, $items);

        return array_values(array_filter($mapped, static function ($item) {
            return $item !== null;
        }));
    }
}
