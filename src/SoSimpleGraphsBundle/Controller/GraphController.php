<?php

namespace SoSimpleGraphsBundle\Controller;

use SoSimpleGraphsBundle\Entity\Graph;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Graph controller.
 *
 */
class GraphController extends Controller
{
    /**
     * Lists all graph entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $graphs = $em->getRepository('SoSimpleGraphsBundle:Graph')->findAll();

        return $this->render('graph/index.html.twig', array(
            'graphs' => $graphs,
        ));
    }

    /**
     * Creates a new graph entity.
     *
     */
    public function newAction(Request $request)
    {
        $graph = new Graph();
        $form = $this->createForm('SoSimpleGraphsBundle\Form\GraphType', $graph);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($graph);
            $em->flush($graph);

            return $this->redirectToRoute('_show', array('id' => $graph->getId()));
        }

        return $this->render('graph/new.html.twig', array(
            'graph' => $graph,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a graph entity.
     *
     */
    public function showAction(Graph $graph)
    {
        $deleteForm = $this->createDeleteForm($graph);

        return $this->render('graph/show.html.twig', array(
            'graph' => $graph,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing graph entity.
     *
     */
    public function editAction(Request $request, Graph $graph)
    {
        $deleteForm = $this->createDeleteForm($graph);
        $editForm = $this->createForm('SoSimpleGraphsBundle\Form\GraphType', $graph);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('_edit', array('id' => $graph->getId()));
        }

        return $this->render('graph/edit.html.twig', array(
            'graph' => $graph,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a graph entity.
     *
     */
    public function deleteAction(Request $request, Graph $graph)
    {
        $form = $this->createDeleteForm($graph);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($graph);
            $em->flush($graph);
        }

        return $this->redirectToRoute('_index');
    }

    /**
     * Creates a form to delete a graph entity.
     *
     * @param Graph $graph The graph entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Graph $graph)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('_delete', array('id' => $graph->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
