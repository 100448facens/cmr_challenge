<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 *
 * Comment Type 1: Global
 * Provide the information about the whole project
 * an empty Controller which wouldn’t even be used anywhere
 *
 * @package App\Http\Controllers\Api
 */
class Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Laravel OpenApi Subjects Layer Documentation",
     *      description="Subjects Layer developed to Collective Minds Radiology",
     *      @OA\Contact(
     *          email="100448facens@gmail.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo API Server"
     * )

     *
     * @OA\Tag(
     *     name="Projects",
     *     description="API Endpoints of Subjects Layer"
     * )
     */
}
