<?php


namespace App\Http\Services;


use App\Daos\ProjectsDao;
use App\Daos\RepositoriesDao;
use App\Daos\SubjectsDao;
use App\Models\Subject;
use Illuminate\Support\Facades\Log;

/**
 * Class SubjectService
 * @package App\Http\Services
 */
class ProjectService
{
    /**
     * @var SubjectsDao
     */
    protected $subjectDao;
    /**
     * @var ProjectsDao
     */
    protected $projectsDao;

    protected $repositoriesDao;

    /**
     * SubjectService constructor.
     * @param ProjectsDao $projectDao
     * @param SubjectsDao $subjectDao
     * @param RepositoriesDao $repositoryDao
     */
    public function __construct(ProjectsDao $projectDao, SubjectsDao $subjectDao, RepositoriesDao $repositoryDao)
    {
        $this->projectsDao = $projectDao;
        $this->subjectDao = $subjectDao;
        $this->repositoriesDao = $repositoryDao;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProjectsAtRepository($id)
    {
        return $this->projectsDao->allAtRepository($id);
    }

    /**
     * @param $projectID
     * @param $repositoryID
     */
    public function getSubjectsAtProjectOfRepository($projectID, $repositoryID)
    {
        $project = $this->projectsDao->findByIdAtRepository($projectID, $repositoryID);
        throw_if($project == null, new \Exception('Project not found in the repository'));

        return $project->subject;
    }

    /**
     * @param $repositoryID
     * @param $projectID
     * @param $subjectID
     * @throws \Throwable
     */
    public function assignProjectToSubject($repositoryID, $projectID, $subjectID)
    {
        $project = $this->projectsDao->findByIdAtRepository($projectID, $repositoryID);
        throw_if($project == null, new \Exception('Project not found in the repository'));

        $repo = $this->repositoriesDao->find($repositoryID);
        throw_if($repo == null, new \Exception('Repository not found'));

        $subject = $this->subjectDao->find($subjectID);
        throw_if($subject == null, new \Exception('Subject not found'));

        $hasSubjectAtProject = $subject->projects()->where('id', $project->id)->count();
//        $hasSubjectAtProject = $subject->projects;
        throw_if($hasSubjectAtProject, new \Exception('Project already assigned to subject'));

        $project->subject_id = $subject->id;
        throw_if(!$project->update(), new \Exception('Error updating project'));
    }
}
