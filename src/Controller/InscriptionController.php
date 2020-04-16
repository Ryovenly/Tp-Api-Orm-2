<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class InscriptionController extends AbstractBaseController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function create(Request $request, EntityManagerInterface $en) {
        $user = new User();
        $body = $request->getContent();
        $data = json_decode($body, true);

        $form = $this->createForm(UserType::class, $user);

        $form->submit($data);

        
        if ($form->isSubmitted() && $form->isValid()) {
            $en->persist($user);
            $en->flush();
            return $this->json($user, Response::HTTP_CREATED,
            [],

           [AbstractNormalizer::IGNORED_ATTRIBUTES => ["created", "visible"]]
        );
    }
        $errors = $this->getFormErrors($form);
        return $this->json(
          $errors,
          Response::HTTP_BAD_REQUEST
        );
  }
}
