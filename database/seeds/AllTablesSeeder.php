<?php

use App\Course;
use App\Group;
use App\Lecture;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AllTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear our database ------------------------------------------
        DB::table('courses')->delete();
        DB::table('files')->delete();
        DB::table('groups')->delete();
        DB::table('groups_users')->delete();
        DB::table('lectures')->delete();
        DB::table('users')->delete();

        // seed our users table -----------------------

        $jonas = User::create([
            'type'         => '1',
            'name'         => 'jonas',
            'surname'      => 'jonaitis',
            'email'        => 'jonaitis@gmail.com',
            'password'     => Hash::make('secret')
        ]);

        $agne = User::create([
            'type'         => '1',
            'name'         => 'agne',
            'surname'      => 'agnaite',
            'email'        => 'agne@gmail.com',
            'password'     => Hash::make('secret')
        ]);

        $petras = User::create([
            'type'         => '2',
            'name'         => 'petras',
            'surname'      => 'petraitis',
            'email'        => 'petraitis@gmail.com',
            'password'     => Hash::make('secret')
        ]);

        $algis = User::create([
            'type'         => '2',
            'name'         => 'algis',
            'surname'      => 'algaitis',
            'email'        => 'algis@gmail.com',
            'password'     => Hash::make('secret')
        ]);

        $diana = User::create([
            'type'         => '2',
            'name'         => 'diana',
            'surname'      => 'vix',
            'email'        => 'diana@gmail.com',
            'password'     => Hash::make('secret')
        ]);

        $oksana = User::create([
            'type'         => '2',
            'name'         => 'oksana',
            'surname'      => 'binkevic',
            'email'        => 'oksana@gmail.com',
            'password'     => Hash::make('secret')
        ]);

        $this->command->info('users are alive!');

        // seed our courses table ------------------------

        $html = Course::create([
            'name'  => 'HTML',
            'description'  => 'HTML kursas'
        ]);

        $php = Course::create([
            'name'  => 'PHP',
            'description'  => 'php kursas'
        ]);

        $java = Course::create([
            'name'  => 'Java',
            'description'  => 'java kursas'
        ]);

        $ux_ui = Course::create([
            'name'  => 'UX-UI',
            'description'  => 'ux kursas'
        ]);

        $this->command->info('courses are alive!');


// seed our groups table ------------------------

        $grupe_1 = Group::create([
            'course_id'      => $html->id,
            'user_id'        => $jonas->id,
            'name'           => 'grupe1',
            'start_at'       => '2018-05-25',
            'end_at'         => '2018-06-01'
        ]);

        $grupe_2 = Group::create([
            'course_id'       => $java->id,
            'user_id'         => $agne->id,
            'name'            => 'grupe2',
            'start_at'        => '2018-06-25',
            'end_at'          => '2018-06-31'
        ]);

        $this->command->info('groups are alive!');


        // seed our lectures table ------------------------

        $paskaita1 = Lecture::create([
            'group_id'    => $grupe_1->id,
            'date'        => '2018-07-01',
            'name'        => 'html pradmenys',
            'description' => 'Pradine html paskaita, isvedimo budai'
        ]);

        $paskaita2 = Lecture::create([
            'group_id'    => $grupe_1->id,
            'date'        => '2018-07-02',
            'name'        => 'html pritaikymas',
            'description' => 'naudojimas ir atvaizdavimas naršyklėse'
        ]);

        $paskaita3 = Lecture::create([
            'group_id'    => $grupe_1->id,
            'date'        => '2018-08-02',
            'name'        => 'css',
            'description' => 'naudojimas ir pasiekiamumas'
        ]);

        $this->command->info('lectures are alive!');

// link our students to groups ---------------------

        $petras->students()->attach($grupe_1->id);
        $algis->students()->attach($grupe_1->id);

        $this->command->info('Students terrorizing groups!');
    }
}
