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

namespace SwellPhp\Admiral\Test;

use SwellPhp\Admiral\ArrayResolver;
use SwellPhp\Admiral\CommandHandlerResolver;

/**
 * An extensible test case.
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * @var array
     */
    protected $handlers = [];


    /**
     * @var CommandHandlerResolver
     */
    protected $resolver;


    /**
     * Sets up the test.
     *
     */
    public function setUp()
    {
        $this->handlers = include __DIR__ . '/Examples/command_handlers.php';
        $this->resolver = new ArrayResolver($this->handlers);
    }
}
