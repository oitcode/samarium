<?php

namespace App\Services\Vacancy;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Vacancy;

class VacancyService
{
    /**
     * Get paginated list of vacancies
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedVacancies(int $perPage = 5): LengthAwarePaginator
    {
        return Vacancy::orderBy('vacancy_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new vacancy
     *
     * @param array $data
     * @return Vacancy
     */
    public function createVacancy(array $data): Vacancy
    {
        $vacancy = Vacancy::create($data);

        return $vacancy;
    }

    /**
     * Check if a vacancy can be deleted.
     *
     * @param int $vacancy_id
     * @return void
     */
    public function canDeleteVacancy(int $vacancy_id): bool
    {
        $vacancy = Vacancy::find($vacancy_id);

        // Todo

        return true;
    }

    /**
     * Delete vacancy
     *
     * @param int $vacancy_id
     * @return void
     */
    public function deleteVacancy(int $vacancy_id): void
    {
        $vacancy = Vacancy::find($vacancy_id);

        $vacancy->delete();
    }

    /**
     * Get total vacancy count
     *
     * @return int
     */
    public function getTotalVacancyCount(): int
    {
        return Vacancy::count();
    }
}
