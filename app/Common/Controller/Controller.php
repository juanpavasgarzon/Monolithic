<?php

namespace App\Common\Controller;

/**
 * @OA\Info (version="1.0.0", title="Monolotic API Rest Full")
 *
 * @OA\Server (url="http://127.0.0.1:80")
 *
 * @OA\SecurityScheme(
 *  securityScheme="bearerAuth",
 *  type="apiKey",
 *  in="header",
 *  name="Authorization",
 *  description="Use Bearer token for authentication (e.g., Bearer YOUR_TOKEN)"
 * )
 */
abstract class Controller
{

}
