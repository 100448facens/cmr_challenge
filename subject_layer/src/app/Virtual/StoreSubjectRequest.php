<?php


namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Subject request",
 *      description="Store Subject request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreSubjectRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new subject",
     *      example="A nice project"
     * )
     *
     * @var string
     */
    public $name;
}
