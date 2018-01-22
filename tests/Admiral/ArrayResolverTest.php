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

namespace SwellPhp\Admiral\Test;

use SwellPhp\Admiral\ArrayResolver;
use SwellPhp\Admiral\CommandHandler;
use SwellPhp\Admiral\Example\Handler\Dependency\ListOfPosts;
use SwellPhp\Admiral\Example\Handler\SomeCommandWithDependencies;
use SwellPhp\Admiral\Example\Handler\SomeCommandWithMultipleDependencies;
use SwellPhp\Admiral\Exception\CommandHandlerNotFound;
use SwellPhp\Admiral\Exception\CommandNotRegistered;
use SwellPhp\Admiral\Example\Command\CommandWithoutHandler;
use SwellPhp\Admiral\Example\Command\DraftNewBlogPost;
use SwellPhp\Admiral\Example\Command\NotRegisteredCommand;
use SwellPhp\Admiral\Example\Command\SomeCommand;


/**
 * Tests for the array resolver.
 *
 */
class ArrayResolverTest extends TestCase
{


    /**
     * Tests that it can get the command handler for a given command.
     *
     * @test
     */
    public function it_can_get_command_handler_of_command()
    {
        $handler = $this->resolver->getHandler(
            new DraftNewBlogPost('title', 'content')
        );

        $this->assertInstanceOf(
            \SwellPhp\Admiral\Example\Handler\DraftNewBlogPost::class,
            $handler
        );
    }


    /**
     * Tests that an exception is thrown when a handler is not found.
     *
     * @test
     * @expectedException \SwellPhp\Admiral\Exception\CommandHandlerNotFound
     */
    public function it_throws_exception_when_handler_is_not_found()
    {
        $handler = $this->resolver->getHandler(
            new CommandWithoutHandler()
        );
    }


    /**
     * Tests that an exception is thrown when a command handler
     * does not implement to the handler contract.
     *
     * @test
     * @expectedException \TypeError
     */
    public function it_throws_exception_if_handler_does_not_implement_contract()
    {
        $handler = $this->resolver->getHandler(
            new SomeCommand()
        );
    }


    /**
     * Tests that it throws an exception when attempting
     * to retrieve a handler for an unregistered command.
     *
     * @test
     * @expectedException \SwellPhp\Admiral\Exception\CommandNotRegistered
     */
    public function it_throws_exception_if_command_is_not_registered()
    {
        $handlerForNonExistingCommand = $this->resolver->getHandler(
            new NotRegisteredCommand()
        );
    }


    /**
     * Test that it can resolve command handler's dependencies.
     *
     * @test
     */
    public function it_resolve_handler_dependencies_from_instance_of_it()
    {
        $resolver = new ArrayResolver([
            SomeCommand::class => [
                SomeCommandWithDependencies::class,
                [
                    new ListOfPosts()
                ]
            ]
        ]);
        $handler = $resolver->getHandler(new SomeCommand());
        $this->assertInstanceOf(
            CommandHandler::class,
            $handler
        );
    }


    /**
     * Tests that it can resolve resolve multiple command handler dependencies.
     *
     * @test
     */
    public function it_resolves_multiple_dependencies()
    {
        $resolver = new ArrayResolver([
            SomeCommand::class => [
                SomeCommandWithMultipleDependencies::class,
                [
                    new ListOfPosts(),
                    'string',
                    100
                ]
            ]
        ]);
        $handler = $resolver->getHandler(
            new SomeCommand()
        );
        $this->assertInstanceOf(
            CommandHandler::class,
            $handler
        );
    }

}

