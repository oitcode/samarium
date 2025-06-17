<?php

namespace App\Services\Team;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Team\Team;

class TeamService
{
    /**
     * Get paginated list of teams
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedTeams(int $perPage = 5): LengthAwarePaginator
    {
        return Team::orderBy('team_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new team
     *
     * @param array $data
     * @return Team
     */
    public function createTeam(array $data): void // Todo
    {
        // Todo
    }

    /**
     * Check if a team can be deleted.
     *
     * @param int $team_id
     * @return bool
     */
    public function canDeleteTeam(int $team_id): bool
    {
        $team = Team::find($team_id);

        // Todo

        return true;
    }

    /**
     * Delete team
     *
     * @param int $team_id
     * @return void
     */
    public function deleteTeam(int $team_id): void
    {
        $team = Team::find($team_id);

        foreach ($team->teamMembers as $teamMember) {
            foreach ($teamMember->teamMemberAppointmentAvailabilities as $teamMemberAppointmentAvailability) {
                $teamMemberAppointmentAvailability->delete();
            }
            foreach ($teamMember->appointments as $appointment) {
                $appointment->delete();
            }

            $teamMember->delete();
        }

        $team->delete();
    }

    /**
     * Get total team count
     *
     * @return int
     */
    public function getTotalTeamCount(): int
    {
        return Team::count();
    }
}
