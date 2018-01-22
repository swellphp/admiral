<?php
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


/**
 * An array of commands with their handlers and dependencies.
 */
$commandHandlers = [

    \SwellPhp\Admiral\Example\Command\DraftNewBlogPost::class =>
        \SwellPhp\Admiral\Example\Handler\DraftNewBlogPost::class,

    \SwellPhp\Admiral\Example\Command\PublishBlogPost::class =>
        \SwellPhp\Admiral\Example\Handler\PublishBlogPost::class,

    \SwellPhp\Admiral\Example\Command\CommandWithoutHandler::class => '',

    \SwellPhp\Admiral\Example\Command\SomeCommand::class =>
        \SwellPhp\Admiral\Example\Handler\HandlerDoesNotImplementContract::class,

];

return $commandHandlers;
 