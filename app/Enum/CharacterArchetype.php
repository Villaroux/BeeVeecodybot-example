<?php

namespace App\Enum;


enum CharacterArchetype: string
{
    case ENGI = 'Engineer';
    case SAPPER = 'Sapper';
    case BRUTE = 'Brute';
    case HUNTER = 'Hunter';
    case GUARDIAN = 'Guardian';
    case TRICKSTER = 'Trickster';
    case SCOUT = 'Scout';
    case NOINIT = 'Not initialized';
}
