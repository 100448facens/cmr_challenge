<?php


namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Update Subject request",
 *      description="Update Subject request body data",
 *      type="object",
 *      required={"id", "name"}
 * )
 */
class UpdateSubjectRequest
{
    /**
     * @OA\Property(
     *      title="id",
     *      description="Subject's id to update",
     *      example="1"
     * )
     *
     * @var int
     */
    public $id;

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
