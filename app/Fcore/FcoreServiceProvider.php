<?php

namespace App\Fcore;

use App\Fcore\Class\BlockSchema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FcoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(BlockSchema::class, function () {
            return new BlockSchema();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->bladeDirectives();
    }

    public function bladeDirectives()
    {
        Blade::directive('blocks', function ($expression) {
            return <<<EOT
                <?php foreach ({$expression} as \$block) {
                    \$component = 'block.' . (Str::snake(\$block['type'] ?? '', '-'));
                    if (view()->exists('components.' . \$component)) {
                        echo \Blade::render(
                            '<x-dynamic-component :component="\$component" :data="\$data" />',
                            ['component' => \$component, 'data' => \$block['data'] ?? []]
                        );
                    }
                } ?>
                EOT;
        });

        Blade::directive('block', function ($expression) {
            $parts = explode(',', $expression, 2);
            $type = trim($parts[0] ?? "''");
            $data = isset($parts[1]) ? trim($parts[1]) : '[]';

            return <<<EOT
                <?php
                \$component = 'block.' . {$type};
                if (view()->exists('components.' . \$component)) {
                    echo \Blade::render(
                        '<x-dynamic-component :component="\$component" :data="\$data" />',
                        ['component' => \$component, 'data' => {$data}]
                    );
                }
                ?>
                EOT;
        });
    }
}
