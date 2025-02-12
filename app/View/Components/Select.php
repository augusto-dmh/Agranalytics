<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\View\View;

class Select extends Component
{
    public string $name;
    public array|Collection $options; // desired values described at the end of this file
    public Model|Collection|null $selected; // selectedOption | selectedOptions
    public ?bool $multiple;
    public ?string $optionsLabel;
    public ?string $optionsValue;
    public ?string $label;

    protected $except = ['optionsLabel', 'optionsValue']; // only used to get the label or value for an option

    public function __construct($name, $options, $optionsLabel, $optionsValue, $label, bool $multiple = false, $selected = null)
    {
        $this->name = $name;
        $this->options = $options;
        $this->multiple = $multiple;
        $this->optionsLabel = $optionsLabel;
        $this->selected = $selected;
        $this->optionsValue = $optionsValue;
        $this->label = $label;
    }

    public function render(): View|Closure|string
    {
        return view('components.select');
    }

    public function optionValue($option): bool|int|float|string
    {
        return $this->optionsValue ? $option[$this->optionsValue] : (is_array($option) ? $option['value'] : $option);
    }

    public function optionLabel($option): bool|int|float|string
    {
        return $this->optionsLabel ? $option[$this->optionsLabel] : (is_array($option) ? $option['label'] : $option);
    }

    public function isOptionSelected($value): bool
    {
        return $this->multiple
            ? in_array($value, old($this->name, $this->selected?->pluck('id')->toArray() ?? []))
            : old($this->name, $this->selected?->id) == $value;
    }
}

// `$options` possible data structures examples:

// Case 1: Simple array of strings/numbers (for options whose label and value should be equal)
// $options = [
//     'admin',
//     'user',
//     'guest',
// ];

// Case 2: Associative array (for hard-coded options)
// $options = [
//     ['label' => 'United States', 'value' => 'US'],
//     ['label' => 'Canada', 'value' => 'CA'],
//     ['label' => 'United Kingdom', 'value' => 'UK'],
// ];

// Case 3: Collection (for data originated from database)
// $countries = DB::table('countries') // ≈ [['code' => 'US', 'name' => 'United States'],...]
//   ->select('code', 'name')
//   ->get();
//
// $options = $countries
