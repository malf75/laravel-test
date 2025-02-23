<?php

namespace App\Services;

use App\Repositories\Interfaces\JobRepositoryInterface;
use App\Http\DTO\JobDTO;

class JobService {

    protected $jobRepository;

    public function __construct(JobRepositoryInterface $jobRepository) {
        $this->jobRepository = $jobRepository;
    }

    public function getJobs(){
        return $this->jobRepository->getJobs();
    }
    public function createJobs(JobDTO $jobDTO){
        return $this->jobRepository->createJobs($jobDTO);
    }
}
