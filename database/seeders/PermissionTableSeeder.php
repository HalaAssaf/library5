<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Users',
            'Roles',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'Book',
           'book-list',
           'book-create',
           'book-edit',
           'book-delete',
           'Category',
           'mainCategory-list',
           'mainCategory-create',
           'mainCategory-edit',
           'mainCategory-delete',
           'subCategory-list',
           'subCategory-create',
           'subCategory-edit',
           'subCategory-delete',
           'add_Book_To_Favorite',
           'Rating-book'

        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
