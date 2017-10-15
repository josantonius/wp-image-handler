# PHP WordPress Image

[![Latest Stable Version](https://poser.pugx.org/josantonius/wp_image/v/stable)](https://packagist.org/packages/josantonius/wp_image) [![Total Downloads](https://poser.pugx.org/josantonius/wp_image/downloads)](https://packagist.org/packages/josantonius/wp_image) [![Latest Unstable Version](https://poser.pugx.org/josantonius/wp_image/v/unstable)](https://packagist.org/packages/josantonius/wp_image) [![License](https://poser.pugx.org/josantonius/wp_image/license)](https://packagist.org/packages/josantonius/wp_image) [![Travis](https://travis-ci.org/Josantonius/WP_Image.svg)](https://travis-ci.org/Josantonius/WP_Image)

[English version](README.md)

Guardar imágenes en WordPress.

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Cómo empezar y ejemplos](#cómo-empezar-y-ejemplos)
- [Métodos disponibles](#métodos-disponibles)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

## Instalación 

La mejor forma de instalar esta extensión es a través de [composer](http://getcomposer.org/download/).

Para instalar PHP WordPress Image library, simplemente escribe:

    $ composer require Josantonius/WP_Image

El comando anterior sólo instalará los archivos necesarios, si prefieres descargar todo el código fuente (incluyendo tests, directorio vendor, excepciones no utilizadas, documentos...) puedes utilizar:

    $ composer require Josantonius/WP_Image --prefer-source

También puedes clonar el repositorio completo con Git:

    $ git clone https://github.com/Josantonius/WP_Image.git
    
## Requisitos

Esta biblioteca es soportada por versiones de PHP 5.6 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

## Cómo empezar y ejemplos

Para utilizar esta biblioteca, simplemente:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\WP_Image\WP_Image;
```

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### save($url, $postID, $featured)

Guardar imagen y asociarla a un post específico.

| Atributo | Descripción | Tipo de dato | Requerido | Por defecto
| --- | --- | --- | --- | --- |
| $url | Url de la imagen | string | Yes | |
| $postID | Post ID | int | Yes | |
| $featured | Definir imagen como destacada | boolean | No | false |

**@return** → string | false → URI del archivo adjunto o falso en caso de fallo

### upload($url, $filename)

Cargar imagen al directorio de subidas de WordPress.

| Atributo | Descripción | Tipo de dato | Requerido
| --- | --- | --- | --- |
| $url | Url de la imagen | string | Yes |
| $filename| Nombre del archivo | string | Yes |

**@return** → string | false → Ruta de la imagen subida o falso en caso de fallo

### deleteAttachedImages($postID, $force)

Borra imágenes adjuntas y todos sus derivados.

| Atributo | Descripción | Tipo de dato | Requerido
| --- | --- | --- | --- |
| $postID | Post ID | int | Yes |
| $force| Forzar eliminación | boolean | Yes |

**@return** → int | false → Número de imágenes adjuntas borradas

## Uso

### Cargar imagen

```php
WP_Image::upload('https://site.com/image.png', 'image.png');
```

### Guardar imagen

```php
WP_Image::upload('https://site.com/image.png', '18');
```

### Guardar imagen destacada

```php
WP_Image::upload('https://site.com/image.png', '18', true);
```

### Borrar imágenes adjuntas

```php
WP_Image::deleteAttachedImages(18);
```

### Forzar borrado de imágenes adjuntas

```php
WP_Image::deleteAttachedImages('18', true);
```

### Tests 

Para ejecutar las [pruebas](tests/WP_Image/Test) simplemente:

    $ git clone https://github.com/Josantonius/WP_Image.git
    
    $ cd WP_Image

    $ bash bin/install-wp-tests.sh wordpress_test root '' localhost latest

    $ phpunit

### ☑ Tareas pendientes

- [x] Completar tests
- [ ] Mejorar la documentación

## Contribuir

1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

## Repositorio

Los archivos de este repositorio se crearon y subieron automáticamente con [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

## Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).
