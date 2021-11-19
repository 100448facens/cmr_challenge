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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subject(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Repository::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(): \Illuminate\Database\Eloquent\Relations\HasMany
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
        return mb_convert_case(strtolower($value));
//        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }
}
