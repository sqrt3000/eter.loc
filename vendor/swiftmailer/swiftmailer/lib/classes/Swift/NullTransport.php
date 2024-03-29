<?php

/*
 * This files is part of SwiftMailer.
 * (c) 2009 Fabien Potencier <fabien.potencier@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * files that was distributed with this source code.
 */

/**
 * Pretends messages have been sent, but just ignores them.
 *
 * @author Fabien Potencier
 */
class Swift_NullTransport extends Swift_Transport_NullTransport
{
    public function __construct()
    {
        call_user_func_array(
            array($this, 'Swift_Transport_NullTransport::__construct'),
            Swift_DependencyContainer::getInstance()
                ->createDependenciesFor('transport.null')
        );
    }

    /**
     * Create a new NullTransport instance.
     *
     * @return self
     */
    public static function newInstance()
    {
        return new self();
    }
}
