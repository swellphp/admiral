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

use SwellPhp\Admiral\Exception\CommandNotRegistered;
use SwellPhp\Admiral\Exception\CommandHandlerNotFound;

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
    protected $handlers = [];


    /**
     * @var array
     */
    protected $handlersDependencies = [];


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
        $this->assertCommandIsRegistered(get_class($command));

        $handler = $this->handlers[get_class($command)];

        $this->assertCommandHandlerExists($handler);

        $dependencies = [];
        if ($this->hasDependencies($handler)) {
            $dependencies = $this->resolveDependencies($handler);
        }
        $handler = new $handler(...$dependencies);

        return $handler;
    }


    /**
     * Resolves the dependencies.
     *
     * @param string $commandHandler
     * @return array
     */
    protected function resolveDependencies(
        string $commandHandler
    ): array {

        $dependencies = [];
        foreach (
            $this->handlersDependencies[$commandHandler] as $handlerDependencies
        ) {
            $dependencies[] = $handlerDependencies;
        }
        return $dependencies;
    }


    /**
     * Checks if a handler has dependencies.
     *
     * @param string $commandHandler
     * @return bool
     */
    protected function hasDependencies(string $commandHandler) : bool
    {
        return array_key_exists($commandHandler, $this->handlersDependencies);
    }


    /**
     * Asserts the command is registered.
     *
     * @param string $command
     * @throws CommandNotRegistered
     */
    protected function assertCommandIsRegistered(string $command): void
    {
        if (!array_key_exists($command, $this->handlers)) {
            throw new CommandNotRegistered($command);
        }
    }


    /**
     * Asserts that the command handler exists.
     *
     * @param string $commandHandler
     * @throws CommandHandlerNotFound
     */
    protected function assertCommandHandlerExists(string $commandHandler) : void
    {
        if (! class_exists($commandHandler)) {
            throw new CommandHandlerNotFound($commandHandler);
        }
    }


    /**
     * Sets the Handlers.
     *
     * @param array $handlers
     */
    protected function setHandlers(array $handlers)
    {
        $registeredHandlers = [];
        foreach ($handlers as $command => $handler) {
            if (! is_array($handler)) {
                $registeredHandlers[$command] = $handler;
            } else {
                $registeredHandlers[$command] = $handler[0];
                $this->setHandlersDependencies($handler[0], $handler[1]);
            }

        }
        $this->handlers = $registeredHandlers;
    }


    /**
     * Sets the HandlersDependencies.
     *
     * @param string $commandHandler
     * @param array $dependencies
     */
    protected function setHandlersDependencies(
        string $commandHandler,
        array $dependencies
    ) {
        $handlerDependencies = [];
        foreach ($dependencies as $dependency) {
             $handlerDependencies[] = $dependency;
        }
        $this->handlersDependencies[$commandHandler] = $handlerDependencies;
    }

}
