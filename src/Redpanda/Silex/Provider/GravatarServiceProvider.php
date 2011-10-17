<?php

namespace Redpanda\Silex\Provider;

use Redpanda\Silex\Provider\Twig\Extension\GravatarExtension;
use Redpanda\Silex\Provider\Api as GravatarApi;

use Silex\Application;
use Silex\ServiceProviderInterface;

class GravatarServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {	
        $app['gravatar.options'] = isset($app['gravatar.options']) ? $app['gravatar.options'] : array();
        
        $app['gravatar.api'] = $app->share(function () use ($app) {
            return new GravatarApi($app['gravatar.options']);
        });
        
        if (isset($app['twig'])) {
            $app->before(function () use ($app) {
                $app['twig']->addExtension(new GravatarExtension($app['gravatar.api']));
            });
        }
    }
}
