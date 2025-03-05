<?php

namespace App\View\Components\Block;

use App\Fcore\Class\BlockSchema;
use App\Fcore\Interface\FilamentBlockComponent;
use Closure;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Grid as ComponentsGrid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Grid extends Component implements FilamentBlockComponent
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
            Select::make('columns')
                ->options(range(1, 12))
                ->default(0)
                ->live()
                // ->afterStateHydrated(function (Get $get, Set $set, ?string $state) {
                    
                // })
                ->afterStateUpdated(function (Select $component, Set $set, ?string $state) {
                    $component->getContainer()->getComponent('block_grid');
                }),
            Section::make()->schema(function(Get $get) {
                $column_count = $get('columns')+1;
                if(empty($column_count)) {
                    return [];
                }

                $result = [];
                for($i = 0; $i < $column_count; $i++) {
                    $result[] = Builder::make('grid.'.$i)->blocks(BlockSchema::getListExcept(['Grid']))->label('')->maxItems(1);
                }
                
                return $result;
            })->key('block_grid')
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.block.grid');
    }
}
