<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permission = new \App\Permission();
        $permission->name = 'update_user';
        $permission->display_name = 'Chinh sua nguoi dung';
        $permission->save();
        $permission = new \App\Permission();
        $permission->name = 'delete_user';
        $permission->display_name = 'Xoa nguoi dung';
        $permission->save();
        $permission = new \App\Permission();
        $permission->name = 'create_post';
        $permission->display_name = 'Tao moi bai viet';
        $permission->save();
        $permission = new \App\Permission();
        $permission->name = 'update_post';
        $permission->display_name = 'Cap nhat bai viet';
        $permission->save();
        $permission = new \App\Permission();
        $permission->name = 'delete_post';
        $permission->display_name = 'Xoa bai viet';
        $permission->save();
        $permission = new \App\Permission();
        $permission->name = 'CRUD_role';
        $permission->display_name = 'Them sua xoa role';
        $permission->save();
    }
}
