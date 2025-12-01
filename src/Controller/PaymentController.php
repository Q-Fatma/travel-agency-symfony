<?php

namespace App\Controller;

use App\Entity\SuccessPayment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class PaymentController extends AbstractController
{
    #[Route('/payment', name: 'app_payment')]
    public function payment(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            // Create a new SuccessPayment entity
            $payment = new SuccessPayment();

            // Get form data
            $payment->setOrderId($request->request->get('orderId', 'ORD'.rand(100,999)));
            $payment->setTransactionId('TXN'.rand(1000,9999));
            $payment->setAmountTotal((float)$request->request->get('amountTotal', 0));
            $payment->setAmountIncentives((float)$request->request->get('amountIncentives', 0));
            $payment->setAmountBalance((float)$request->request->get('amountBalance', 0));
            $payment->setAmountOnline((float)$request->request->get('amountOnline', 0));
            $payment->setStatus('Success');

            // Save to database
            $em->persist($payment);
            $em->flush();

            // Redirect to success payment page
            return $this->redirectToRoute('app_success_payment');
        }

        return $this->render('payment/payment.html.twig');
    }
}

