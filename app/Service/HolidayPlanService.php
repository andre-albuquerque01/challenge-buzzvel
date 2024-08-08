<?php

namespace App\Service;

use App\Exceptions\GeneralExceptionCatch;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\HolidayPlanResource;
use App\Models\HolidayPlan;
use Barryvdh\DomPDF\Facade\Pdf;

class HolidayPlanService
{
    public function index()
    {
        try {
            $day = HolidayPlan::get();
            return HolidayPlanResource::collection($day);
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error, index', 400);
        }
    }

    public function store(array $data)
    {
        try {
            HolidayPlan::create($data);
            return new GeneralResource(['message' => 'success']);
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error, create', 400);
        }
    }

    public function show(int $id)
    {
        try {
            $day = HolidayPlan::find($id)->first();
            return new HolidayPlanResource($day);
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error, show', 400);
        }
    }

    public function getAllReportPdf()
    {
        try {
            $day = HolidayPlan::get();
            $pdf = Pdf::loadView('pdf.getAllPdf', compact('day'));
            return $pdf->stream('getAllPdf.pdf');
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error generating PDF: ' . $e->getMessage(), 400);
        }
    }

    public function getOneReportPdf(int $id)
    {
        try {
            $day = HolidayPlan::findOrFail($id, 'id')->first();
            $pdf = Pdf::loadView('pdf.getOnePdf', compact('day'));
            return $pdf->stream('getOnePdf.pdf');
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error generating PDF: ' . $e->getMessage(), 400);
        }
    }


    public function update(array $data, int $id)
    {
        try {
            HolidayPlan::where('id', $id)->update($data);
            return new GeneralResource(['message' => 'success']);
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error, update', 400);
        }
    }
    public function destroy(int $id)
    {
        try {
            HolidayPlan::where('id', $id)->delete();
            return new GeneralResource(['message' => 'success']);
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error, delete', 400);
        }
    }
}
