<?php

namespace Sim\StoryTellerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sim\StoryTellerBundle\Entity\Story;
use Sim\StoryTellerBundle\Form\StoryType;

/**
 * Story controller.
 *
 * @Route("/Story")
 */
class StoryController extends Controller
{

    /**
     * Lists all Story entities.
     *
     * @return array
     * @Route("/", name="Story")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SimStoryTellerBundle:Story')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Story entity.
     *
     * @Route("/", name="Story_create")
     * @Method("POST")
     * @Template("SimStoryTellerBundle:Story:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Story();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Story_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Story entity.
     *
     * @param Story $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Story $entity)
    {
        $form = $this->createForm(new StoryType(), $entity, array(
            'action' => $this->generateUrl('Story_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Story entity.
     *
     * @Route("/new", name="Story_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Story();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Story entity.
     *
     * @Route("/{id}", name="Story_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SimStoryTellerBundle:Story')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Story entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Story entity.
     *
     * @Route("/{id}/edit", name="Story_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SimStoryTellerBundle:Story')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Story entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Story entity.
    *
    * @param Story $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Story $entity)
    {
        $form = $this->createForm(new StoryType(), $entity, array(
            'action' => $this->generateUrl('Story_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Story entity.
     *
     * @Route("/{id}", name="Story_update")
     * @Method("PUT")
     * @Template("SimStoryTellerBundle:Story:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SimStoryTellerBundle:Story')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Story entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Story_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Story entity.
     *
     * @Route("/{id}", name="Story_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SimStoryTellerBundle:Story')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Story entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Story'));
    }

    /**
     * Creates a form to delete a Story entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Story_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
