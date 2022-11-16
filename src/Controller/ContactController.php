<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request,ContactRepository $contactRepo): Response
    {
        $search = $request->query->get('search','');
        $contacts = $contactRepo->search($search);

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    #[Route('/contact/{id}', name: 'app_contact_show', requirements: ['contactId' => '\d+'])]
    #[ParamConverter('contact', options: ['mapping' => ['id' => 'id']])]
    public function show(Contact $contact)
    {
        $error = null;

        return $this->render('contact/show.html.twig', ['contact' => $contact, 'error' => $error]);
    }
}
