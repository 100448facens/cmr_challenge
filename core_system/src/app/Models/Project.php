<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'projects';

    /**
     * fillable fields
     *
     * @var string[]
     */
    protected $fillable = ['name', 'subject_id', 'repository_id'];


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function repository(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Repository::class);
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
