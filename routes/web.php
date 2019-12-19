<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
//Poner las acciones definidas por el programador antes del CRUD por defecto que monta Laravel
Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');
Route::resource('especialidades', 'EspecialidadController');

Route::resource('medicos', 'MedicoController');

Route::get('pacientes/indexCitasPorPaciente/{id}', 'CitaController@CitasPorPaciente')->name('pacientes.indexCitasPorPaciente');

Route::get('pacientes/pacientePorEspecialidad', 'PacienteController@pacientePorEspecialidad')->name('pacientes.pacientePorEspecialidad');

Route::resource('pacientes', 'PacienteController');

Route::resource('locations', 'LocationController');

Route::get('citas/citasPasadas', 'CitaController@citasPasadas')->name('citas.citasPasadas');

Route::resource('citas', 'CitaController');

Route::resource('enfermedades', 'EnfermedadController');

Route::resource('tratamientos', 'TratamientoController');

Route::resource('medicinas', 'MedicinaController');

Route::resource('medicaciones', 'MedicacionController');





Auth::routes();

Route::get('/home', 'HomeController@index');

