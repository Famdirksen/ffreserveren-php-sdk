<?php

namespace Famdirksen\FFReserverenPhpSdk\Actions;

use Famdirksen\FFReserverenPhpSdk\Resources\Team;

trait ManagesTeams
{
    public function teams(): array
    {
        return $this->transformCollection(
            $this->get('teams')['data'],
            Team::class
        );
    }

    public function team(int $teamId): Team
    {
        $teamAttributes = $this->get("teams/{$teamId}");

        return new Team($teamAttributes, $this);
    }

    public function teamBySlug(string $teamSlug): Team
    {
        $teamAttributes = $this->get("teams/slug/{$teamSlug}");

        return new Team($teamAttributes, $this);
    }

    public function createTeam(array $data): Team
    {
        $teamAttributes = $this->post('teams', $data);

        return new Team($teamAttributes, $this);
    }

    public function deleteTeam(int $teamId)
    {
        $this->delete("teams/$teamId");
    }
}
