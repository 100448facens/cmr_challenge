<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubjectController extends Controller
{
    /**
     * @OA\Get(
     *      path="/subject",
     *      operationId="getSubjectList",
     *      tags={"Subject"},
     *      summary="Get list of subjects",
     *      description="Returns list of subjects",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SubjectResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        $repoID = 1;
        $response = Http::get(env('CORE_API_HOST') . '/repositories/' . $repoID . '/subjects');

        return $response->json();
    }

    /**
     * @OA\Post(
     *      path="/subject/store",
     *      operationId="storeSubject",
     *      tags={"Subject"},
     *      summary="Store new subject",
     *      description="Returns subject data",
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
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(Request $request): array
    {
        $repoID = $request->get('repository');
        $response = Http::put(env('CORE_API_HOST') . '/repositories/' . $repoID . '/subjects', $request->all());

        return $response->json();
    }

    /**
     * @OA\Get(
     *      path="/subject/{id}",
     *      operationId="getSubjectById",
     *      tags={"Subject"},
     *      summary="Get subject information",
     *      description="Returns subject data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Subject id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
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
     *      )
     * )
     */
    public function show($id)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/subject/{id}",
     *      operationId="updateSubject",
     *      tags={"Subject"},
     *      summary="Update existing subject",
     *      description="Returns updated subject data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Subject id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateSubjectRequest")
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
     */
    public function update(Request $request, int $id): array
    {
        $repoID = 1;
        $response = Http::post(env('CORE_API_HOST') . '/repositories/' . $repoID . '/subjects/' . $id, $request->data());

        return $response->json();
    }

    /**
     * @OA\Delete(
     *      path="/subject/{id}",
     *      operationId="deleteSubject",
     *      tags={"ProjectSubject"},
     *      summary="Delete existing subject",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Subject id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
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
     */
    public function destroy(int $id): array
    {
        $repoID = 1;
        $response = Http::delete(env('CORE_API_HOST') . '/repositories/' . $repoID . '/subjects/' . $id);

        return $response->json();
    }
}
