<?php

class PermissionHelper
{
    const VIEW   = 1; // 0001
    const CREATE = 2; // 0010
    const EDIT   = 4; // 0100
    const DELETE = 8; // 1000

    public static function getAll()
    {
        return [
            'view' => self::VIEW,
            'create' => self::CREATE,
            'edit' => self::EDIT,
            'delete' => self::DELETE,
        ];
    }

    public static function encode(array $permissions): int
    {
        $value = 0;
        foreach ($permissions as $perm) {
            if (defined("self::" . strtoupper($perm))) {
                $value |= constant("self::" . strtoupper($perm));
            }
        }
        return $value;
    }

    public static function decode(int $bitmask): array
    {
        $result = [];
        foreach (self::getAll() as $key => $val) {
            if (($bitmask & $val) === $val) {
                $result[] = $key;
            }
        }
        return $result;
    }

    public static function has(int $bitmask, string $permission): bool
    {
        $perm = constant("self::" . strtoupper($permission)) ?? 0;
        return ($bitmask & $perm) === $perm;
    }

    public static function add(int $bitmask, string $permission): int
    {
        $perm = constant("self::" . strtoupper($permission)) ?? 0;
        return $bitmask | $perm;
    }

    public static function remove(int $bitmask, string $permission): int
    {
        $perm = constant("self::" . strtoupper($permission)) ?? 0;
        return $bitmask & ~$perm;
    }
}
