# PHP WordPress Image

[![Latest Stable Version](https://poser.pugx.org/josantonius/WP_Image/v/stable)](https://packagist.org/packages/josantonius/WP_Image) [![Latest Unstable Version](https://poser.pugx.org/josantonius/WP_Image/v/unstable)](https://packagist.org/packages/josantonius/WP_Image) [![License](https://poser.pugx.org/josantonius/WP_Image/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/9a6e81cf618944ad8f18161a319d0812)](https://www.codacy.com/app/Josantonius/WP_Image?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/WP_Image&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/WP_Image/downloads)](https://packagist.org/packages/josantonius/WP_Image) [![Travis](https://travis-ci.org/Josantonius/WP_Image.svg)](https://travis-ci.org/Josantonius/WP_Image) [![WP](https://img.shields.io/badge/WordPress-Standar-1abc9c.svg)](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) [![CodeCov](https://codecov.io/gh/Josantonius/WP_Image/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/WP_Image)

[English version](README.md)

Añadir, actualizar y borrar imágenes de posts en WordPress.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Métodos disponibles](#métodos-disponibles)
- [Cómo empezar](#cómo-empezar)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

## Requisitos

Esta biblioteca es soportada por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Instalación 

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **PHP WP_Image library**, simplemente escribe:

    $ composer require Josantonius/WP_Image

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    $ composer require Josantonius/WP_Image --prefer-source

También puedes **clonar el repositorio** completo con Git:

    $ git clone https://github.com/Josantonius/WP_Image.git

O **instalarlo manualmente**:

[Download WP_Image.php](https://raw.githubusercontent.com/Josantonius/WP_Image/master/src/class-wp-image.php):

    $ wget https://raw.githubusercontent.com/Josantonius/WP_Image/master/src/class-wp-image.php

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### - Guardar imagen y asociarla a un post específico:

```php
WP_Image::save($url, $post_ID, $featured);
```

| Atributo | Descripción | Tipo de dato | Requerido | Por defecto
| --- | --- | --- | --- | --- |
| $url | Url de la imagen. | string | Yes | |
| $post_ID | Post ID. | int | Yes | |
| $featured | Definir imagen como destacada. | boolean | No | false |

**@return** (string|false) → URI del archivo adjunto o falso en caso de fallo.

### - Cargar imagen al directorio de subidas de WordPress:

```php
WP_Image::upload($url, $filename);
```

| Atributo | Descripción | Tipo de dato | Requerido
| --- | --- | --- | --- |
| $url | Url de la imagen. | string | Yes |
| $filename| Nombre del archivo. | string | Yes |

**@return** (string|false) → Ruta de la imagen subida o falso en caso de fallo.

### Borra imágenes adjuntas y todos sus derivados:

```php
WP_Image::delete_all_attachment($post_ID, $force);
```

| Atributo | Descripción | Tipo de dato | Requerido
| --- | --- | --- | --- |
| $post_ID | Post ID. | int | Yes |
| $force| Forzar borrado. | boolean | Yes |

**@return** (int|false) → Número de imágenes adjuntas borradas.

## Cómo empezar

Para utilizar esta clase con **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\WP_Image;
```

Si la instalaste **manualmente**, utiliza:

```php
require_once __DIR__ . '/class-wp-image.php';

use Josantonius\WP_Image\WP_Image;
```

## Uso

Ejemplo de uso para esta biblioteca:

### - Cargar imagen:

```php
WP_Image::upload('https://site.com/image.png', 'image.png');
```

### - Guardar imagen:

```php
WP_Image::upload('https://site.com/image.png', '18');
```

### - Guardar imagen destacada:

```php
WP_Image::upload('https://site.com/image.png', '18', true);
```

### - Borrar imágenes adjuntas:

```php
WP_Image::delete_all_attachment(18);
```

### - Forzar borrado de imágenes adjuntas:

```php
WP_Image::delete_all_attachment('18', true);
```

## Tests 

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    $ git clone https://github.com/Josantonius/WP_Image.git
    
    $ cd WP_Image

    $ composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Ejecutar pruebas de estándares de código para [WordPress](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

    $ composer phpmd

Ejecutar todas las pruebas anteriores:

    $ composer tests

## ☑ Tareas pendientes

- [ ] Añadir nueva funcionalidad.
- [ ] Mejorar pruebas.
- [ ] Mejorar documentación.
- [ ] Refactorizar código para las reglas de estilo de código deshabilitadas. Ver [phpmd.xml](phpmd.xml) y [.php_cs.dist](.php_cs.dist).

## Contribuir

Si deseas colaborar, puedes echar un vistazo a la lista de
[issues](https://github.com/Josantonius/WP_Image/issues) o [tareas pendientes](#-tareas-pendientes).

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Ejecuta el comando `composer install` para instalar dependencias.
  Esto también instalará las [dependencias de desarrollo](https://getcomposer.org/doc/03-cli.md#install).
* Ejecuta el comando `composer fix` para estandarizar el código.
* Ejecuta las [pruebas](#tests).
* Crea una nueva rama (**branch**), **commit**, **push** y envíame un
  [pull request](https://help.github.com/articles/using-pull-requests).

## Repositorio

La estructura de archivos de este repositorio se creó con [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

## Copyright

2017 -2018 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).
