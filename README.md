![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D_7.4-8892BF.svg)
![download](https://img.shields.io/github/downloads/josAlba/php_open_ia_api/total)

# OpenIA API


## Instalación

Puede instalarlo utilizando composer:

```
composer require jos/open_ia_api
```

## Uso básico

Para utilizarlo, primero debe importar la biblioteca y crear una instancia del objeto OpenIA:

```php
    use Jos\OpenIaApi\OpenIA;

    $openIA = new OpenIA($token,$organization);
```

Luego, puede generar respuestas del chatbot utilizando el método post con el mensaje:

```php
    $response = $openIA->post('Hello!');

    echo $response->__toString();
```

Puede integrar ChatGPT en su aplicación y crear respuestas de chatbot personalizadas.
