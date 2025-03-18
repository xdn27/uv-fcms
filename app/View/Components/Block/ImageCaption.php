<?php

namespace App\View\Components\Block;

use App\Fcore\Interface\FilamentBlockComponent;
use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageCaption extends Component implements FilamentBlockComponent
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
            FileUpload::make('image')
                ->image()
                ->imageEditor()
                ->directory('image')
                ->optimize('webp'),
            TextInput::make('title'),
            Textarea::make('description')
                ->rows(5)
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.block.image-caption');
    }
}
