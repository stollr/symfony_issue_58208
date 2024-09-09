<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;

enum EngineType: string {
    case Diesel = 'diesel';
    case Electric = 'electric';
    case Gasoline = 'gasoline';
}

readonly class CarFilterDto {
    public function __construct(
        public ?EngineType $engineType = null,
    ) {
    }
}

#[Route('/')]
class ReproducerController
{
    public function __invoke(#[MapQueryString] ?CarFilterDto $filter) {
        return new Response($filter?->engineType?->name);
    }
}
