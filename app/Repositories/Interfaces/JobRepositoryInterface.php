<?php

namespace App\Repositories\Interfaces;
use App\Http\DTO\JobDTO;

interface JobRepositoryInterface {
    public function getJobs();
    public function createJobs(JobDTO $jobDTO);
}
