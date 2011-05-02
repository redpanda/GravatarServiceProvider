<?php

namespace Redpanda\Gravatar;

/**
 * @author     Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author     Henrik Bjørnskov <henrik@bearwoods.dk>
 * @author     Jimmy Leger <jimmy.leger@gmail.com>
 */
class Api
{
    /**
     * @var array $default array of default options that can be overriden with getters and in the construct.
     */
    protected $options = array(
        'size'          => 100,      // default size for avatar
        'rating'        => 'g',      // default rating
        'default'       => 'retro',  // default type for unregistred emails
        'force_default' => false,    // build only default avatars
	);
	
    /**
     * Constructor
     *
     * @param array $options the array is merged with the defaults.
     * @return void
     */
    public function __construct($options = array())
    {
        $this->options = array_merge($this->options, $options);
    }
	
    /**
     * Returns a url for a gravatar.
     *
     * @param  string  $email
     * @param  integer $size
     * @param  string  $rating
     * @param  string  $default
     * @return boolean $force_default
     */
    public function getUrl($email, $size = null, $rating = null, $default = null, $force_default = false)
    {
        $hash = md5(strtolower(trim($email)));

        $map = array(
            's' => $size    ?: $this->options['size'],
            'r' => $rating  ?: $this->options['rating'],
            'd' => $default ?: $this->options['default'],
        );
        
        if ($force_default || $this->options['force_default']) {
            $map['f'] = 'y';
        }

        return 'http://www.gravatar.com/avatar/' . $hash . '?' . http_build_query(array_filter($map));
    }
}