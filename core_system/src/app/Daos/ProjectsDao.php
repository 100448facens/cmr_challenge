<?php


namespace App\Daos;


use App\Models\Project;

/**
 * Class ProjectsDao
 * @package App\Daos
 */
class ProjectsDao
{
    public function allAtRepository($repoId)
    {
        return Project::where('repository_id', $repoId)->get();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Project::find($id);
    }

    /**
     * @param $projectID
     * @param $subjectID
     * @return mixed
     */
    public function findBySubject($projectID, $subjectID)
    {
        return Project::whereHas('subjects', function ($query) use ($subjectID) {
            $query->whereId($subjectID);
        })->whereId($projectID)
            ->first();
    }

    /**
     * @param $projectID
     * @param $repoID
     * @return mixed
     */
    public function findByRepository($projectID, $repoID)
    {
        return Project::whereHas('repository', function ($query) use ($repoID) {
            $query->whereId($repoID);
        })->whereId($projectID)->first();
    }

    public function findByIdAtRepository($projectID, $repoID)
    {
        return Project::join('repositories', 'repositories.id', 'projects.repository_id')
            ->select('projects.*')
            ->where('projects.id', $projectID)
            ->where('repositories.id', $repoID)
            ->first();
    }

}
