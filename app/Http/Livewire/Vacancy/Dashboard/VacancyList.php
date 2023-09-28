<?php

namespace App\Http\Livewire\Vacancy\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

use App\Vacancy;

class VacancyList extends Component
{
    use WithPagination;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    public $vacanciesCount;

    /* Protected because Livewire does not allow public when using pagination. */
    // protected $vacancies;

    public function mount()
    {
        //$this->vacancies = Vacancy::paginate(5);
    }

    public function render()
    {
        $this->vacanciesCount = Vacancy::count();

        $vacancies = Vacancy::paginate(5);

        return view('livewire.vacancy.dashboard.vacancy-list')
            ->with('vacancies', $vacancies);
    }
}
