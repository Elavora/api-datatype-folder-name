# Guia de uso

DataType de nome de pasta para aplicacoes Elavora API.

## Instalacao

```bash
composer require elavora/api-datatype-folder-name
```

## Quando usar

- Validar e normalizar valores antes de chegar na regra de negocio.
- Evitar passar strings soltas entre services, DTOs e persistencia.
- Reutilizar a mesma validacao em controllers, comandos e testes.

## Exemplo rapido

```php
use Elavora\Api\DataTypes\Filesystem\FolderName;

$valor = new FolderName('exemplo');
$normalizado = $valor->value();
```

## Principais pontos de entrada

- `Elavora\Api\DataTypes\Filesystem\FolderName`

## Dependencias de runtime

- PHP 8.3 ou superior
- `elavora/api-datatype-core` `^2.0` (que exige o `elavora/api-framework` `^2.0`)

## Validacao no projeto consumidor

Depois de instalar o pacote, rode os testes da aplicacao consumidora.

Para validar o pacote isoladamente (testes, lint e PHPStan, e como reproduzir o CI), veja
[Desenvolvimento e testes](DESENVOLVIMENTO.md). A automacao, as versoes e os arquivos de qualidade do repositorio estao em
[Automacao do repositorio](AUTOMACAO.md).

## Observacoes

- Mantenha regras de produto fora deste pacote.
- Prefira configurar extensoes no bootstrap da aplicacao.
- Instale apenas os modulos que a aplicacao realmente usa.
