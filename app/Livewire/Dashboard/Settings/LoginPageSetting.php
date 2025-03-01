<?php

namespace App\Livewire\Dashboard\Settings;

use Livewire\Component;
use Illuminate\View\View;

class LoginPageSetting extends Component
{
    public $availableFiles = [];

    public function mount(): void
    {
        $this->getAvailableFiles();
    }

    public function render(): View
    {
        return view('livewire.dashboard.settings.login-page-setting');
    }

    public function getAvailableFiles(): void
    {
        $dir = '../resources/views/collection/login/';

        $this->availableFiles = scandir($dir);
    }
}
