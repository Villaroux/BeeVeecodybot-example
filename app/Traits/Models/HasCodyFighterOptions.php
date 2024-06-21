<?php

namespace App\Traits\Models;

use Illuminate\Support\Arr;

trait HasCodyFighterOptions
{
    protected string $friend;
    protected int $skill;
    protected int $x;
    protected int $y;

    public function GetX()
    {
        return $this->x;
    }

    public function GetY()
    {
        return $this->y;
    }

    public function GetSkill()
    {
        return $this->skill;
    }

    public function GetFriend()
    {
        return $this->friend;
    }

    public function SetX(int $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function SetY(int $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function SetSkill(int $skill): self
    {
        $this->skill = $skill;

        return $this;
    }

    public function SetFriend(string $friend): self
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Options array contains everything used in requests made.
     *
     * @return array
     */
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
