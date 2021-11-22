<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Http\Resources\SubjectResource;
use App\Http\Services\ProjectService;
use App\Http\Services\SubjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class ProjectController
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * @var ProjectService
     */
    protected $projectService;

    /**
     * ProjectController constructor.
     * @param ProjectService $projectService
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * @param $repositoryID
     * @return ProjectResource|\Illuminate\Http\JsonResponse
     */
    public function index($repositoryID)
    {
        try {
            $data = $this->projectService->getProjectsAtRepository($repositoryID);
            return new ProjectResource($data);
        } catch (\Exception | \Throwable $e) {
            Log::error($e);
            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * @param $repositoryID
     * @param $projectID
     * @return SubjectResource|\Illuminate\Http\JsonResponse
     */
    public function showSubjects($repositoryID, $projectID)
    {
        try {
            $data = $this->projectService->getSubjectsAtProjectOfRepository($projectID, $repositoryID);
            return new SubjectResource($data);
        } catch (\Exception | \Throwable $e) {
            Log::error($e);
            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * @param $repositoryID
     * @param $projectID
     * @param $subjectID
     * @return \Illuminate\Http\JsonResponse
     */
    public function assignProjectToSubject($repositoryID, $projectID, $subjectID): \Illuminate\Http\JsonResponse
    {
        try {
            $this->projectService->assignProjectToSubject($repositoryID, $projectID, $subjectID);
            return response()->json(['Project assigned to Subject successfully']);
        } catch (\Exception | \Throwable $e) {
            Log::error($e);
            return response()->json([$e->getMessage()], 500);
        }
    }
}
