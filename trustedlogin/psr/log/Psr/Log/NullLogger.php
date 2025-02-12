<?php
/**
 * @license MIT
 *
 * Modified by gravityview on 31-July-2022 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace GravityView\Psr\Log;

/**
 * This Logger can be used to avoid conditional log calls.
 *
 * Logging should always be optional, and if no logger is provided to your
 * library creating a NullLogger instance to have something to throw logs at
 * is a good way to avoid littering your code with `if ($this->logger) { }`
 * blocks.
 */
class NullLogger extends AbstractLogger
{
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
     *
     * @throws \GravityView\Psr\Log\InvalidArgumentException
     */
    public function log($level, $message, array $context = array())
    {
        // noop
    }
}
