<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use \ForceUTF8\Encoding;
use App\Models\Team\Team;
use App\Models\Team\TeamMember;

class TeamDisplayTeamMembersCreateFromCsv extends Component
{
    use WithFileUploads;

    public $team_id;

    public $members_file;

    public $startMode = true;
    public $previewMode = false;

    public $lines = [];
    public $totLines;
    public $filePath;

    public function render(): View
    {
        return view('livewire.team.dashboard.team-display-team-members-create-from-csv');
    }

    public function preview(): void
    {
        $validatedData = $this->validate([
            'members_file' => 'required|file|max:1024',
        ]);

        /*
         * TODO: Can be done without storing the file?
         */

        $this->filePath = $this->members_file->store('csvImports');
        $contents = Storage::get($this->filePath);

        $lines = explode("\n", $contents);

        /*
         * TODO:
         *
         * For some reason last line will be of one char. 
         * Dont know why. 
         *
         * Poping it out of array to be safe.
         *
         * Fix it!
         *
         */
        array_pop($lines);

        /* Remove the first header row of csv file. */
        array_shift($lines);

        $this->totLines = count($lines);

        foreach ($lines as $line) {
            $this->lines[] = explode(',', $line);
        }

        $this->enterPreviewMode();
    }

    public function enterStartMode(): void
    {
        $this->startMode = true;
    }

    public function exitStartMode(): void
    {
        $this->startMode = false;
    }

    public function enterPreviewMode(): void
    {
        $this->exitStartMode();
        $this->previewMode = true;
    }

    public function exitPreviewMode(): void
    {
        $this->previewMode = false;
    }

    public function importFromFile(): void
    {
        $team = Team::find($this->team_id);

        $maxPosition = $team->getMaxPosition();
        $maxPosition++;

        foreach ($this->lines as $line) {
            $teamMember = new TeamMember;

            $teamMember->name = $line[0];
            $teamMember->comment = $line[1];
            $teamMember->phone = $line[2];
            $teamMember->email = $line[3];
            $teamMember->address = $line[4];

            $teamMember->team_id = $this->team_id;
            $teamMember->position = $maxPosition++;
            $teamMember->save();

            /* Todo: Store team member image from excel/csv file. */
        }

        /* Delete the file */
        //Storage::delete($this->filePath);

        $this->dispatch('exitAddNewTeamMembersFromFileMode');
    }
}
