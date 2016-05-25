<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Category;
use App\Model\Service;
use App\Model\Command;


class StartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create(['name' => 'Admin','email'=>'admin@admin.com','password' => '$2y$10$2grFZNn.z8T70plC9Y2cteq2CraZy722NKwRvmq40ennKd10bSPR.']);

        Command::truncate();
        Service::truncate();
        Category::truncate();

        Category::create(['name'=>'Exemplo', 'show' => true])
                    ->Services()->create(['name' =>'Backup', 'slug' => str_slug('Backup')])
                    ->Commands()->create(['name' =>'Backup Sqlite Admin', 'command' =>'cp  ' .__DIR__.'/../database.sqlite   ' .__DIR__."/../bkp_database.sqlite"]);

        Category::create(['name'=>'Exemplo Shell', 'show' => true])
            ->Services()->create(['name' =>'Shell Back', 'slug' => str_slug('Shell Back')])
            ->Commands()->create(['name' =>'Backup Pasta Shell', 'command' =>'bash /Users/user/Documents/Code/Projects/interface-admin/storage/shells/7e617bfd288f5a0da7a71e3d472e8881.sh','src' => 'shells', 'file' => '7e617bfd288f5a0da7a71e3d472e8881.sh']);
    }
}
