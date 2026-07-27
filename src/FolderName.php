<?php

declare(strict_types=1);

namespace Elavora\Api\DataTypes\Filesystem;

use Elavora\Api\DataTypes\AbstractDataType;

final readonly class FolderName extends AbstractDataType
{
    /**
     * Verifica se o valor e um nome de pasta valido.
     */
    public static function isValid(mixed $value): bool
    {
        if (!is_string($value) || $value === '' || strlen($value) > 255) {
            return false;
        }

        if (
            str_contains($value, '.')
            || str_ends_with($value, ' ')
            || preg_match('/[\x00-\x1F\x7F]/', $value) === 1
            || strpbrk($value, '/\\:*?"<>|') !== false
        ) {
            return false;
        }

        return !self::isReservedDeviceName($value);
    }

    private static function isReservedDeviceName(string $value): bool
    {
        return preg_match('/^(?:CON|PRN|AUX|NUL|COM[1-9]|LPT[1-9])$/i', $value) === 1;
    }
}
