<?php

use App\Enum\MapTileEnum;

return [
    'codyfighters' => [
        '1' => env('CODYFIGHTER_CKEY_1'),
        '2' => env('CODYFIGHTER_CKEY_2'),
        '3' => env('CODYFIGHTER_CKEY_3'),
    ],
    'api' => [
    ],
    'map' => [
        'tiles' => [
            'walkable' => [
                MapTileEnum::EXIT,
                MapTileEnum::BLANK,
                MapTileEnum::DEATH_PIT,
                MapTileEnum::ENERGY_REGEN,
                MapTileEnum::ARMOR_REGEN,
                MapTileEnum::HP_REGEN,
                MapTileEnum::TELEPORTER,
                MapTileEnum::UP_SLIDER,
                MapTileEnum::DOWN_SLIDER,
                MapTileEnum::LEFT_SLIDER,
                MapTileEnum::RIGHT_SLIDER,
            ],
        ],
    ],
];
