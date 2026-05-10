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
        return $value !== null ? new $class($value) : null;
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
        if ($value === null) {
            return null;
        }
        $items = is_array($value) ? $value : get_object_vars($value);
        return array_map(static function ($item) use ($class) {
            return new $class($item);
        }, $items);
    }
}
