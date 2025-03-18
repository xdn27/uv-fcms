<?php

namespace App\View\Components\Block;

use App\Fcore\Class\BlockSchema;
use App\Fcore\Interface\FilamentBlockComponent;
use Closure;
use Filament\Forms\Components\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Container extends Component implements FilamentBlockComponent
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
            Builder::make('container')->blocks(BlockSchema::getListExcept(['Container']))->label('')
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.block.container');
    }
}
