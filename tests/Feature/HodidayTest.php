<?php

namespace Tests\Feature;

use App\Http\Controllers\Api\HolidayPlanController;
use App\Models\HolidayPlan;
use App\Service\HolidayPlanService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use Mockery;

class HodidayTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        HolidayPlan::factory()->count(3)->create();

        $controller = new HolidayPlanService();
        $response = $controller->index();

        $this->assertInstanceOf(\Illuminate\Http\Resources\Json\AnonymousResourceCollection::class, $response);
        $this->assertCount(3, $response->collection);

        Mockery::close();
    }

    public function testIndexThrowsException()
    {
        $mockService = Mockery::mock(HolidayPlanService::class);
        $mockService->shouldReceive('index')->andThrow(new \App\Exceptions\GeneralExceptionCatch('Error, index', 400));

        $controller = new HolidayPlanController($mockService);

        $this->expectException(\App\Exceptions\GeneralExceptionCatch::class);
        $this->expectExceptionMessage('Error, index');

        $controller->index();
    }

    public function testStore()
    {
        $data = [
            'title' => 'Test Holiday',
            'description' => 'Description of test holiday',
            'startHoliday' => '2024-08-01',
            'endHoliday' => '2024-08-10',
            'location' => 'Test Location',
        ];

        $mockService = Mockery::mock(HolidayPlanService::class);
        $mockService->shouldReceive('store')->with($data)->andReturn(new \App\Http\Resources\GeneralResource(['message' => 'success']));

        $controller = new HolidayPlanController($mockService);

        $request = new \App\Http\Requests\HolidayPlanRequest();
        $request->setContainer($this->app)->merge($data);  
        $request->setMethod('POST');
        $request->validate($request->rules());
        $response = $controller->store($request);

        $this->assertInstanceOf(\App\Http\Resources\GeneralResource::class, $response);

        Mockery::close();
    }

    public function testUpdate()
    {
        $holidayPlan = HolidayPlan::factory()->create();

        $data = [
            'title' => 'Updated Holiday',
            'description' => 'Updated description',
            'startHoliday' => '2024-09-01',
            'endHoliday' => '2024-09-10',
            'location' => 'Updated Location',
        ];

        $mockService = Mockery::mock(HolidayPlanService::class);
        $mockService->shouldReceive('update')->with($data, $holidayPlan->id)->andReturn(new \App\Http\Resources\GeneralResource(['message' => 'success']));

        $controller = new HolidayPlanController($mockService);

        $request = new \App\Http\Requests\HolidayPlanRequest();
        $request->setContainer($this->app)->merge($data); 
        $request->setMethod('PUT');
        $request->validate($request->rules());
        $response = $controller->update($request, $holidayPlan->id);

        $this->assertInstanceOf(\App\Http\Resources\GeneralResource::class, $response);

        Mockery::close();
    }

    public function testShow()
    {
        $holidayPlan = HolidayPlan::factory()->create();
        $controller = new HolidayPlanService();

        $response = $controller->show($holidayPlan->id);

        $this->assertInstanceOf(\App\Http\Resources\HolidayPlanResource::class, $response);
        $this->assertEquals($holidayPlan->id, $response->id);
    }

    public function testDestroy()
    {
        $holidayPlan = HolidayPlan::factory()->create();

        $mockService = Mockery::mock(HolidayPlanService::class);
        $mockService->shouldReceive('destroy')->with($holidayPlan->id)->andReturn(new \App\Http\Resources\GeneralResource(['message' => 'success']));

        $controller = new HolidayPlanController($mockService);

        $response = $controller->destroy($holidayPlan->id);

        $this->assertInstanceOf(\App\Http\Resources\GeneralResource::class, $response);
        $this->assertDatabaseMissing('holiday_plans', ['id' => $holidayPlan->id]);

        Mockery::close();
    }
}
