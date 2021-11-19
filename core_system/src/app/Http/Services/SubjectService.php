<?php


namespace App\Http\Services;


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
     * SubjectService constructor.
     * @param RepositoriesDao $dao1
     * @param SubjectsDao $dao2
     */
    public function __construct(RepositoriesDao $dao1, SubjectsDao $dao2)
    {
        $this->repositoriesDao = $dao1;
        $this->subjectDao = $dao2;
    }

    public function getSubjectsFromRepository($id)
    {
        return $this->repositoriesDao->allByRepository($id);
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
        $s = new Subject();
        $s->name = $data['name'];

        $repo = $this->repositoriesDao->find($repoID);

        throw_if($repo == null, new \Exception('Repository not found'));

        return $repo->subject->save($s);
    }
}
