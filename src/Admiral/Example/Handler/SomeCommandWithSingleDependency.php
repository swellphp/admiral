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

namespace SwellPhp\Admiral\Example\Handler;


use SwellPhp\Admiral\CommandHandler;
use SwellPhp\Admiral\Example\Handler\Dependency\ListOfPosts;

/**
 * Example command handler with a dependency
 * for testing and documentation purposes.
 *
 */
final class SomeCommandWithSingleDependency implements CommandHandler
{

    /**
     * @var ListOfPosts
     */
    protected $listOfPosts;


    /**
     * Constructor.
     *
     * @param ListOfPosts $listOfPosts
     */
    public function __construct(ListOfPosts $listOfPosts)
    {
        $this->listOfPosts = $listOfPosts;
    }
}
