<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\{Level, Gender, Visitor, Nacionality, Pvc, Progress, Police_rank, Status, Document, Direction, Floor, Department, Group, Section, User};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);

        //$this->call(NacionalityTableSeeder::class);

        /*  DB::table('levels')->insert([
                'name' => 'superadmin'
        ]); */

        Level::create(['name' => 'superadmin']);
        Level::create(['name' => 'admin']);
        Level::create(['name' => 'useradmin']);
        Level::create(['name' => 'user']);

        /* gender */
        Gender::create(['name' => 'Femenino']);
        Gender::create(['name' => 'Masculino']);

        /* Floor */

        Floor::create(['name' => '4º Andar']);
        Floor::create(['name' => '3º Andar']);
        Floor::create(['name' => '2º Andar']);
        Floor::create(['name' => '1º Andar']);
        Floor::create(['name' => 'Rés-do-chão']);



        /* Nacionality */
        Nacionality::create(['name' => 'Portugal']);
        Nacionality::create(['name' => 'Angola']);
        Nacionality::create(['name' => 'Brasil']);
        Nacionality::create(['name' => 'Libia']);
        Nacionality::create(['name' => 'Estonia']);
        Nacionality::create(['name' => 'Liberia']);
        Nacionality::create(['name' => 'Estados Unidos da America']);



        /* Pvc */

        Pvc::create(['number_pvc' => '001']);
        Pvc::create(['number_pvc' => '002']);
        Pvc::create(['number_pvc' => '003']);
        Pvc::create(['number_pvc' => '004']);
        Pvc::create(['number_pvc' => '005']);



        Progress::create(['name' => 'Pendente']);
        Progress::create(['name' => 'Aprovado']);
        Progress::create(['name' => 'Recusado']);



        Document::create(['name' => 'Passporte']);
        Document::create(['name' => 'Carta de conducao']);
        Document::create(['name' => 'Bilhete de Identidade']);
        Document::create(['name' => 'Passe de servico']);



        Police_rank::create(['name' => 'Agente de 3º classe']);
        Police_rank::create(['name' => 'Sub-inspector']);
        Police_rank::create(['name' => 'Intendente']);
        Police_rank::create(['name' => 'Comissario']);



        Status::create(['name' => 'Activo']);
        Status::create(['name' => 'Inactivo']);


        /* visitor */
        Visitor::create([
            'name' => 'Mohamed akhil',
            'birthday' =>  "08-08-1989",
            'image' => '',
            'doc_number' => '0321LA03',
            'doc_emition' => '02-03-2020',
            'affiliation' => 'samir akhil',
            'phone_number' => '925858489',
            'gender_id' => '1',
            'nacionality_id' => '3',
            'document_id' => '2',
        ]);


        Visitor::create([
            'name' => 'lira assis',
            'birthday' =>  "08-08-1990",
            'image' => '',
            'doc_number' => '0321LA001',
            'doc_emition' => '02-03-2020',
            'affiliation' => 'carlos assis',
            'phone_number' => '925858401',
            'gender_id' => '2',
            'nacionality_id' => '6',
            'document_id' => '3',
        ]);


        Visitor::create([
            'name' => 'Chris coelho',
            'birthday' =>  "08-08-1989",
            'image' => '',
            'doc_number' => '0321LA004',
            'doc_emition' => '02-03-2020',
            'affiliation' => 'paulo coelho',
            'phone_number' => '925858404',
            'gender_id' => '2',
            'nacionality_id' => '5',
            'document_id' => '1',
        ]);


        Visitor::create([
            'name' => 'Fernando nunes',
            'birthday' =>  "08-08-1989",
            'image' => '',
            'doc_number' => '0321LA05',
            'doc_emition' => '02-03-2020',
            'affiliation' => 'augusto nunes',
            'phone_number' => '925858406',
            'gender_id' => '1',
            'nacionality_id' => '7',
            'document_id' => '2',
        ]);

        Visitor::create([
            'name' => 'Edgar Manuel',
            'birthday' =>  "08-08-1989",
            'image' => '',
            'doc_number' => '0321LA09',
            'doc_emition' => '02-03-2020',
            'affiliation' => 'Domingos mussumar',
            'phone_number' => '925858477',
            'gender_id' => '1',
            'nacionality_id' => '3',
            'document_id' => '2',
        ]);


        /* groups */

        Group::create([

            'name' => 'DTI',
        ]);

        Group::create([

            'name' => 'RH',
        ]);
        Group::create([

            'name' => 'DAM',
        ]);
        Group::create([

            'name' => 'PGR',
        ]);
        Group::create([

            'name' => 'GEIA',
        ]);
        Group::create([

            'name' => 'SECR.GERAL',
        ]);


        Direction::create(
            [

                'name' => 'Estrangeiros',
                'extention' =>  "987",
                'floor_id' => '1',
                'group_id' => '1',


            ]
        );

        Direction::create([
            'name' => 'Maritima',
            'extention' =>  "787",
            'floor_id' => '2',
            'group_id' => '2',

        ]);

        Direction::create([
            'name' => 'Fronteiras',
            'extention' =>  "387",
            'floor_id' => '3',
            'group_id' => '4',

        ]);
        Direction::create([

            'name' => 'DTI',
            'extention' =>  "5987",
            'floor_id' => '4',
            'group_id' => '5',

        ]);
        Direction::create([

            'name' => 'HR',
            'extention' =>  "5989",
            'floor_id' => '5',
            'group_id' => '5',

        ]);





        Department::create([

            'name' => 'Desenvolvimento',
            'extention' =>  "201",
            'direction_id' => '4',
            'floor_id' => '3',
            'group_id' => '1',

        ]);

        Department::create([

            'name' => 'analises',
            'extention' =>  "202",
            'direction_id' => '4',
            'floor_id' => '2',
            'group_id' => '2',

        ]);

        Department::create([

            'name' => 'Secretariado',
            'extention' =>  "203",
            'direction_id' => '4',
            'floor_id' => '4',
            'group_id' => '3',

        ]);

        Department::create([

            'name' => 'manutencoes',
            'extention' =>  "204",
            'direction_id' => '4',
            'floor_id' => '1',
            'group_id' => '4',

        ]);

        /* section */

        Section::create([

            'name' => 'design',
            'department_id' => '1',
            'extention' =>  "102",
            'floor_id' => '1',
            'group_id' => '1',


        ]);

        Section::create([

            'name' => 'area 10',
            'department_id' => '2',
            'extention' =>  "103",
            'floor_id' => '2',
            'group_id' => '2',

        ]);

        Section::create([

            'name' => 'Pincel',
            'department_id' => '3',
            'extention' =>  "104",
            'floor_id' => '3',
            'group_id' => '3',

        ]);

        Section::create([

            'name' => 'agrafos',

            'department_id' => '3',
            'extention' =>  "105",
            'floor_id' => '5',
            'group_id' => '4',


        ]);

        /* fims section */



        /* user */

        User::create([

            'name' => 'Austin Edmar',
            'birthday' =>  "08-08-1989",
            'phone_number' => '9238512501',
            'police_rank_id' => '1',
            'level_id' => '1',
            'direction_id' => '1',
            'gender_id' => '1',
            'status_id' => '1',
            'group_id' => '1',
            'floor_id' => '1',
            'email' => 'domingosmussumar@gmail.com',
            'password' => Hash::make('923.eddy')

        ]);


        User::create([

            'name' => 'Wilsom',
            'birthday' =>  "08-08-1989",
            'phone_number' => '9238512502',
            'police_rank_id' => '2',
            'level_id' => '3',
            'direction_id' => '1',
            'gender_id' => '1',
            'status_id' => '1',
            'group_id' => '2',
            'floor_id' => '2',
            'email' => 'wilsom@gmail.com',
            'password' => Hash::make('923.eddy')

        ]);


        User::create([

            'name' => 'Felgueiras silva',
            'birthday' =>  "08-08-1989",
            'phone_number' => '9238512503',
            'police_rank_id' => '3',
            'level_id' => '1',
            'direction_id' => '1',
            'gender_id' => '1',
            'status_id' => '1',
            'group_id' => '3',
            'floor_id' => '3',
            'email' => 'felgueiras@gmail.com',
            'password' => Hash::make('923.eddy')

        ]);

        User::create([

            'name' => 'Dombaxi',
            'birthday' =>  "08-08-1989",
            'phone_number' => '9238512504',
            'police_rank_id' => '3',
            'level_id' => '3',
            'direction_id' => '1',
            'gender_id' => '1',
            'status_id' => '1',
            'group_id' => '4',
            'floor_id' => '4',
            'email' => 'dombaxi@gmail.com',
            'password' => Hash::make('923.eddy')

        ]);


        User::create([

            'name' => 'Esmeralda luis',
            'birthday' =>  "08-08-1989",
            'phone_number' => '9238512506',
            'police_rank_id' => '3',

            'level_id' => '1',

            'department_id' => '1',
            'gender_id' => '2',
            'status_id' => '1',
            'group_id' => '5',
            'floor_id' => '5',

            'email' => 'esmeralda@gmail.com',
            'password' => Hash::make('923.eddy')

        ]);

        User::create([

            'name' => 'Paulo Tondolo',
            'birthday' =>  "08-08-1989",
            'phone_number' => '9238512597',
            'police_rank_id' => '3',
            'level_id' => '1',

            'department_id' => '1',
            'gender_id' => '1',
            'status_id' => '1',
            'group_id' => '6',
            'floor_id' => '4',

            'email' => 'paulo@gmail.com',
            'password' => Hash::make('923.eddy')

        ]);


        /* fim users */
    }
}
