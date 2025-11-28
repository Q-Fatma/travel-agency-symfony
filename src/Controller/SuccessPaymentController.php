<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SuccessPaymentController extends AbstractController
{
    #[Route('/success/payment', name: 'app_success_payment',methods: ['POST'])]
    public function successPayment(): Response
    {
        return $this->render('payment/success.html.twig', [
            'controller_name' => 'SuccessPaymentController',
        ]);
    }




 #[Route('/success/payment', name: 'app_success_payment', methods: ['GET'])]
    public function success(): Response
    {
        return $this->render('payment/success.html.twig', [
            'amountTotal' => 120,
            'orderId' => 'ORD123',
            'transactionId' => 'TX456',
            'amountIncentives' => 10,
            'amountBalance' => 50,
            'amountOnline' => 60,
        ]);
    }
}
