<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\throwException;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(ContactRepository $contactRepo): Response
    {
        $contacts = $contactRepo->findBy([], ['lastname' => 'ASC', 'firstname' => 'ASC']);
        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts
        ]);
    }

    #[Route('/contact/{id}', name: 'app_contact_show', requirements: ['contactId' => '\d+'])]
    public function show(ContactRepository $contact, $id): Response
    {
        $Usercontact = $contact->findOneById($id);
        // $Usercontact = $contact->findOneBy(['id' => $id]);

        if ($Usercontact == null){
            throw new NotFoundHttpException("L'id n'est pas valide");
        }
        return $this->render('contact/show.html.twig', ['contact' => $Usercontact]);
    }
}
