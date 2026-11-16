<?php

declare(strict_types=1);

namespace Elavora\Api\DataTypes\Filesystem;

use Elavora\Api\DataTypes\AbstractDataType;
use Elavora\Api\Framework\Contracts\DescribesType;

final readonly class FolderName extends AbstractDataType implements DescribesType
{
    /**
     * Descreve o tipo no OPTIONS publico da API.
     *
     * @return array<string, mixed>
     */
    public static function documentedType(): array
    {
        return [
            'type' => 'string',
            'pattern' => '^[^./:*?"<>|]{1,255}$',
            'example' => 'avatars',
            'description' => 'Nome de pasta com 1 a 255 caracteres, sem pontos e sem os caracteres / : * ? " < > |.',
        ];
    }

    /**
     * Verifica se o valor e um nome de pasta valido.
     */
    public static function isValid(mixed $value): bool
    {
        return is_string($value)
            && $value !== ''
            && preg_match('/^(?!.*\.)[^\\/:*?"<>|]{1,255}$/', $value) === 1;
    }
}
