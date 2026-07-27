# api-datatype-folder-name

[![Packagist Version](https://img.shields.io/packagist/v/elavora/api-datatype-folder-name.svg?style=flat-square)](https://packagist.org/packages/elavora/api-datatype-folder-name)
[![PHP Version](https://img.shields.io/packagist/php-v/elavora/api-datatype-folder-name.svg?style=flat-square)](https://packagist.org/packages/elavora/api-datatype-folder-name)
[![Composer Quality](https://github.com/Elavora/api-datatype-folder-name/actions/workflows/quality.yml/badge.svg?branch=main)](https://github.com/Elavora/api-datatype-folder-name/actions/workflows/quality.yml)
[![CodeQL](https://github.com/Elavora/api-datatype-folder-name/actions/workflows/codeql.yml/badge.svg?branch=main)](https://github.com/Elavora/api-datatype-folder-name/actions/workflows/codeql.yml)
[![License](https://img.shields.io/packagist/l/elavora/api-datatype-folder-name.svg?style=flat-square)](https://packagist.org/packages/elavora/api-datatype-folder-name)

DataType imutavel para validar nomes de pasta portaveis entre filesystems.

## Requisitos

- PHP 8.3 ou superior.
- Demais requisitos declarados em [`composer.json`](composer.json).

## Instalacao

```bash
composer require elavora/api-datatype-folder-name
```

## Inicio rapido

```php
use Elavora\Api\DataTypes\Filesystem\FolderName;

$valor = FolderName::from('avatars');
$normalizado = $valor->value();
```

O valor e preservado sem `trim` ou outra normalizacao silenciosa.

## Documentacao

Consulte o [guia de uso](docs/USO.md) para as restricoes e a validacao local.
