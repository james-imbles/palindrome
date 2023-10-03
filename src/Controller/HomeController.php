<?php

namespace App\Controller;

use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(InertiaInterface $inertia)
    {
        return $inertia->render('Home', ['placeholders' => [
            'palindrome' => ['Won’t lovers revolt now?'],
            'anagram' => ['conversation', 'voices rant on'],
            'pangram' => ['Sphinx of black quartz, judge my vow.']
        ]]);
    }
}
