<?php

namespace App\Traits\Models;

use Illuminate\Support\Arr;

trait HasCodyFighterOptions
{
    protected string $friend;
    protected int $skill;
    protected int $x;
    protected int $y;

    protected function GetX()
    {
        return $this->x;
    }

    protected function GetY()
    {
        return $this->y;
    }

    protected function GetSkill()
    {
        return $this->skill;
    }

    protected function GetFriend()
    {
        return $this->friend;
    }

    protected function SetX(int $x): self
    {
        $this->x = $x;

        return $this;
    }

    protected function SetY(int $y): self
    {
        $this->y = $y;

        return $this;
    }

    protected function SetSkill(int $skill): self
    {
        $this->skill = $skill;

        return $this;
    }

    protected function SetFriend(string $friend): self
    {
        $this->friend = $friend;

        return $this;
    }

    public function GetOptionsArray(): array
    {
        $options = collect([
            'friend' => $this->friend,
            'skill' => $this->skill,
            'x' => $this->x,
            'y' => $this->y,
        ]);

        $filteredOptions = $options->filter(function ($value, $key) {
            return $value != null;
        });

        return $filteredOptions->toArray();
    }
}
