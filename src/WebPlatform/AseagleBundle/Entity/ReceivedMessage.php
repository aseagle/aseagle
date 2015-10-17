<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Receiver
 *
 * @ORM\Table(name="received_message")
 * @ORM\Entity
 */
class ReceivedMessage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $user_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="author_id", type="integer")
     */
    private $author_id;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=500)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_read", type="boolean")
     */
    private $is_read;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_star", type="boolean")
     */
    private $is_star;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="task_dl", type="datetime", nullable=true)
     */
    private $task_dl = null;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="received_messages")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $receiver;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="author_messages")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user_id
     *
     * @param integer $userId
     * @return ReceivedMessage
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set author_id
     *
     * @param integer $authorId
     * @return ReceivedMessage
     */
    public function setAuthorId($authorId)
    {
        $this->author_id = $authorId;

        return $this;
    }

    /**
     * Get author_id
     *
     * @return integer 
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return ReceivedMessage
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return ReceivedMessage
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return ReceivedMessage
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set is_read
     *
     * @param boolean $isRead
     * @return ReceivedMessage
     */
    public function setIsRead($isRead)
    {
        $this->is_read = $isRead;

        return $this;
    }

    /**
     * Get is_read
     *
     * @return boolean 
     */
    public function getIsRead()
    {
        return $this->is_read;
    }

    /**
     * Set is_star
     *
     * @param boolean $isStar
     * @return ReceivedMessage
     */
    public function setIsStar($isStar)
    {
        $this->is_star = $isStar;

        return $this;
    }

    /**
     * Get is_star
     *
     * @return boolean 
     */
    public function getIsStar()
    {
        return $this->is_star;
    }

    /**
     * Set task_dl
     *
     * @param \DateTime $taskDl
     * @return ReceivedMessage
     */
    public function setTaskDl($taskDl)
    {
        $this->task_dl = $taskDl;

        return $this;
    }

    /**
     * Get task_dl
     *
     * @return \DateTime 
     */
    public function getTaskDl()
    {
        return $this->task_dl;
    }

    /**
     * Set receiver
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $receiver
     * @return ReceivedMessage
     */
    public function setReceiver(\WebPlatform\AseagleBundle\Entity\User $receiver = null)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get receiver
     *
     * @return \WebPlatform\AseagleBundle\Entity\User 
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set author
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $author
     * @return ReceivedMessage
     */
    public function setAuthor(\WebPlatform\AseagleBundle\Entity\User $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \WebPlatform\AseagleBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
