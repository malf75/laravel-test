<?php

namespace App\Http\Controllers;

use App\Http\DTO\JobDTO;
use Illuminate\Http\Request;
use App\Services\JobService;


class JobController extends Controller
{
    protected $jobService;

    public function __construct(JobService $jobService) {
        $this->jobService = $jobService;
    }

    public function index() {
        $jobs = $this->jobService->getJobs();
        return response()->json($jobs);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'titulo' => 'required|string|max:100',
            'salario' => 'required|numeric'
        ]);

        $jobDTO = new JobDTO($validateData['titulo'], $validateData['salario']);

        $job = $this->jobService->createJobs($jobDTO);

        return response()->json($job, 201);
    }

    public function delete($titulo){

        $response = $this->jobService->deleteJobs($titulo);

        return response()->json($response);

    }
}

