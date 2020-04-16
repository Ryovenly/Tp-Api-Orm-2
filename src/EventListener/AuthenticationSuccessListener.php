<?php

namespace App\EventListener;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class AuthenticationSuccessListener{

private $em;

public function __construct(EntityManagerInterface $em)
{
    $this->em = $em;
}

/**
 * @param AuthenticationSuccessEvent $event
 */
public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
{
    $data = $event->getData();
    $user = $event->getUser();

    if (!$user instanceof User) {
        return;
    }

    $user->setLastConnection(new DateTime());
    $this->em->flush();

    $data['data'] = array(
        'roles' => $user->getRoles(),
    );

    $event->setData($data);
}
}