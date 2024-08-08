<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HolidayPlanRequest;
use App\Service\HolidayPlanService;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="HolidayPlan",
 *     type="object",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Holiday ID"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         description="Holiday plan, name"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Holiday plan, description"
 *     ),
 *     @OA\Property(
 *         property="startHoliday",
 *         type="date",
 *         description="Start holiday plan"
 *     ),
 *     @OA\Property(
 *         property="endHoliday",
 *         type="date",
 *         description="End holiday plan"
 *     ),
 *     @OA\Property(
 *         property="location",
 *         type="string",
 *         description="Holiday plan, location"
 *     ),
 * )
 */
class HolidayPlanController extends Controller
{
    private $holidayPlanService;

    public function __construct(HolidayPlanService $holidayPlanService)
    {
        $this->holidayPlanService = $holidayPlanService;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/holiday",
     *     tags={"HolidayPlan"},
     *     summary="Get list of holiday",
     *     description="Returns list of holiday",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/HolidayPlan")
     *         ),
     *     ),
     * )
     */
    public function index()
    {
        return $this->holidayPlanService->index();
    }

    /**
     * @OA\Post(
     *     path="/api/v1/holiday",
     *     tags={"HolidayPlan"},
     *     summary="Create holiday",
     *     description="Create holiday",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="startHoliday", type="date"),
     *             @OA\Property(property="endHoliday", type="date"),
     *             @OA\Property(property="location", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\Items(ref="#/components/schemas/HolidayPlan")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     )
     * )
     */
    public function store(HolidayPlanRequest $request)
    {
        return $this->holidayPlanService->store($request->validated());
    }

    /**
     * @OA\Get(
     *     path="/api/v1/holiday/{id}",
     *     tags={"HolidayPlan"},
     *     summary="Get list of users",
     *     description="Returns list of users",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Holiday plan to return",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/HolidayPlan")
     *         ),
     *     ),
     * )
     */
    public function show(int $id)
    {
        return $this->holidayPlanService->show($id);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/holidays/pdf",
     *     tags={"HolidayPlan"},
     *     summary="Get pdf list of holiday",
     *     description="Returns list of holiday",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/HolidayPlan")
     *         ),
     *     ),
     * )
     */
    public function getAllReportPdf()
    {
        return $this->holidayPlanService->getAllReportPdf();
    }

    /**
     * @OA\Get(
     *     path="/api/v1/holidays/pdf/{id}",
     *     tags={"HolidayPlan"},
     *     summary="Get pdf list of users",
     *     description="Returns pdf",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Holiday plan to return",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/HolidayPlan")
     *         ),
     *     ),
     * )
     */
    public function getOneReportPdf(int $id)
    {
        return $this->holidayPlanService->getOneReportPdf($id);
    }

    /** 
     * @OA\Put(
     *     path="/api/v1/holiday/{id}",
     *     tags={"HolidayPlan"},
     *     summary="Update plan",
     *     description="Update plan",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Holiday plan to return",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="startHoliday", type="date"),
     *             @OA\Property(property="endHoliday", type="date"),
     *             @OA\Property(property="location", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\Items(ref="#/components/schemas/HolidayPlan")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     )
     * )
     */
    public function update(HolidayPlanRequest $request, int $id)
    {
        return $this->holidayPlanService->update($request->validated(), $id);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/holiday/{id}",
     *     tags={"HolidayPlan"},
     *     summary="Delete user",
     *     description="Delete users",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Holiday plan to return",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/HolidayPlan")
     *         ),
     *     ),
     * )
     */
    public function destroy(int $id)
    {
        return $this->holidayPlanService->destroy($id);
    }
}
