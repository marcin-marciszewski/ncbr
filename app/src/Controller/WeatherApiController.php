<?php

namespace App\Controller;

use App\Service\GetWeatherDataService;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api', name: 'api_')]
class WeatherApiController extends AbstractController
{
    public function __construct(private GetWeatherDataService $weatherService)
    {
    }

    #[Route('/pogoda/{town}', name: 'town_weather')]
    public function town(string $town): JsonResponse
    {
        $townWeatherData = $this->weatherService->getWeatherDataForTown($town);

        return $this->json($townWeatherData);
    }

    #[Route('/pogoda/{town}/full', name: 'town_weather_full')]
    public function townFull(string $town): JsonResponse
    {
        $townWeatherData = $this->weatherService->getWeatherDataForTown($town, full:true);

        return new JsonResponse(json_decode($townWeatherData));
    }
}
