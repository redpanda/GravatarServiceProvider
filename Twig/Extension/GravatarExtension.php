<?php

namespace Redpanda\Gravatar\Twig\Extension;

use Redpanda\Gravatar\Api as GravatarApi;

/**
 * @author     Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author     Henrik Bjørnskov <henrik@bearwoods.dk>
 * @author     Jimmy Leger <jimmy.leger@gmail.com>
 */
class GravatarExtension extends \Twig_Extension
{
    /**
     * @var GravatarApi $api
     */
    protected $api;

    /**
     * Constructor
     * 
     * @param GravatarApi $api
     */
    public function __construct(GravatarApi $api)
    {
        $this->api = $api;
    }
    
    public function getFunctions()
    {
        return array(
            'gravatar' => new \Twig_Function_Method($this, 'getUrl'),
        );
    }

    public function getFilters()
    {
        return array(
            'gravatar' => new \Twig_Filter_Method($this, 'getUrl'),
        );
    }

    public function getUrl($email, $size = null, $rating = null, $default = null, $force_default = false)
    {
        return $this->api->getUrl($email, $size, $rating, $default, $force_default);
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'gravatar';
    }
}