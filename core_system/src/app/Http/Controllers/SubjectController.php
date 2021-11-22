<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Http\Resources\SubjectResource;
use App\Http\Services\SubjectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{

    /**
     * @var SubjectService
     */
    protected $subjectService;

    public function __construct(SubjectService $s1)
    {
        $this->subjectService = $s1;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $repositoryID
     *
     * @return SubjectResource|JsonResponse
     */
    public function index($repositoryID)
    {
        try {
            $data = $this->subjectService->getSubjectsAtRepository($repositoryID);
            return new SubjectResource($data);

        } catch (\Exception | \Throwable $e) {
            Log::error($e);
            return response()->json($e->getMessage(), 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $repositoryID
     *
     * @return JsonResponse
     */
    public function store(Request $request, $repositoryID): JsonResponse
    {
        Log::info($request->all());
        try {

            $this->subjectService->storeSubjectAtRepository($repositoryID, $request->all());

            return response()->json(['Subject stored']);

        } catch (\Exception | \Throwable $e) {
            Log::error($e);
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @param $repositoryID
     * @param $subjectID
     * @return ProjectResource|JsonResponse
     */
    public function showProjects($repositoryID, $subjectID)
    {
        try {
            $data = $this->subjectService->getProjectsAtSubjectOfRepository($subjectID, $repositoryID);
            return new ProjectResource($data);
        } catch (\Exception | \Throwable $e) {
            Log::error($e);
            return response()->json([$e->getMessage()], 500);
        }
    }

}
