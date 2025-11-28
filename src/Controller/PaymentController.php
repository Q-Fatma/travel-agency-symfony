<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PaymentController extends AbstractController
{
    #[Route('/payment', name: 'app_payment')]
    public function payment(): Response
    {
        // Show the payment page
        return $this->render('payment/payment.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }

    #[Route('/payment/confirm', name: 'app_payment_confirm', methods: ['POST'])]
    public function confirm(): Response
    {
        // You can process payment here if needed

        // Redirect to success page
        return $this->redirectToRoute('app_success_payment');
    }
}
