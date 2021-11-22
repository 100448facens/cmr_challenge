<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    /**
     * fillable fields
     * @var array
     */
    protected $fillable = ['name','repository_id'];

    /**
     * @return mixed
     */
    public function repository()
    {
        return $this->hasOne(Repository::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Mutators magic method
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * Mutators magic method
     * @param $value
     * @return string
     */
    public function getNameAttribute($value): string
    {
        return ucwords(mb_convert_case($value, MB_CASE_TITLE));
    }
}
