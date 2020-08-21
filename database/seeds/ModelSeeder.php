<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getModels() as $model) {
            DB::table('models')->insert([
                'name' => $model
            ]);
        }
    }

    public function getModels($modelDirectory = 'Models')
    {
        $files = collect(File::allFiles(app_path($modelDirectory)));
        $modelDirectory .= '\\';
        return $files
            ->map(function ($item) use($modelDirectory){
                return 'App\\' . $modelDirectory . explode('.', $item->getFileName())[0];
            })
            ->filter(function ($item){
                if (class_exists($item)){
                    $reflaction = new \ReflectionClass($item);
                    return $reflaction->getParentClass()->getName() === 'Illuminate\\Database\\Eloquent\\Model'
                        || 'Illuminate\\Foundation\\Auth\\User';
                }
                return false;
            });
    }
}
