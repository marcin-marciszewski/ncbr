<?php

namespace App\Service;

use App\Entity\Town;
use App\Exceptions\ValidationException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GetWeatherDataService
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator
    ) {
    }

    public function getWeatherDataForTown(string $town, $full = false): array|string
    {
        $apiResponse = $this->getData($town);
        $weatherData = $this->serializer->deserialize($apiResponse, Town::class, 'json');

        $basicWeatherData = [
            "stacja" => $weatherData->getStationName(),
            "data_pomiaru" => $weatherData->getReadingDate(),
            "godzina_pomiaru" => $weatherData?->getReadingHour(),
            "temperatura" => $weatherData?->getTemperature()
        ];

        return $full ? $apiResponse : $basicWeatherData;
    }

    private function getData(string $town): string
    {
        $url = 'https://danepubliczne.imgw.pl/api/data/synop/station/'. $town;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);


        if ($httpStatus != 200) {
            $decodedMsg = json_decode($response)->message;
            throw new ValidationException($decodedMsg ?: 'Request failed with status code '. $httpStatus);
        }

        curl_close($ch);

        return $response;
    }
}
