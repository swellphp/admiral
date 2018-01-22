<?php declare(strict_types=1);

/**
 * This file is part of SwellPhp Admiral
 *
 * @licence   Please view the Licence file supplied with this source code.
 *
 * @author    Keith Mifsud <http://www.keith-mifsud.me>
 *
 * @copyright Keith Mifsud 2018 <mifsud.k@gmail.com>
 *
 * @since     1.0
 * @version   1.0 Initial Release
 */

namespace SwellPhp\Admiral;

/**
 * Resolves the command handlers and their dependencies
 * from an array.
 *
 */
final class ArrayResolver implements CommandHandlerResolver
{

    /**
     * @var array
     */
    protected $handlers;


    /**
     * ArrayResolver constructor.
     *
     * @param array $handlers
     */
    public function __construct(array $handlers)
    {
        $this->setHandlers($handlers);
    }


    /**
     * Gets the handler.
     *
     * @param object $command
     * @return CommandHandler
     */
    public function getHandler($command): CommandHandler
    {
        $handler = $this->handlers[get_class($command)];
        return new $handler();
    }


    /**
     * Sets the Handlers.
     *
     * @param array $handlers
     */
    protected function setHandlers(array $handlers)
    {
        $this->handlers = $handlers;
    }
}
