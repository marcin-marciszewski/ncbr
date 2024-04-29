<?php

namespace App\Controller;

use App\Service\GetWeatherDataService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WeatherController extends AbstractController
{
    #[Route('/pogoda/{town}', name: 'town_weather', methods: 'GET')]
    public function town(GetWeatherDataService $weatherService, string $town): Response
    {
        $townWeatherData = $weatherService->getWeatherDataForTown($town);

        return $this->render('weather/town.html.twig', $townWeatherData);
    }
}
