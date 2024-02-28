<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CategoryRequest;
use App\Http\Resources\V1\CategoriesResource;
use App\Http\Responses\Api\V1\CollectionResponse;
use App\Http\Responses\Api\V1\MessageResponse;
use App\Http\Responses\Api\V1\SingleRecordResponse;
use Illuminate\Contracts\Support\Responsable;
use Modules\Catalog\DTOs\CategoriesDto;
use Modules\Catalog\Interfaces\CategoryServiceInterface;
use Modules\Catalog\Models\Category;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Response;


/**
 * @OA\Tag(
 *     name="Categories"
 *     description="Crud methods of Category model"
 * )
 */
class CategoriesController extends Controller
{
    /**
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(
        private readonly CategoryServiceInterface $categoryService
    )
    {
    }

    /**
     * @OA\Get(
     *     path="api/v1/categories",
     *     operationId="getCategoriesList",
     *     tags="{"Categories"}",
     *     summary="Get all categories",
     *     description="Return list of categories"
     *     @OA\Response(
     *         response="200",
     *         description="Successfull operation"
     *      @OA\JsonContent(
     *          type="array",
     *      )
     *     )
     * )
     * @return Responsable
     */
    public function index(): Responsable
    {
        return new CollectionResponse(
            data: CategoriesResource::collection(
                Category::query()->paginate(5)
            ),
            status: Response::HTTP_OK
        );
    }

    /**
     *
     * @param Category $category
     * @return Responsable
     */
    public function show(Category $category): Responsable
    {

        return new SingleRecordResponse(
            data: CategoriesResource::make($category),
            status: Response::HTTP_OK
        );
    }

    /**
     * @OA\Post(
     *      path="/api/v1/categories",
     *      operationId="addCategory",
     *      tags={"Categories"},
     *      summary="Add a new category",
     *      description="Add a new category to shop"
     *  )
     * @OA\RequestBody(
     *      response="true",
     *      description="Category data",
     *      @OA\JsonContent(ref="#/components/schemas/Category")
     *  )
     * @OA\Response(
     *      response="201",
     *      description="Record created succesfully created",
     *      @OA\JsonContent(
     *               type="object",
     *               @OA\Property(property="message", type="string", example="Record created successfully"),
     *           )
     *  @OA\Response(
     *           response=400,
     *           description="Invalid input"
     *       )
     *  )
     * @param CategoryRequest $request
     * @return Responsable
     */
    public function store(CategoryRequest $request): Responsable
    {
        $this->categoryService->store(
            dto: CategoriesDto::fromApiRequest($request)
        );

        return new MessageResponse(
            message: 'Record created successfully',
            status: Response::HTTP_CREATED
        );
    }

    /**
     * @OA\Put(
     *      path="api/v1/categories/{categoryId},
     *      operationId="updateCategory",
     *      tags="{Categories}",
     *      summary="Update an existing category",
     *      description="Updates the data of an existing category"
     *       @OA\Parameter(
     *           name="categoryId",
     *           in="path",
     *           required=true,
     *           description="ID of category to return",
     *           @OA\Schema(type="integer")
     *       ),
     *      @OA\RequestBody(
     *           required=true,
     *           description="Updated category data",
     *           @OA\JsonContent(ref="#/components/schemas/Category")
     *       ),
     *      @OA\Response(
     *           response=201,
     *           description="Record updated successfully",
     *           @OA\JsonContent(
     *               type="object",
     *               @OA\Property(property="message", type="string", example="Record updated successfully"),
     *           )
     *       ),
     *      @OA\Response(
     *           response=400,
     *           description="Invalid input"
     *       ),
     *      @OA\Response(
     *           response=404,
     *           description="Category not found"
     *       )
     *  )
     * @param CategoryRequest $request
     * @param Category $category
     * @return Responsable
     */
    public function update(CategoryRequest $request, Category $category): Responsable
    {
        $this->categoryService->update(
            dto: CategoriesDto::fromApiRequest($request)
        );

        return new MessageResponse(
            message: 'Record updated successfully',
            status: Response::HTTP_CREATED
        );
    }

    /**
     * @OA\Delete(
     *      path="api/v1/categories/{categoryId}",
     *      operationId="deleteCategory",
     *      tags={"Categories"},
     *      summary="Deletes a category",
     *      description="Deletes a single category based on the ID supplied",
     *      @OA\Parameter(
     *          name="categoryId",
     *          in="path",
     *          description="ID of the category to delete",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Category deleted"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Category not found"
     *      )
     *  )
     * @param Category $category
     * @return Responsable
     */
    public function destroy(Category $category): Responsable
    {
        $this->categoryService->delete($category);

        return new MessageResponse(
            message: 'Record deleted',
            status: Response::HTTP_NO_CONTENT
        );
    }

}
