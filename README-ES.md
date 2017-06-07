# PHP WordPress Image

[![Latest Stable Version](https://poser.pugx.org/josantonius/wp_image/v/stable)](https://packagist.org/packages/josantonius/wp_image) [![Total Downloads](https://poser.pugx.org/josantonius/wp_image/downloads)](https://packagist.org/packages/josantonius/wp_image) [![Latest Unstable Version](https://poser.pugx.org/josantonius/wp_image/v/unstable)](https://packagist.org/packages/josantonius/wp_image) [![License](https://poser.pugx.org/josantonius/wp_image/license)](https://packagist.org/packages/josantonius/wp_image)

[English version](README.md)

Guardar imágenes en WordPress.

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Cómo empezar y ejemplos](#cómo-empezar-y-ejemplos)
- [Uso](#uso)
- [TODO](#-todo)
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

Esta ĺibrería es soportada por versiones de PHP 5.6 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

## Cómo empezar y ejemplos

Para utilizar esta biblioteca, simplemente:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\WP_Image\WP_Image;
```

### Guardar imagen

```php
WP_Image::save(
	'http://site.com/image.png', // Imagen url (Requerido)
	'18'                         // Post ID    (Requerido)
);
```

### Guardar imagen destacada

```php
WP_Image::save(
	'http://site.com/image.png', // Imagen url (Requerido)
	'18',                        // Post ID    (Requerido)
	true                         // Destacada  (Opcional | False por defecto)
);
```
## ☑ TODO

- [ ] Agregar tests
- [ ] Ampliar método para recibir imagen como datos

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
