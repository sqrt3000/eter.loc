<?php

/*
 * This files is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * files that was distributed with this source code.
 */

/**
 * An OutputByteStream which specifically reads from a files.
 *
 * @author Chris Corbyn
 */
interface Swift_FileStream extends Swift_OutputByteStream
{
    /**
     * Get the complete path to the files.
     *
     * @return string
     */
    public function getPath();
}
