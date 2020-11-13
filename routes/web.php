<?php

use App\Http\Controllers\PaisController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;


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

Route::view('home', 'home')->middleware('auth');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/fullcalendar','EventoController@index')->name('EventoController.index')->middleware('auth');
Route::get('/fullcalendar', [EventoController::class, 'index'])->name('EventoController.index')->middleware('auth');
Route::get('/eventos', [EventoController::class, 'get_event_data'])->name('dataEvent')->middleware('auth');
Route::get('/addevent', [EventoController::class, 'view'])->name('Calendar.view')->middleware('auth');
Route::post('/addevent', [EventoController::class, 'Store'])->name('Calendar.store')->middleware('auth');
Route::delete('/addevent/{id}', [EventoController::class, 'destroy'])->name('Calendar.destroy')->middleware('auth');
Route::get('/addevent/{id}/edit', [EventoController::class, 'update'])->name('Calendar.update')->middleware('auth');

//geolocalization country routes
// Route::get('/fullcountry', 'PaisController@index')->name('PaisController.index');
Route::get('/fullcountry', [PaisController::class, 'index'])->name('PaisController.index')->middleware('auth');
Route::get('/paises', [PaisController::class, 'get_country_data'])->name('dataPais')->middleware('auth');
Route::get('/addcountry', [PaisController::class, 'view'])->name('Country.view')->middleware('auth');
Route::post('/addcountry', [PaisController::class, 'Store'])->name('Country.store')->middleware('auth');
Route::delete('/addcountry/{id}', [PaisController::class, 'destroy'])->name('Country.destroy')->middleware('auth');
Route::get('/addcountry/{id}/edit', [PaisController::class, 'update'])->name('Country.update')->middleware('auth');
Route::post('/updCountry', [PaisController::class, 'updateCountry'])->name('Country.updCountry')->middleware('auth');

//geolocalization departments routes
// Route::get('/fulldepartments', 'DepartamentoController@index')->name('DepartamentoController.index');
Route::get('/fulldepartments', [DepartamentoController::class, 'index'])->name('DepartamentoController.index')->middleware('auth');
Route::get('/departments', [DepartamentoController::class, 'get_departments_data'])->name('dataDepartamento')->middleware('auth');
Route::get('/adddepartments', [DepartamentoController::class, 'view'])->name('Departaments.view')->middleware('auth');
Route::post('/adddepartments', [DepartamentoController::class, 'Store'])->name('Departaments.store')->middleware('auth');
Route::delete('/adddepartments/{id}', [DepartamentoController::class, 'destroy'])->name('Departaments.destroy')->middleware('auth');
Route::get('/adddepartments/{id}/edit', [DepartamentoController::class, 'update'])->name('Departaments.update')->middleware('auth');
Route::post('/upddepartments', [DepartamentoController::class, 'updateDepartment'])->name('Departaments.updCountry')->middleware('auth');

Route::get('/fullSelectCountry', [SearchController::class, 'get_Paises'])->name('SearchController.getPaises')->middleware('auth');


//geolocalization cities routes
// Route::get('/fullCities', 'MunicipioController@index')->name('MunicipioController.index');
Route::get('/fullCities', [MunicipioController::class, 'index'])->name('MunicipioController.index')->middleware('auth');
Route::get('/cities', [MunicipioController::class, 'get_cities_data'])->name('dataMunicipio')->middleware('auth');
Route::get('/addCities', [MunicipioController::class, 'view'])->name('Municipios.view')->middleware('auth');
Route::post('/addCities', [MunicipioController::class, 'Store'])->name('Municipios.store')->middleware('auth');
Route::delete('/addCities/{id}', [MunicipioController::class, 'destroy'])->name('Municipios.destroy')->middleware('auth');
Route::get('/addCities/{id}/edit', [MunicipioController::class, 'update'])->name('Municipios.update')->middleware('auth');
Route::post('/updCities', [MunicipioController::class, 'updateCity'])->name('Municipios.updCountry')->middleware('auth');

Route::get('/fullSelectCities', [SearchController::class, 'get_Cities'])->name('SearchController.getCities')->middleware('auth');

//usuarios perfil routes
// Route::get('/fullPerfils', 'UsuarioController@index')->name('UsuarioController.index');
Route::get('/fullPerfiles', [UsuarioController::class, 'index'])->name('UsuarioController.index')->middleware('auth');
Route::get('/perfiles', [UsuarioController::class, 'get_perfiles_data'])->name('dataPerfiles')->middleware('auth');
Route::get('/addPerfiles', [UsuarioController::class, 'view'])->name('Perfiles.view')->middleware('auth');
Route::post('/addPerfiles', [UsuarioController::class, 'Store'])->name('Perfiles.store')->middleware('auth');
Route::delete('/addPerfiles/{id}', [UsuarioController::class, 'destroy'])->name('Perfiles.destroy')->middleware('auth');
Route::get('/addPerfiles/{id}/edit', [UsuarioController::class, 'update'])->name('Perfiles.update')->middleware('auth');
Route::post('/updPerfiles', [UsuarioController::class, 'updatePerfil'])->name('Perfiles.updCountry')->middleware('auth');


// selcts for user
Route::get('/fullSelectTypeId', [SearchController::class, 'get_Type_Id'])->name('SearchController.getTypeId')->middleware('auth');
Route::get('/fullState', [SearchController::class, 'get_State'])->name('SearchController.getState')->middleware('auth');
Route::get('/fullSex', [SearchController::class, 'get_Sex'])->name('SearchController.getSex')->middleware('auth');
Route::get('/fullBloodType', [SearchController::class, 'get_Blood_Type'])->name('SearchController.getBloodType')->middleware('auth');
Route::get('/fullFactorType', [SearchController::class, 'get_Factor_Type'])->name('SearchController.getFactorType')->middleware('auth');
Route::get('/fullCivilStatus', [SearchController::class, 'get_Civil_Status'])->name('SearchController.getCivilStatus')->middleware('auth');
Route::get('/fullWorkRelated', [SearchController::class, 'get_Work_Related'])->name('SearchController.getWorkRelated')->middleware('auth');
Route::get('/fullImpairment', [SearchController::class, 'get_Impairment'])->name('SearchController.getImpairment')->middleware('auth');
Route::get('/fullTypeImpairment', [SearchController::class, 'get_Type_Impairment'])->name('SearchController.getTypeImpairment')->middleware('auth');
Route::get('/fullEthnicGroup', [SearchController::class, 'get_Ethnic_Group'])->name('SearchController.getEthnicGroupt')->middleware('auth');
