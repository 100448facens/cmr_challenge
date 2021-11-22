<?php


namespace App\Http\Services;


use App\Daos\ProjectsDao;
use App\Daos\RepositoriesDao;
use App\Daos\SubjectsDao;
use App\Models\Subject;

/**
 * Class SubjectService
 * @package App\Http\Services
 */
class SubjectService
{
    /**
     * @var RepositoriesDao
     */
    protected $repositoriesDao;
    /**
     * @var SubjectsDao
     */
    protected $subjectDao;
    /**
     * @var ProjectsDao
     */
    protected $projectsDao;

    /**
     * SubjectService constructor.
     * @param RepositoriesDao $dao1
     * @param ProjectsDao $dao2
     * @param SubjectsDao $dao3
     */
    public function __construct(RepositoriesDao $dao1, ProjectsDao $dao2, SubjectsDao $dao3)
    {
        $this->repositoriesDao = $dao1;
        $this->projectsDao = $dao2;
        $this->subjectDao = $dao3;
    }

    /**
     * @param $repoID
     * @param $data
     *
     * @return mixed
     *
     * @throws \Throwable
     */
    public function storeSubjectAtRepository($repoID, $data)
    {
        $name = $data['name'];

        $subject = $this->subjectDao->findByNameAtRepository($name, $repoID);
        throw_if($subject != null, new \Exception('Subject already exist in the repository'));

        $repo = $this->repositoriesDao->find($repoID);
        throw_if($repo == null, new \Exception('Repository not found'));

        $s = new Subject();
        $s->name = $name;

        return $repo->subjects()->save($s);
    }

    /**
     * @param $projectID
     * @param $data
     * @return mixed
     * @throws \Throwable
     */
    public function storeSubjectAtProject($projectID, $data)
    {
        $name = $data['name'];

        $subject = $this->subjectDao->findByNameAtProject($name, $projectID);
        throw_if($subject != null, new \Exception('Subject already exist at project'));

        $project = $this->projectsDao->find($projectID);
        throw_if($project == null, new \Exception('Project not found'));

        $s = new Subject();
        $s->name = $name;

        return $project->subjects->save($s);
    }

    /**
     * @param $projectID
     * @param $subjectID
     * @param $data
     * @return mixed
     * @throws \Throwable
     */
    public function updateSubjectAtProject($projectID, $subjectID, $data)
    {
        $subject = $this->subjectDao->findAtProject($subjectID, $projectID);

        throw_if($subject == null, new \Exception('Subject not found at project'));

        $subject->name = $data['name'];

        return $subject->update();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSubjectsAtRepository($id)
    {
        return $this->subjectDao->allAtRepository($id);
    }

    public function getProjectsAtSubjectOfRepository($subjectID, $repositoryID)
    {
        $subject = $this->subjectDao->findByIdAtRepository($subjectID, $repositoryID);
        throw_if($subject == null, new \Exception('Subject not found'));

        return $subject->projects;
    }
}
