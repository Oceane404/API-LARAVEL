<?php

use Illuminate\Database\Seeder;

class InternsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interns')->insert([
            'firstname'=>'Océane',
            'lastname'=>'Belardi',
            'age'=> 32,
            'email' => 'o.belardi@it-students.fr',
            'phone_number' => 0601010101
        ]);

        DB::table('interns')->insert([
            'firstname'=>'Benoît',
            'lastname'=>'Perus',
            'age'=> 32,
            'email' => 'b.perus@it-students.fr',
            'phone_number' => 0602020202
        ]);

        DB::table('interns')->insert([
            'firstname'=>'Soline',
            'lastname'=>'Molowa',
            'age'=> 30,
            'email' => 's.molowa@it-students.fr',
            'phone_number' => 0603030303
        ]);

        DB::table('interns')->insert([
            'firstname'=>'Adam',
            'lastname'=>'Agoune',
            'age'=> 26,
            'email' => 'a.agoune@it-students.fr',
            'phone_number' => 0604040404
        ]);

        DB::table('interns')->insert([
            'firstname'=>'Orkun',
            'lastname'=>'Selçuk',
            'age'=> 35,
            'email' => 'o.selcuk@it-students.fr',
            'phone_number' => 0605050505
        ]);

        DB::table('interns')->insert([
            'firstname'=>'Lasmy',
            'lastname'=>'Rathipanya',
            'age'=> 31,
            'email' => 'l.rathipanya@it-students.fr',
            'phone_number' => 0606060606
        ]);
    }
}
