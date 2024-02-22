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
     * @param CategoryRequest $request
     * @return Responsable
     */
    public function store(CategoryRequest $request): Responsable
    {
        Category::query()->create($request->validated());

        return new MessageResponse(
            message: 'Record created successfully',
            status: Response::HTTP_CREATED
        );
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return Responsable
     */
    public function update(CategoryRequest $request, Category $category): Responsable
    {

        $category->update($request->validated());
        return new MessageResponse(
            message: 'Record updated successfully',
            status: Response::HTTP_CREATED
        );
    }

    /**
     * @param Category $category
     * @return Responsable
     */
    public function destroy(Category $category): Responsable
    {
        $category->delete();
        return new MessageResponse(
            message: 'Record deleted',
            status: Response::HTTP_NO_CONTENT
        );
    }

}
