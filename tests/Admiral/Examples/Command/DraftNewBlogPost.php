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

namespace SwellPhp\Admiral\Test\Examples\Command;


/**
 * Just an example command for testing.
 *
 */
final class DraftNewBlogPost
{

    /**
     * @var string
     */
    protected $postTitle;


    /**
     * @var string
     */
    protected $postContent;


    /**
     * DraftNewBlogPost constructor.
     *
     * @param string $title
     * @param string $content
     */
    public function __construct(string $title, string $content)
    {
        $this->postTitle = $title;
        $this->postContent = $content;
    }


    /**
     * Gets the PostTitle.
     *
     * @return string
     */
    public function getPostTitle(): string
    {
        return $this->postTitle;
    }


    /**
     * Gets the PostContent.
     *
     * @return string
     */
    public function getPostContent(): string
    {
        return $this->postContent;
    }


}
