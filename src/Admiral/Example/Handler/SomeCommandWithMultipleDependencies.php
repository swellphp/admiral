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
 * Example command handler with multiple dependencies.
 *
 */
final class SomeCommandWithMultipleDependencies implements CommandHandler
{

    /**
     * @var ListOfPosts
     */
    protected $postList;


    /**
     * @var string
     */
    protected $stringDependency;


    /**
     * @var number
     */
    protected $numericDependency;


    /**
     * SomeCommandWithMultipleDependencies constructor.
     *
     * @param ListOfPosts $postList
     * @param string      $stringDependency
     * @param int      $numericDependency
     */
    public function __construct(
        ListOfPosts $postList,
        string $stringDependency,
        int $numericDependency
    ) {
        $this->postList = $postList;
        $this->stringDependency = $stringDependency;
        $this->numericDependency = $numericDependency;
    }


}
