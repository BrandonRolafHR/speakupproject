<?php
function getMuseums(): array
{
    return [
        [
            "id" => 1,
            "name" => "Rijksmuseum",
            "wheelchairs" => 5,
            "img" => "./images/rijks.jpg"
    ],
        [
            "id" => 2,
            "name" => "Van Gogh Museum",
            "wheelchairs" => 4,
            "img" => "./images/vanGogh.jpg"
        ],
        [
            "id" => 3,
            "name" => "Stedelijk Museum",
            "wheelchairs" => 5,
            "img" => "./images/stedelijk.jpg"
        ],
        [
            "id" => 4,
            "name" => "Maritiem Museum",
            "wheelchairs" => 3,
            "img" => "./images/maritiem.webp"
        ]
    ];
}

$data = getMuseums();

//Set the header & output JSON so the client will know what to expect.
header("Content-Type: application/json");
echo $data !== false ? json_encode($data) : json_encode(['error' => 'Not found']);


