<?php


namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="SubjectResource",
 *     description="Subject resource",
 *     @OA\Xml(
 *         name="SubjectResource"
 *     )
 * )
 */
class SubjectResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Subject[]
     */
    private $data;
}
