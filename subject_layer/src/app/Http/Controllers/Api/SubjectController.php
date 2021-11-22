<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    /**
     * @OA\Get(
     *      path="/repositories/{repositoryID}/subjects",
     *      operationId="getSubjectList",
     *      tags={"Subject"},
     *      summary="Get list of subjects",
     *      description="Returns list of subjects",
     *      @OA\Parameter(
     *          name="repositoryID",
     *          description="Repository id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SubjectResource")
     *       ),
     *     )
     */
    public function index($repositoryID)
    {
        $route = env('CORE_API_HOST') . '/repositories/' . $repositoryID . '/subjects';
        $response = Http::get($route);

        return $response->json();
    }

    /**
     * @OA\Post(
     *      path="/repositories/{repositoryID}/subjects",
     *      operationId="storeSubject",
     *      tags={"Subject"},
     *      summary="Create new subject",
     *      description="Returns subject data",
     *      @OA\Parameter(
     *          name="repositoryID",
     *          description="Repository id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreSubjectRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Subject")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     * )
     */
    public function store(Request $request, $repositoryID)
    {
        Log::info($request->all());
        $response = Http::post(env('CORE_API_HOST') . '/repositories/' . $repositoryID . '/subjects', $request->all());

        return $response->json();
    }

    /**
     * @OA\Post(
     *      path="/repositories/{repositoryID}/projects/{projectID}/subjects/{subjectID}",
     *      operationId="assignProjectToSubject",
     *      tags={"Subject"},
     *      summary="Assign a Project to Subject",
     *      description="Returns updated subject data",
     *      @OA\Parameter(
     *          name="repositoryID",
     *          description="Repository id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="projectID",
     *          description="Project id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="subjectID",
     *          description="New Subject id to assigne at Project",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Subject")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     *
     * @param $repositoryID
     * @param $projectID
     * @param $subjectID
     * @return array|mixed
     */
    public function update($repositoryID, $projectID, $subjectID)
    {
        $route = env('CORE_API_HOST') . '/' . $repositoryID . '/projects/' . $projectID . '/subjects/' . $subjectID;
        $response = Http::post($route);

        return $response->json();
    }


    /**
     * @OA\Get(
     *      path="/repositories/{repositoryID}/projects/{projectID}/subjects",
     *      operationId="listSubjectByProject",
     *      tags={"Subject"},
     *      summary="List subject by project at repository",
     *      description="Returns subject data",
     *      @OA\Parameter(
     *          name="repositoryID",
     *          description="Repository id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="projectID",
     *          description="Project id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SubjectResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     * )
     */
    public function showSubjects($repositoryID, $projectID)
    {
        $route = env('CORE_API_HOST') . ' / repositories / ' . $repositoryID . ' / projects / ' . $projectID . ' / subjects';
        $response = Http::get($route);

        return $response->json();
    }
}
