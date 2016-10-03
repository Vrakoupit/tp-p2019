<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(")
 * @ORM\Table()
 */
class Reply
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     *
     * @var text
     */
    private $reply;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 42,
     *      minMessage = "Your answer's title must be at least {{ limit }} characters long",
     *      maxMessage = "Your answer's title cannot be longer than {{ limit }} characters"
     * )
     *
     * @var string
     */
    private $titleReply;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 24,
     *      minMessage = "Your nickname must be at least {{ limit }} characters long",
     *      maxMessage = "Your nickname cannot be longer than {{ limit }} characters"
     * )
     *
     * @var string
     */
    private $author;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $email;


    /**
     * @ORM\ManyToOne(targetEntity="Subject", inversedBy="replies")
     *
     * @var text
     */
    private $subject;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $voteAnswer;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $createdAt;

    public function __construct()
    {
        $this->voteAnswer = 0;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getVoteAnswer()
    {
        return $this->voteAnswer;
    }

    /**
     * @param mixed $voteAnswer
     */
    public function setVoteAnswer($voteAnswer)
    {
        $this->voteAnswer = $voteAnswer;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setAuthorEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getTitleReply()
    {
        return $this->titleReply;
    }

    /**
     * @param string $titleReply
     */
    public function setTitleReply($titleReply)
    {
        $this->titleReply = $titleReply;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return text
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * @param text $reply
     */
    public function setReply($reply)
    {
        $this->reply = $reply;
    }

    /**
     * @return text
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param text $subject
     */
    public function setSubject(Subject $subject)
    {
        $this->subject = $subject;
    }
}