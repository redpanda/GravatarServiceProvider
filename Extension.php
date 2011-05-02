<?php

namespace Redpanda\Gravatar;

use Redpanda\Gravatar\Twig\Extension\GravatarExtension;
use Redpanda\Gravatar\Api as GravatarApi;

use Silex\Application;
use Silex\ExtensionInterface;

class Extension implements ExtensionInterface
{
    public function register(Application $app)
    {	
        $app['gravatar.options'] = isset($app['gravatar.options']) ? $app['gravatar.options'] : array();
        
        $app['gravatar.api'] = $app->share(function () use ($app) {
            return new GravatarApi($app['gravatar.options']);
        });
        
        if (isset($app['twig'])) {
            $app['twig']->addExtension(new GravatarExtension($app['gravatar.api']));
        }
    }
}
