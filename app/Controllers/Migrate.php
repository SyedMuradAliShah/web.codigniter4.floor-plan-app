<?php

namespace App\Controllers;

use Throwable;

class Migrate extends BaseController
{
    public function index()
    {
        $this->latest();
        $this->seed();

        echo 'Migrations ran successfully';
        
        return redirect()->to('/');
    }

    public function latest()
    {

        $migrate = \Config\Services::migrations();

        try {

            // drop all tables
            $migrate->regress(-1);

            // create all tables
            $migrate->latest();
            echo 'Migrations ran successfully';

            // $this->session->destroy();

            return redirect()->to('/');
        } catch (Throwable $e) {
            die($e->getMessage() . '<br/>' . $e->getLine() . ': ' . $e->getFile());
        }
    }

    public function seed()
    {

        try {
            $seeder = \Config\Database::seeder();
            $seeder->call('OptionsSeeder');
            print('OptionsSeeder seeded successfully');
            print('<br><br>');

            $seeder->call('AdminRolesSeeder');
            print('AdminRolesSeeder seeded successfully');
            print('<br><br>');

            $seeder->call('AdminsSeeder');
            print('AdminsSeeder seeded successfully');
            print('<br><br>');

            $seeder->call('AdminPermissionsSeeder');
            print('AdminPermissionsSeeder seeded successfully');
            print('<br><br>');

            $seeder->call('AdminRolePermissionSeeder');
            print('AdminRolePermissionSeeder seeded successfully');
            print('<br><br>');

            $seeder->call('CategoriesSeeder');
            print('CategoriesSeeder seeded successfully');
            print('<br><br>');

            $seeder->call('CategoryImagesSeeder');
            print('CategoryImagesSeeder seeded successfully');
            print('<br><br>');

            return redirect()->to('/');
        } catch (Throwable $e) {
            die($e->getMessage() . '<br/>' . $e->getLine() . ': ' . $e->getFile());
        }
    }
}
