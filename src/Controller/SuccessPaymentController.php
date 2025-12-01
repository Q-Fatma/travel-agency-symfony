<?php

namespace App\Controller;
use App\Repository\SuccessPaymentRepository; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SuccessPaymentController extends AbstractController
{
    #[Route('/success/payment', name: 'app_success_payment')]
    public function successPayment(SuccessPaymentRepository $successPaymentRepository): Response
    {
           $payments = $successPaymentRepository->findAll();

        return $this->render('payment/success.html.twig', [
            'payment' => $payment, // Pass to Twig
        ]);
    }

}
