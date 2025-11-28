<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\TripDay;

class DestinationController extends AbstractController
{
    // Page description de chaque destination
    #[Route('/description/{destination}', name: 'app_description')]
    public function show(string $destination, ManagerRegistry $doctrine): Response
    {
        // Récupérer tous les jours du voyage pour la destination
        $tripDays = $doctrine->getRepository(TripDay::class)
            ->findBy(
                ['destination' => $destination],
                ['dayNumber' => 'ASC']
            );

        if (!$tripDays) {
            throw $this->createNotFoundException('Cette destination n’existe pas.');
        }

        // Récupérer le prix à partir du premier jour
        $price = $tripDays[0]->getPrice();

        return $this->render('home/description.html.twig', [
            'destination' => $destination,
            'tripDays' => $tripDays,
            'price' => $price,
        ]);
    }

    // Page paiement pour une destination
    #[Route('/payment/{destination}', name: 'payment_page')]
    public function payment(string $destination, ManagerRegistry $doctrine): Response
    {
        $tripDays = $doctrine->getRepository(TripDay::class)
            ->findBy(['destination' => $destination]);

        if (!$tripDays) {
            throw $this->createNotFoundException('Cette destination n’existe pas.');
        }

        $price = $tripDays[0]->getPrice();

        return $this->render('home/payment.html.twig', [
            'destination' => $destination,
            'price' => $price,
        ]);
    }
}
