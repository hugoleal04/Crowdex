<?php

namespace App\Services;

class LastFmService
{
    private string $apiKey;

    public function __construct()
    {
        $this->apiKey = $_ENV["LASTFM_API_KEY"];
    }
    public function searchArtists(string $query): array
    {
        $url =
            "https://ws.audioscrobbler.com/2.0/?" .
            http_build_query([
                "method" => "artist.search",
                "artist" => $query,
                "api_key" => $this->apiKey,
                "format" => "json",
                "limit" => 12
            ]);

        $json = file_get_contents($url);

        if ($json === false) {
            return [];
        }

        $data = json_decode($json, true);

        return $data["results"]["artistmatches"]["artist"] ?? [];
    }
}
