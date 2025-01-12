<?php

namespace App\View\Components;

use Closure;
use App\Enums\ToastKey;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Toast extends Component
{
    // Session key of the current feedback flash message ('success'|'fail'|'warning'|'info')
    public string $toastKey;

    // Durations in seconds related to the toast (e.g: how much time the toast is showed)
    public ?float $openDurationInS;
    public ?float $exhibitionDurationAfterOpenedInS;
    public ?float $closeDurationIsInS;

    public function __construct(?float $openDurationInS,  ?float $exhibitionDurationAfterOpenedInS, ?float $closeDurationIsInS)
    {
        $this->toastKey = $this->getToastKey();
        $this->openDurationInS = $openDurationInS;
        $this->exhibitionDurationAfterOpenedInS = $exhibitionDurationAfterOpenedInS;
        $this->closeDurationIsInS = $closeDurationIsInS;
    }

    // Only rendered when the session has a flash message assigned to a valid `toastKey`
    public function shouldRender(): bool
    {
        return !!array_intersect(ToastKey::getEnumValues(), array_keys(session()->all()));
    }

    public function render(): View|Closure|string
    {
        return view('components.toast');
    }

    // Get `toastKey` based on the feedback flash message present in the session
    private function getToastKey(): string
    {
        return array_intersect(ToastKey::getEnumValues(), array_keys(session()->all()))[0] ?? ToastKey::INFO->value;
    }
}
