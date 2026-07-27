# Guia de uso

`FolderName` aceita strings de 1 a 255 bytes e preserva o valor informado.

```php
use Elavora\Api\DataTypes\Filesystem\FolderName;

$folderName = FolderName::from('Meus arquivos');

echo $folderName->value(); // Meus arquivos
```

Sao rejeitados:

- ponto e os caracteres `\ / : * ? " < > |`;
- controles ASCII, DEL, espaco final e nomes de dispositivo do Windows.

Unicode valido e espacos internos sao aceitos.

## Validacao do pacote

Execute os comandos a partir da raiz do clone:

```bash
docker run --rm -v "${PWD}:/workspace" -w /workspace composer:2 composer update --no-interaction --no-progress --prefer-dist
docker run --rm -v "${PWD}:/workspace" -w /workspace composer:2 composer check
```
