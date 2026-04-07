<?php
function getMuseums(): array
{
    return [
        [
            "id" => 1,
            "name" => "Rijksmuseum",
            "place" => "Amsterdam",
            "wheelchairs" => 5,
            "img" => "./images/rijks.jpg",
            "url" => "https://www.rijksmuseum.nl/nl"
    ],
        [
            "id" => 2,
            "name" => "Van Gogh Museum",
            "place" => "Amsterdam",
            "wheelchairs" => 4,
            "img" => "./images/vanGogh.jpg",
            "url" => "https://www.vangoghmuseum.nl/nl"
        ],
        [
            "id" => 3,
            "name" => "Stedelijk Museum",
            "place" => "Amsterdam",
            "wheelchairs" => 5,
            "img" => "./images/stedelijk.jpg",
            "url" => "https://www.stedelijk.nl/nl"
        ],
        [
            "id" => 4,
            "name" => "Maritiem Museum",
            "place" => "Rotterdam",
            "wheelchairs" => 3,
            "img" => "./images/maritiem.webp",
            "url" => "https://maritiemmuseum.nl"
        ],
        [
            "id" => 5,
            "name" => "Openluchtmuseum",
            "place" => "Arnhem",
            "wheelchairs" => 2,
            "img" => "./images/openlucht.jpg",
            "url" => "https://www.openluchtmuseum.nl"
        ],
        [
            "id" => 6,
            "name" => "Kunsthal",
            "place" => "Rotterdam",
            "wheelchairs" => 5,
            "img" => "./images/kunsthal.jpg",
            "url" => "https://www.kunsthal.nl"
        ],
        [
            "id" => 7,
            "name" => "Paleis het Loo",
            "place" => "Apeldoorn",
            "wheelchairs" => 3,
            "img" => "./images/hetloo.webp",
            "url" => "https://paleishetloo.nl/"
        ],
        [
            "id" => 8,
            "name" => "Naturalis",
            "place" => "Leiden",
            "wheelchairs" => 2,
            "img" => "./images/naturalis.jpg",
            "url" => "https://www.naturalis.nl"
        ],
        [
            "id" => 9,
            "name" => "Nijntje Museum",
            "place" => "Utrecht",
            "wheelchairs" => 5,
            "img" => "./images/nijntje.webp",
            "url" => "https://nijntjemuseum.nl/"
        ],
        [
            "id" => 10,
            "name" => "Luchtvaartmuseum Aviodrome",
            "place" => "Lelystad",
            "wheelchairs" => 4,
            "img" => "./images/aviodrome.webp",
            "url" => "https://www.aviodrome.nl/"
        ],
        [
            "id" => 11,
            "name" => "MORE museum",
            "place" => "Gorssel",
            "wheelchairs" => 2,
            "img" => "./images/more.jpg",
            "url" => "https://www.museummore.nl"
        ]
    ];
}

$data = getMuseums();

header("Content-Type: application/json");
echo $data !== false ? json_encode($data) : json_encode(['error' => 'Not found']);


