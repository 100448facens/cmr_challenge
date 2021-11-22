<?php


namespace App\Daos;


use App\Models\Repository;
use App\Models\Subject;

/**
 * Class RepositoriesDao
 * @package App\Daos
 */
class RepositoriesDao
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Repository::find($id);
    }

    /**
     * @return Repository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Repository::all();
    }
}
