# Redpanda GravatarExtension

Simple wrapper to gravatar API for [Silex][1].

## Installation

    $ git submodule add git://github.com/redpanda/silex-gravatar.git src/Redpanda/Gravatar

## Registering

    $app->register(new Redpanda\Gravatar\Extension(), array(
        'gravatar.options' => array(
        	'size'    => 100,
        	'rating   => 'g',
        	'default' => 'mm',
        )
    ));
    
## Usage with Twig

The only required parameter is the email adress. The rest have default values.

Without paramaters:
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

## More informations

* [Gravatar documentation][3]

[1]: http://silex-project.org
[2]: https://github.com/ornicar/GravatarBundle
[3]: http://en.gravatar.com/site/implement/