<?php

namespace App\Livewire\Vacancy\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Vacancy\VacancyService;
use App\Vacancy;

/**
 * VacancyList Component
 * 
 * This Livewire component handles the listing of vacancies.
 * It also handles deletion of vacancies.
 */
class VacancyList extends Component
{
    use WithPagination;
    use ModesTrait;

    /**
     * Vacancies per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of appointments
     *
     * @var int
     */
    public $totalVacancyCount;

    /**
     * Vacancy which needs to be deleted
     *
     * @var Vacancy
     */
    public $deletingVacancy;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(VacancyService $vacancyService): View
    {
        $vacancies = $vacancyService->getPaginatedVacancies($this->perPage);
        $this->totalVacancyCount = $vacancyService->getTotalVacancyCount();

        return view('livewire.vacancy.dashboard.vacancy-list', [
            'vacancies' => $vacancies,
        ]);
    }

    /**
     * Confirm if user really wants to delete a vacancy
     *
     * @return void
     */
    public function confirmDeleteVacancy(int $vacancy_id, VacancyService $vacancyService): void
    {
        $this->deletingVacancy = Vacancy::find($vacancy_id);

        if ($vacancyService->canDeleteVacancy($vacancy_id)) {
            $this->enterModeSilent('confirmDelete');
        } else {
            $this->enterModeSilent('cannotDelete');
        }
    }

    /**
     * Cancel vacancy delete
     *
     * @return void
     */
    public function cancelDeleteVacancy(): void
    {
        $this->deletingVacancy = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that an vacancy cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteVacancy(): void
    {
        $this->deletingVacancy = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete vacancy
     *
     * @return void
     */
    public function deleteVacancy(VacancyService $vacancyService): void
    {
        $vacancyService->deleteVacancy($this->deletingVacancy->vacancy_id);
        $this->deletingVacancy = null;
        $this->exitMode('confirmDelete');
    }
}
