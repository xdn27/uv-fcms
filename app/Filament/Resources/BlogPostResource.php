<?php

namespace App\Filament\Resources;

use App\Fcore\Trait\BlogPostResourceTrait;
use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\BlogPostResource\RelationManagers;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogPostMeta;
use App\Models\BlogPostMetaTemplate;
use App\Models\BlogPostType;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
    use BlogPostResourceTrait;
    
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Blogging';
    protected static ?int $navigationSort = 1;
    public static ?string $label = 'Post';

    
}
