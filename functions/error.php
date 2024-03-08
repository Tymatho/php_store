<?php
require_once __DIR__ . '/../classes/errors/CategoryError.php';

function categoryErrorMessage(int $errorCode): string
{
    return match ($errorCode) {
        CategoryError::NAME_REQUIRED => "Le nom est obligatoire",
        default => "Une erreur est survenue"
    };
}