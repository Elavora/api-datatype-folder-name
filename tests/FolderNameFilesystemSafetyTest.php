<?php

declare(strict_types=1);

namespace Elavora\Api\DataTypes\FolderName\Tests;

use Elavora\Api\DataTypes\Filesystem\FolderName;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class FolderNameFilesystemSafetyTest extends TestCase
{
    #[DataProvider('controlCharacters')]
    public function testRejectsControlCharactersInAnyPosition(string $control): void
    {
        self::assertFalse(FolderName::isValid($control . 'arquivos'));
        self::assertFalse(FolderName::isValid('meus' . $control . 'arquivos'));
        self::assertFalse(FolderName::isValid('arquivos' . $control));
    }

    /**
     * @return iterable<string, array{string}>
     */
    public static function controlCharacters(): iterable
    {
        yield 'NUL' => ["\0"];
        yield 'newline' => ["\n"];
        yield 'tab' => ["\t"];
        yield 'DEL' => ["\x7F"];
    }

    public function testRejectsWindowsDeviceNames(): void
    {
        $reservedNames = ['CON', 'prn', 'Aux', 'nul'];
        for ($number = 1; $number <= 9; $number++) {
            $reservedNames[] = 'COM' . $number;
            $reservedNames[] = 'lpt' . $number;
        }

        foreach ($reservedNames as $reservedName) {
            self::assertFalse(FolderName::isValid($reservedName));
        }
    }

    public function testAcceptsPortableNamesWithoutChangingThem(): void
    {
        self::assertSame('avatars', FolderName::from('avatars')->value());
        self::assertSame('Meus arquivos', FolderName::from('Meus arquivos')->value());
        self::assertSame('Relatorios 東京', FolderName::from('Relatorios 東京')->value());
        self::assertTrue(FolderName::isValid(str_repeat('a', 255)));
        self::assertFalse(FolderName::isValid(str_repeat('a', 256)));
    }

    #[DataProvider('invalidNames')]
    public function testPreservesExistingInvalidNameRules(mixed $value): void
    {
        self::assertFalse(FolderName::isValid($value));
    }

    /**
     * @return iterable<string, array{mixed}>
     */
    public static function invalidNames(): iterable
    {
        yield 'empty' => [''];
        yield 'dot' => ['alguma.pasta'];
        yield 'trailing space' => ['arquivos '];
        yield 'slash' => ['meus/arquivos'];
        yield 'backslash' => ['meus\\arquivos'];
        yield 'colon' => ['arquivos:temporarios'];
        yield 'asterisk' => ['arquivos*'];
        yield 'question mark' => ['arquivos?'];
        yield 'double quote' => ['arquivos"'];
        yield 'angle brackets' => ['arquivos<1>'];
        yield 'pipe' => ['arquivos|1'];
        yield 'integer' => [123];
        yield 'array' => [['arquivos']];
        yield 'object' => [new class {}];
        yield 'null' => [null];
    }
}
