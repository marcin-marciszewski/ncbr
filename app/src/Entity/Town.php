<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Town
{
    #[SerializedName('id_stacji')]
    private ?string $station_id = null;

    #[SerializedName('stacja')]
    private ?string $station_name = null;

    #[SerializedName('data_pomiaru')]
    private ?string $reading_date = null;

    #[SerializedName('godzina_pomiaru')]
    private ?string $reading_hour = null;

    #[SerializedName('temperatura')]
    private ?string $temperature = null;

    #[SerializedName('predkosc_wiatru')]
    private ?string $wind_speed = null;

    #[SerializedName('kierunek_wiatru')]
    private ?string $wind_direction = null;

    #[SerializedName('wilgotnosc_wzgledna')]
    private ?string $humidity = null;

    #[SerializedName('suma_opadu')]
    private ?string $precipitation_sum = null;

    #[SerializedName('cisnienie')]
    private ?string $pressure = null;

    public function getStationId(): ?string
    {
        return $this->station_id;
    }

    public function setStationId(?string $station_id): static
    {
        $this->station_id = $station_id;

        return $this;
    }

    public function getStationName(): ?string
    {
        return $this->station_name;
    }

    public function setStationName(?string $station_name): static
    {
        $this->station_name = $station_name;

        return $this;
    }

    public function getReadingDate(): ?string
    {
        return $this->reading_date;
    }

    public function setReadingDate(?string $reading_date): static
    {
        $this->reading_date = $reading_date;

        return $this;
    }

    public function getReadingHour(): ?string
    {
        return $this->reading_hour;
    }

    public function setReadingHour(?string $reading_hour): static
    {
        $this->reading_hour = $reading_hour;

        return $this;
    }

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(?string $temperature): static
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getWindSpeed(): ?string
    {
        return $this->wind_speed;
    }

    public function setWindSpeed(?string $wind_speed): static
    {
        $this->wind_speed = $wind_speed;

        return $this;
    }

    public function getWindDirection(): ?string
    {
        return $this->wind_direction;
    }

    public function setWindDirection(?string $wind_direction): static
    {
        $this->wind_direction = $wind_direction;

        return $this;
    }

    public function getHumidity(): ?string
    {
        return $this->humidity;
    }

    public function setHumidity(?string $humidity): static
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getPrecipitationSum(): ?string
    {
        return $this->precipitation_sum;
    }

    public function setPrecipitationSum(?string $precipitation_sum): static
    {
        $this->precipitation_sum = $precipitation_sum;

        return $this;
    }

    public function getPressure(): ?string
    {
        return $this->pressure;
    }

    public function setPressure(?string $pressure): static
    {
        $this->pressure = $pressure;

        return $this;
    }
}
