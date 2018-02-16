<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Admin;

class InitialUserAdmin extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $User = new User;
    $User->username = '01012011';
    $User->password = bcrypt('01012011');
    $User->tipe     = 1;
    $User->save();

    $UserId = User::orderBy('id', 'desc')
                  ->first()
                  ->id;

    $Admin = new Admin;
    $Admin->nomorinduk = '112011';
    $Admin->nama       = 'Kisahnya Admin';
    $Admin->nohp       = '089601012200';
    $Admin->email      = 'faruq.rahmadani@yahoo.com';
    $Admin->user_id    = $UserId;
    $Admin->save();
  }
}
