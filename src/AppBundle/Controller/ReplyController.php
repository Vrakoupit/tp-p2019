<?php
/**
 * Created by PhpStorm.
 * User: Glados
 * Date: 22/09/2016
 * Time: 14:43
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Reply;
use AppBundle\Entity\Subject;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route(path="/replies")
 */
class ReplyController extends Controller
{
    /**
     * @Route(path="{id}/vote/up", methods={"GET"}, name="reply_up_vote")
     * @Template()
     */
    public function upVoteAnswerAction($id)
    {
        $answer= $this->getDoctrine()->getRepository(Reply::class)->find($id);
        $voteAnswer = $answer->getVoteAnswer();
        $voteAnswer = $voteAnswer+1;
        $answer->setVoteAnswer($voteAnswer);
        $this->getDoctrine()->getManager()->flush();

        $newId= $answer->getSubject()->getId();

        return $this->redirectToRoute('subject_single', ['id' => $newId]);
    }

    /**
     * @Route(path="{id}/vote/down", methods={"GET"}, name="reply_down_vote")
     * @Template()
     */
    public function downVoteAnswerAction($id)
    {
        $answer= $this->getDoctrine()->getRepository(Reply::class)->find($id);
        $voteAnswer = $answer->getVoteAnswer();
        $voteAnswer = $voteAnswer-1;
        $answer->setVoteAnswer($voteAnswer);
        $this->getDoctrine()->getManager()->flush();

        $newId= $answer->getSubject()->getId();

        return $this->redirectToRoute('subject_single', ['id' => $newId]);
    }

    /**
     * @Route(path="/{id}/delete", methods={"GET"}, name="delete_reply")
     * @Template()
     */
    public function deleteReplyAction($id){
        $reply = $this->getDoctrine()->getRepository(Reply::class)->find($id);
        $temp = $this->getDoctrine()->getManager();
        $temp->remove($reply);
        $temp->flush();

        $subjectId = $reply->getSubject()->getId();

        return $this->redirectToRoute('subject_single', [ 'id' => $subjectId]);
    }
}