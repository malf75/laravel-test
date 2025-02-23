<?php

use App\Http\DTO\JobDTO;
use App\Services\JobService;
use PHPUnit\Framework\TestCase;
use App\Repositories\JobRepository;

class JobTest extends TestCase
{

    public function testCreateJobs()
    {
        $jobRepositoryMock = $this->createMock(JobRepository::class);

        $jobRepositoryMock->method('createJobs')->willReturnCallback(function ($job) {
            return new JobDTO($job->titulo, $job->salario);
        });

        $jobService = new JobService($jobRepositoryMock);

        $job = new JobDTO('Desenvolvedor', 5000);

        $jobCreated = $jobService->createJobs($job);

        $this->assertInstanceOf(JobDTO::class, $jobCreated);

        $this->assertEquals('Desenvolvedor', $jobCreated->titulo);
        $this->assertEquals(5000, $jobCreated->salario);
    }

    public function testCreateJobsExistent()
    {
        $jobRepositoryMock = $this->createMock(JobRepository::class);

        $jobRepositoryMock->method('createJobs')->willReturnCallback(function ($job) {
            if ($job->titulo === 'Civil Engineer') {
                return ['success' => false, 'message' => 'Emprego Já Existe'];
            }
            return new JobDTO($job->titulo, $job->salario);
        });

        $jobService = new JobService($jobRepositoryMock);

        $job = new JobDTO('Civil Engineer', 500);

        $jobCreatedExistent = $jobService->createJobs($job);

        $this->assertFalse($jobCreatedExistent['success']);
        $this->assertEquals('Emprego Já Existe', $jobCreatedExistent['message']);
    }
}
