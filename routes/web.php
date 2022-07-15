<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



 Auth::routes();
 Route::view('noacesso','noacesso');

 Route::group(['middleware' =>'auth'], function(){
    Route::get('/user/perfil/{id}', 'UserController@perfil')->name('user.perfil');

    Route::get('/listar', [App\Http\Controllers\DashboardController::class, 'listar']);
    Route::get('/relatorio', [App\Http\Controllers\DashboardController::class, 'relatorio']);
    Route::any('/relatorio/search', [App\Http\Controllers\DashboardController::class, 'search'])->name('relatorio.search');


    Route::get('/relatorio/pdf', [App\Http\Controllers\DashboardController::class, 'listarpdf']);
    Route::get('/sendmail', [App\Http\Controllers\DashboardController::class, 'sendmail']);

 /*  Route::get('send-email-pdf', [PDFController::class, 'index']); */

     Route::group(['middleware'=>['protectedPageUserAdmin']],function(){

        Route::resource('area', 'UserGoupController');
    });

  /*    */

    Route::group(['middleware'=>['protectedPage']],function(){
        Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
    });


    Route::prefix('cadastro')->group(function () {

        Route::group(['middleware'=>['protectedPage']],function(){

            /* group */
            Route::resource('group', 'GroupController');
            Route::get('/group/delete/{id}', 'GroupController@delete')->name('group.delete');

              /* documents */
            Route::resource('document', 'DocumentController');
            Route::get('/document/delete/{id}', 'DocumentController@delete')->name('document.delete');

        /* gender */
            Route::resource('gender', 'GenderController');
            Route::get('gender/delete/{id}', 'GenderController@delete')->name('gender.delete');
        /* levels */
            Route::resource('level', 'LevelController');
            Route::get('level/delete/{id}', 'LevelController@delete')->name('level.delete');

        /* status */
            Route::resource('status', 'StatusController');
            Route::get('status/delete/{id}', 'StatusController@delete')->name('status.delete');

        /* pvc */
            Route::resource('pvc', 'PvcController');
            Route::get('pvc/delete/{id}', 'PvcController@delete')->name('pvc.delete');

        /* progress */
            Route::resource('progress', 'ProgressController');
            Route::get('progress/delete/{id}', 'ProgressController@delete')->name('progress.delete');

        /* police_ranks */
            Route::resource('rank', 'Police_rankController');
            Route::get('rank/delete/{id}', 'Police_rankController@delete')->name('police_rank.delete');

        /* Section */
            Route::resource('section', 'SectionController');
            Route::get('section/delete/{id}', 'Section@delete')->name('section.delete');

        /* department */
            Route::resource('department', 'DepartmentController');
            Route::get('Department/delete/{id}', 'DepartmentController@delete')->name('department.delete');

        /* Directions */
            Route::resource('direction', 'DirectionController');
            Route::get('direction/delete/{id}', 'DirectionController@delete')->name('direction.delete');


        /* permission */
            Route::resource('permission', 'PermissionController');
        /* manage_subjects */

            Route::resource('user', 'UserController');

            Route::get('user/delete/{id}', 'UserController@delete')->name('user.delete');
            
            Route::get('autocomplete', 'UserController@autocomplete')->name('autocomplete');

            Route::get('autocomplete', 'UserController@autocomplete')->name('autocomplete');

            /* Route::get('user/perfil/{id}', 'UserController@perfil')->name('user.perfil'); */

           /*  Route::get('user/view/{id}', 'UserController@userView')->name('user.view'); */

            Route::resource('floor', 'FloorController');
            Route::get('floor/delete/{id}', 'FloorController@delete')->name('floor.delete');

             });

             Route::get('visitor/criar', 'VisitorController@criar');/* ->name('visitor.index'); */


            Route::group(['middleware'=>['protectedPageUser']],function(){

                /* visitor */

            Route::resource('visitor', 'VisitorController');
            Route::get('visitor/delete/{id}', 'VisitorController@delete')->name('visitor.delete');

           

            Route::post('visitor/consulta', 'VisitorController@consulta')->name('visitor.consulta');

            Route::post('visitor/estrangeiro', 'VisitorController@getEstrangeiro')->name('visitor.estrangeiro');

            Route::get('visitor/criar', 'VisitorController@criar');/* ->name('visitor.index'); */


            Route::resource('manage_subject', 'Manage_subjectController');



            Route::get('manage_subject/delete/{id}', [App\Http\Controllers\Manage_subjectController::class, 'delete'])->name('manage_subject.delete');

            /* nacionality */

            Route::resource('nacionality', 'NacionalityController');

            Route::get('nacionality/delete/{id}', 'NacionalityController@destroy')->name('nacionality.destroy');
        });

        /* search */

        Route::post('manage_subject/search','Manage_subjectController@getUsers')->name("manage.searchUsers");

        Route::post('visitor/search','VisitorController@getVisitors')->name("visitor.searchUsers");

        Route::post('manage_subject/getvisitor','Manage_subjectController@getVisitors')->name("visitor.search");
        /* things */
        Route::resource('things','ThingController');
        Route::get('things/delete/{id}', 'ThingController@delete')->name('things.delete');

    });

 });


