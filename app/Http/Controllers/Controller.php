<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * @OA\Info(title="Posts API", version="0.1")
 */

/**
 *  * @OA\Get(
 *     path="/posts/{$id}",
 *     description="Get a posts",
 *     @OA\Response(response="200", description="Get a posts successfully !")
 * )
 * 
 * @OA\Get(
 *     path="/posts",
 *     description="Get a list of posts",
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Page number",
 *         required=false,
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Parameter(
 *         name="limit",
 *         in="query",
 *         description="Number of items per page",
 *         required=false,
 *         @OA\Schema(type="integer", default=2)
 *     ),
 *     @OA\Response(response="200", description="Get posts successfully !")
 * )
 * 
 * @OA\Post(
 *     path="/posts",
 *     description="Create a new posts",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Data of the new posts",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(property="author_id", type="number"),
 *                 @OA\Property(property="title", type="string"),
 *                 @OA\Property(property="content", type="string"),
 *                 @OA\Property(property="media", type="array", @OA\Items(type="string")),
 *                 @OA\Property(property="tag", type="array" , @OA\Items(type="string")),
 *                 @OA\Property(property="category_id", type="string"),
 *                 @OA\Property(property="created_at", type="string", format="date-time"),
 * 
 *             )
 *         )
 *     ),
 *     @OA\Response(response="200", description="Create posts successfully !"),
 *     @OA\Response(response="401", description="There was an error during creation !")
 * )
 * 
 *  * @OA\Put(
 *     path="/posts/{$id}",
 *     description="Update a posts",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Data of the new posts update",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(property="author_id", type="number"),
 *                 @OA\Property(property="title", type="string"),
 *                 @OA\Property(property="content", type="string"),
 *                 @OA\Property(property="media", type="array", @OA\Items(type="string")),
 *                 @OA\Property(property="tag", type="array" , @OA\Items(type="string")),
 *                 @OA\Property(property="category_id", type="string"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time"),
 * 
 *             )
 *         )
 *     ),
 *     @OA\Response(response="200", description="Update posts successfully !"),
 *     @OA\Response(response="401", description="There was an error during the update process !")
 * )
 */


class Controller extends BaseController
{
}
