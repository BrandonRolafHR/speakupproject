<?php
function getMuseums(): array
{
    return [
        [
            "id" => 1,
            "name" => "Rijksmuseum",
            "place" => "Amsterdam",
            "img" => "./images/rijks.jpg"
    ],
        [
            "id" => 2,
            "name" => "Van Gogh Museum",
            "place" => "Amsterdam",
            "img" => "./images/vanGogh.jpg"
        ],
        [
            "id" => 3,
            "name" => "Stedelijk Museum",
            "place" => "Amsterdam",
            "img" => "./images/stedelijk.jpg"
        ],
        [
            "id" => 4,
            "name" => "Maritiem Museum",
            "place" => "Rotterdam",
            "img" => "./images/maritiem.webp"
        ],
        [
            "id" => 5,
            "name" => "Openluchtmuseum",
            "place" => "Arnhem",
            "img" => "./images/openlucht.jpg"
        ],
        [
            "id" => 6,
            "name" => "Kunsthal",
            "place" => "Rotterdam",
            "img" => "./images/kunsthal.jpg"
        ],
        [
            "id" => 7,
            "name" => "Paleis het Loo",
            "place" => "Apeldoorn",
            "img" => "./images/hetloo.webp"
        ],
        [
            "id" => 8,
            "name" => "Naturalis",
            "place" => "Leiden",
            "img" => "./images/naturalis.jpg"
        ],
        [
            "id" => 9,
            "name" => "Nijntje Museum",
            "place" => "Utrecht",
            "img" => "./images/nijntje.webp"
        ],
        [
            "id" => 10,
            "name" => "Luchtvaartmuseum Aviodrome",
            "place" => "Lelystad",
            "img" => "./images/aviodrome.webp"
        ],
        [
            "id" => 11,
            "name" => "MORE museum",
            "place" => "Gorssel",
            "img" => "./images/more.jpg"
        ]
    ];
}

function getMuseumsDetails($id): array|false
{
    $tags = [
        1 => [
            "name" => "Rijksmuseum",
            "place" => "Amsterdam",
            "wheelchairs" => 5,
            "img" => "./images/rijks.jpg",
            "url" => "https://www.rijksmuseum.nl/nl"
        ],
        2 => [
            "name" => "Van Gogh Museum",
            "place" => "Amsterdam",
            "wheelchairs" => 4,
            "img" => "./images/vanGogh.jpg",
            "url" => "https://www.vangoghmuseum.nl/nl"
        ],
        3 => [
            "name" => "Stedelijk Museum",
            "place" => "Amsterdam",
            "wheelchairs" => 5,
            "img" => "./images/stedelijk.jpg",
            "url" => "https://www.stedelijk.nl/nl"
        ],
        4 => [
            "name" => "Maritiem Museum",
            "place" => "Rotterdam",
            "wheelchairs" => 3,
            "img" => "./images/maritiem.webp",
            "url" => "https://maritiemmuseum.nl"
        ],
        5 => [
            "name" => "Openluchtmuseum",
            "place" => "Arnhem",
            "wheelchairs" => 2,
            "img" => "./images/openlucht.jpg",
            "url" => "https://www.openluchtmuseum.nl"
        ],
        6 => [
            "name" => "Kunsthal",
            "place" => "Rotterdam",
            "wheelchairs" => 5,
            "img" => "./images/kunsthal.jpg",
            "url" => "https://www.kunsthal.nl"
        ],
        7 => [
            "name" => "Paleis het Loo",
            "place" => "Apeldoorn",
            "wheelchairs" => 3,
            "img" => "./images/hetloo.webp",
            "url" => "https://paleishetloo.nl/"
        ],
        8 => [
            "name" => "Naturalis",
            "place" => "Leiden",
            "wheelchairs" => 2,
            "img" => "./images/naturalis.jpg",
            "url" => "https://www.naturalis.nl"
        ],
        9 => [
            "name" => "Nijntje Museum",
            "place" => "Utrecht",
            "wheelchairs" => 5,
            "img" => "./images/nijntje.webp",
            "url" => "https://nijntjemuseum.nl/"
        ],
        10 => [
            "name" => "Luchtvaartmuseum Aviodrome",
            "place" => "Lelystad",
            "wheelchairs" => 4,
            "img" => "./images/aviodrome.webp",
            "url" => "https://www.aviodrome.nl/"
        ],
        11 => [
            "name" => "MORE museum",
            "place" => "Gorssel",
            "wheelchairs" => 2,
            "img" => "./images/more.jpg",
            "url" => "https://www.museummore.nl"
        ]
        ];
    return $tags[$id] ?? false;
}


if (isset($_GET['id'])) {
    $data = getMuseumsDetails($_GET['id']);
} else if (isset($_GET['name'])) {
    $museums = getMuseums();
    $data = array_values(array_filter($museums, function ($museum) {
        return stripos($museum['name'], $_GET['name']) !== false;
    }));
} else {
    $data = getMuseums();
}


//Set the header & output JSON so the client will know what to expect.
header("Content-Type: application/json");
echo $data !== false ? json_encode($data) : json_encode(['error' => 'Not found']);



