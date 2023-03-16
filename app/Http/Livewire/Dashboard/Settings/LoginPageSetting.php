<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Livewire\Component;

class LoginPageSetting extends Component
{
    public $availableFiles = [];

    public function mount()
    {
        $this->getAvailableFiles();
    }

    public function render()
    {
        return view('livewire.dashboard.settings.login-page-setting');
    }

    public function getAvailableFiles()
    {
        $dir = '../resources/views/collection/login/';

        $this->availableFiles = scandir($dir);
    }
}
