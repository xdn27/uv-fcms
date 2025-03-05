<?php

namespace App\View\Components\Block;

use App\Fcore\Interface\FilamentBlockComponent;
use Closure;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListBlockV1 extends Component implements FilamentBlockComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function schema()
    {
        return [
            TextInput::make('title'),
            TextInput::make('subtitle'),
            KeyValue::make('list')->keyLabel('Name')->valueLabel('Link')
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.block.list-block-v1');
    }
}
