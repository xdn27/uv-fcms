<?php

namespace App\Fcore\Class;

use App\Fcore\Interface\BlockSchema as InterfaceBlockSchema;
use App\Fcore\Interface\FilamentBlockComponent;
use Filament\Forms\Components\Builder;

class BlockSchema
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    
    /**
     * Get class name inside directory view/components/block that use interface FilamentBlockComponent
     * 
     * @return array
     */
    public function getBlockClassList(): array
    {
        $files = scandir(base_path('app/View/Components/Block'));
        $classList = [];
        
        foreach ($files as $file) {
            if (str_ends_with($file, '.php')) {
                $class = 'App\\View\\Components\\Block\\' . str_replace('.php', '', $file);
                $interface = new \ReflectionClass(FilamentBlockComponent::class);
                if (in_array($interface->getName(), class_implements($class))) {
                    $classList[] = $class;
                }
            }
        }

        return $classList;
    }

    
    /**
     * Get schema for all block class
     * 
     * @return array
     */
    public function getBlockSchemaList($except = []): array
    {
        $classList = $this->getBlockClassList();
        $schemaList = [];
        
        foreach ($classList as $class) {

            $ref = new \ReflectionClass($class);

            if(in_array($ref->getShortName(), $except)) {
                continue;
            }
            
            $schemaList[] = Builder\Block::make($ref->getShortName())
                                ->label($ref->getShortName())
                                ->schema((new $class())->schema());
        }
        
        return $schemaList;
    }

    public static function getList(): array
    {
        return app(BlockSchema::class)->getBlockSchemaList();
    }

    public static function getListExcept($except): array
    {
        return app(BlockSchema::class)->getBlockSchemaList($except);
    }
}
