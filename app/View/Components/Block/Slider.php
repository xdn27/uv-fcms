<?php

namespace App\View\Components\Block;

use App\Fcore\Interface\FilamentBlockComponent;
use Closure;
use Filament\Forms\Components\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slider extends Component implements FilamentBlockComponent
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
            FileUpload::make('images')
                ->multiple()
                ->image()
                ->imageEditor()
                ->directory('slider')
                ->optimize('webp')
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.block.slider');
    }
}
