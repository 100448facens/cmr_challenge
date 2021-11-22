<?php


namespace App\Daos;

use App\Models\Subject;

/**
 * Class SubjectsDao
 * @package App\Daos
 */
class SubjectsDao
{
    /**
     * @param $repoId
     * @return mixed
     */
    public function allAtRepository($repoId)
    {
        return Subject::where('repository_id', $repoId)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Subject::find($id);
    }

    /**
     * @param $subjectID
     * @param $projectID
     * @return mixed
     */
    public function findAtProject($subjectID, $projectID)
    {
        return Subject::whereHas('projects', function ($query) use ($projectID) {
            $query->wherId($projectID);
        })->whereId($subjectID)->first();
    }

    /**
     * @param $subjectName
     * @param $projectID
     * @return mixed
     */
    public function findByNameAtProject($subjectName, $projectID)
    {
//        return Subject::whereHas('projects', function ($query) use ($projectID) {
//            $query->whereId($projectID);
//        })->whereName($subjectName)->first();
        return Subject::join('projects', 'projects.subject_id', 'subjects.id')
            ->select('subjects.*')
            ->where('subjects.name', $subjectName)
            ->where('projects.id', $projectID)
            ->first();
    }

    /**
     * @param $subjectName
     * @param $repoID
     * @return mixed
     */
    public function findByNameAtRepository($subjectName, $repoID)
    {
        return Subject::join('repositories', 'repositories.id', 'subjects.repository_id')
            ->select('subjects.*')
            ->where('subjects.name', $subjectName)
            ->where('repositories.id', $repoID)
            ->first();
    }

    public function findByIdAtRepository($subjectId, $repoID)
    {
        return Subject::join('repositories', 'repositories.id', 'subjects.repository_id')
            ->select('subjects.*')
            ->where('subjects.id', $subjectId)
            ->where('repositories.id', $repoID)
            ->first();
    }
}
