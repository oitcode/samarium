<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use App\Team;
use App\TeamMember;

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

    public function render()
    {
        return view('livewire.team.team-display-team-members-create-from-csv');
    }

    public function preview()
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

    public function enterStartMode()
    {
        $this->startMode = true;
    }

    public function exitStartMode()
    {
        $this->startMode = false;
    }

    public function enterPreviewMode()
    {
        $this->exitStartMode();
        $this->previewMode = true;
    }

    public function exitPreviewMode()
    {
        $this->previewMode = false;
    }

    public function importFromFile()
    {
        foreach ($this->lines as $line) {
            //DB::beginTransaction();

            //try {
                $teamMember = new TeamMember;

                $teamMember->name = $line[0];
                $teamMember->comment = $line[1];
                $teamMember->phone = $line[2];
                $teamMember->email = $line[3];
                $teamMember->address = $line[4];

                $teamMember->team_id = $this->team_id;
                $teamMember->save();

                /* Todo: Store team member image from excel/csv file. */

                //DB::commit();
            //} catch (\Exception $e) {
                //DB::rollback();
            //}
            
            // $i++;
        }

        /* Delete the file */
        Storage::delete($this->filePath);

        $this->emit('exitAddNewTeamMembersFromFileMode');
    }
}
