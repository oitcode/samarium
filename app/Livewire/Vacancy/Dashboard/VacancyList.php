<?php

namespace App\Livewire\Vacancy\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Vacancy;

class VacancyList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $vacanciesCount;

    /* Protected because Livewire does not allow public when using pagination. */
    // protected $vacancies;

    public function mount(): void
    {
        //$this->vacancies = Vacancy::paginate(5);
    }

    public function render(): View
    {
        $this->vacanciesCount = Vacancy::count();

        $vacancies = Vacancy::orderBy('vacancy_id', 'desc')->paginate(5);

        return view('livewire.vacancy.dashboard.vacancy-list')
            ->with('vacancies', $vacancies);
    }
}
