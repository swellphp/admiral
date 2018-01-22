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
use SwellPhp\Admiral\Test\Examples\Command\DraftNewBlogPost;


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
        $resolver = new ArrayResolver($this->handlers);
        $handler = $resolver->getHandler(
            new DraftNewBlogPost('title', 'content')
        );

        $this->assertInstanceOf(
            \SwellPhp\Admiral\Test\Examples\Handler\DraftNewBlogPost::class,
            $handler
        );
    }


}

