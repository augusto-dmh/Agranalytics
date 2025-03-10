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

    // A message that will be wrapped in an anchor link (e.g: "See it here")
    public ?array $cta; // cta = Call to action / e.g: ['message' => 'See it here', 'link' => "route('soil_types.edit', $soilType)"]

    // Durations in seconds related to the toast (e.g: how much time the toast is showed)
    public ?float $openDurationInS;
    public ?float $exhibitionDurationAfterOpenedInS;
    public ?float $closeDurationInS;

    public function __construct(?float $openDurationInS, ?float $exhibitionDurationAfterOpenedInS, ?float $closeDurationInS)
    {
        $this->toastKey = $this->getToastKey();
        $this->openDurationInS = $openDurationInS;
        $this->exhibitionDurationAfterOpenedInS = $exhibitionDurationAfterOpenedInS;
        $this->closeDurationInS = $closeDurationInS;
        $this->cta = session('cta');
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
