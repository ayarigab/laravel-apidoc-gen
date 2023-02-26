<?php

namespace Ayarigab\ApiDoc\Extracting\Strategies\RequestHeaders;

use Illuminate\Routing\Route;
use Ayarigab\ApiDoc\Extracting\Strategies\Strategy;
use ReflectionClass;
use ReflectionMethod;

class GetFromRouteRules extends Strategy
{
    public function __invoke(Route $route, ReflectionClass $controller, ReflectionMethod $method, array $routeRules, array $context = [])
    {
        return $routeRules['headers'] ?? [];
    }
}
