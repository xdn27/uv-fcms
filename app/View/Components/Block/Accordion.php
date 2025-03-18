<?php

namespace App\View\Components\Block;

use App\Fcore\Class\BlockSchema;
use App\Fcore\Interface\FilamentBlockComponent;
use Closure;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Accordion extends Component implements FilamentBlockComponent
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
            Repeater::make('accordion')->schema([
                TextInput::make('title')->required(),
                Builder::make('block')->blocks(BlockSchema::getListExcept(['Accordion', 'Container']))
            ])
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.block.accordion');
    }
}
