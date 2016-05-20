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

        Category::create(['name'=>'Exmplo', 'show' => true])
                    ->Services()->create(['name' =>'Backup'])
                    ->Commands()->create(['name' =>'Backup Sqlite Admin', 'command' =>'cp  ' .__DIR__.'/../database.sqlite   ' .__DIR__."/../bkp_database.sqlite"]);
    }
}
