<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reply;
use AppBundle\Entity\Subject;
use AppBundle\Form\Type\SubjectType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ReplyType;

/**
 * @Route(path="/subjects")
 */
class SubjectController extends Controller
{
    /**
     * @Route(path="/", methods={"GET"}, name="subject_index")
     * @Template()
     */
    public function indexAction()
    {
        return [
            'subjects' => $this->getDoctrine()->getRepository(Subject::class)->findNotResolved()
        ];
    }

    /**
     * @Route(path="/resolved", methods={"GET"}, name="subject_resolved")
     * @Template()
     */
    public function resolvedAction()
    {
        return [
            'subjects_resolved' => $this->getDoctrine()->getRepository(Subject::class)->findResolved()
        ];
    }

    /**
     * @Route(path="/create", methods={"GET", "POST"}, name="subject_create")
     * @Template()
     */

    public function createAction(Request $request){

        $subjectForm = new Subject();
        $subjectCreateForm = $this->createForm(SubjectType::class, $subjectForm);
        $subjectCreateForm->handleRequest($request);
        if($subjectCreateForm->isValid()){
            $this->getDoctrine()->getManager()->persist($subjectForm);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('subject_index');
        }

        return [
            'subjectCreateForm' => $subjectCreateForm->createView()
        ];

    }

    /**
     * @Route(path="/{id}", methods={"GET", "POST"}, name="subject_single")
     * @Template()
     */
    public function showAction(Request $request, $id)
    {
        $subject = $this->getDoctrine()->getRepository(Subject::class)->find($id);

        $reply = new Reply();
        $reply->setSubject($subject);

        $form = $this->createForm(ReplyType::class, $reply);

        $form->handleRequest($request);
        if ($form->isValid()){
            $this->getDoctrine()->getManager()->persist($reply);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("subject_single", [ 'id' => $id]);
        }

        return [
            'subject' => $subject,
            'form' => $form->createView()
        ];
    }

    /**
     * @Route(path="/{id}/vote/up", methods={"GET"}, name="subject_up_vote")
     * @Template()
     */
    public function upVoteAction($id)
    {
        $subject= $this->getDoctrine()->getRepository(Subject::class)->find($id);
        $vote= $subject->getVote();
        $vote = $vote+1;
        $subject->setVote($vote);
        $this->getDoctrine()->getManager()->flush();


        return $this->redirectToRoute('subject_index');
    }

    /**
     * @Route(path="/{id}/vote/down", methods={"GET"}, name="subject_down_vote")
     * @Template()
     */
    public function downVoteAction($id)
    {
        $subject= $this->getDoctrine()->getRepository(Subject::class)->find($id);
        $vote= $subject->getVote();
        $vote = $vote-1;
        $subject->setVote($vote);
        $this->getDoctrine()->getManager()->flush();


        return $this->redirectToRoute('subject_index');
    }

    /**
     * @Route(path="/{id}/delete", methods={"GET"}, name="delete_subject")
     * @Template()
     */
    public function deleteAction($id){
        $subject = $this->getDoctrine()->getRepository(Subject::class)->find($id);
        $short = $this->getDoctrine()->getManager();
        $short->remove($subject);
        $short->flush();

        return $this->redirectToRoute('subject_index');
    }
}