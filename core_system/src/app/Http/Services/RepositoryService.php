<?php


namespace App\Http\Services;


class RepositoryService
{

    protected $repositoryDao;
    protected $subjectDao;
    protected $projectDao;

    public function __construct($repositoryDao, $projectDao, $subjectDao)
    {
        $this->repositoryDao = $repositoryDao;
        $this->projectDao = $projectDao;
        $this->subjectDao = $subjectDao;
    }
}
