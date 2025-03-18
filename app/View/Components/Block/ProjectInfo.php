<?php

namespace App\View\Components\Block;

use App\Fcore\Interface\FilamentBlockComponent;
use Closure;
use Filament\Forms\Components\Component as FilamentComponent;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectInfo extends Component implements FilamentBlockComponent
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
            Textarea::make('description')->rows(5),
            KeyValue::make('meta_info')
                ->reorderable()
                ->label('Meta')
                ->default([
                    'Director' => '',
                    'Type' => '',
                    'Year' => '',
                    'Agency' => ''
                ])
                ->live()
                ->helperText('Max item 4')
                ->afterStateUpdated(function($state, FilamentComponent $component) {
                    if(count($state) >= 3){
                        $component->addable(false);
                    }
                }),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.block.project-info');
    }
}
