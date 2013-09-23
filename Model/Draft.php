<?php

/*
 * This file is part of the CCDNForum ForumBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNForum\ForumBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;

use CCDNForum\ForumBundle\Entity\Board as ConcreteBoard;
use CCDNForum\ForumBundle\Entity\Topic as ConcreteTopic;

abstract class Draft
{
    /** @var Board $board */
    protected $board = null;

    /** @var Topic $topic */
    protected $topic = null;

    /** @var UserInterface $createdBy */
    protected $createdBy = null;

    /** @var Attachment $attachment */
    protected $attachment = null;
	
	/**
	 *
	 * @access public
	 */
    public function __construct()
    {
        // your own logic
    }

    /**
     * Get topic
     *
     * @return Topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set topic
     *
     * @param Topic $topic
     * @return Draft
     */
    public function setTopic(ConcreteTopic $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get created_by
     *
     * @return UserInterface
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set created_by
     *
     * @param UserInterface $createdBy
     * @return Draft
     */
    public function setCreatedBy(UserInterface $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get board
     *
     * @return Board
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Set board
     *
     * @param Board $board
     * @return Draft
     */
    public function setBoard(ConcreteBoard $board = null)
    {
        $this->board = $board;

        return $this;
    }

//    /**
//     * Get attachment
//     *
//     * @return Attachment
//     */
//    public function getAttachment()
//    {
//        return $this->attachment;
//    }
//
//    /**
//     * Set attachment
//     *
//     * @param Attachment $attachment
//     * @return Draft
//     */
//    public function setAttachment(Attachment $attachment = null)
//    {
//        $this->attachment = $attachment;
//
//        return $this;
//    }
}
