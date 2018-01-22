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

use PHPUnit\Framework\TestCase;


/**
 * A test for the tests suite.
 *
 */
class TestForTests extends TestCase
{


    /**
     * it_knows_true_is_true
     *
     * @test
     */
    public function it_knows_true_is_true()
    {
        $true = true;
        $this->assertTrue($true);
    }
}
