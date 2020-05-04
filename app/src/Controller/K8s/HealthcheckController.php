<?php

namespace App\Controller\K8s;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HealthcheckController
{
    /**
     * @Route("/healthcheck/readiness-probe", name="app_healthcheck_readness_probe")
     *
     * @return Response
     */
    public function getReadinessProbe()
    {
        return new Response('Ok');
    }
}
