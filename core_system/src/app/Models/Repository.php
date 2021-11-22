<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $table = 'repositories';

    /**
     * fillable fields
     *
     * @var string[]
     */
    protected $fillable = ['name'];

    /**
     * @return mixed
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    /**
     * @return mixed
     */
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
