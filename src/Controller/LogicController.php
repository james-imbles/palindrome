<?php

namespace App\Controller;

use App\Services\Checker;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LogicController extends AbstractController
{
    #[Route('/logic', name: 'app_logic')]
    public function compute(Request $request, Checker $checker)
    {
        return new JsonResponse([
            "code" => "200", 
            "result" => $checker($request->toArray())
        ]);
    }
}
