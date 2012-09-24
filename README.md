# GravatarServiceProvider

A simple wrapper to gravatar API for [Silex][1].

## Installation

    $ git submodule add git://github.com/redpanda/GravatarServiceProvider.git /path/to/vendor/service-provider/gravatar

## Autoloader

    $app['autoloader']->registerNamespace('Redpanda', /path/to/vendor/service-provider/gravatar/src');

## Registering

    $app->register(new Redpanda\Gravatar\Extension(), array(
        'gravatar.options' => array(
        	'size'    => 100,
        	'rating'  => 'g',
        	'default' => 'mm',
        )
    ));
    
## Usage with Twig

The only required parameter is the email adress. The rest have default values.

Without parameters:

	{{ gravatar('jimmy.leger@gmail.com') }}

Or:

	{{ 'jimmy.leger@gmail.com'|gravatar }}

With parameters:

	{{ gravatar('jimmy.leger@gmail.com', 96, 'g', 'retro', false) }}

Or:

	{{ 'jimmy.leger@gmail.com'|gravatar(96, 'g', 'retro', false) }}

## Credits

* [GravatarBundle][2]

## License

The GravatarExtension is licensed under the MIT license.

## More information

* [Gravatar documentation][3]

[1]: http://silex-project.org
[2]: https://github.com/ornicar/GravatarBundle
[3]: http://en.gravatar.com/site/implement/
