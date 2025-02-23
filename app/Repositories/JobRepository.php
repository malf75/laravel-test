<?php

namespace App\Repositories;

use App\Http\DTO\JobDTO;
use App\Models\Jobs_list;
use App\Repositories\Interfaces\JobRepositoryInterface;

class JobRepository implements JobRepositoryInterface{
    public function getJobs(){
        return Jobs_list::all();
    }
    public function createJobs(JobDTO $jobDTO){
        return Jobs_list::create([
            'titulo' => $jobDTO->titulo,
            'salario' => $jobDTO->salario
        ]);
    }
}
