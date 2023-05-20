<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LitController;
use App\Http\Controllers\TabController;
use App\Http\Controllers\BlocController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\LigneBlocController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\LigneDossierController;
use App\Http\Controllers\DossierMedicalController;
use App\Http\Controllers\HospitalisationController;
use App\Http\Controllers\LigneMedecinBlocController;

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

/*Route::get('/home', function () {
    return view('home')->middleware(['auth'])->name('dashboard');;
});*/

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');


//professionnelVehicule
Route::get('professionnelVehiculeList', 'App\Http\Controllers\ProfessionnelVehiculeController@index')->name('professionnelVehiculeList');
Route::get('professionnelVehiculeAdd','App\Http\Controllers\ProfessionnelVehiculeController@create')->name('professionnelVehiculeAdd');
Route::post('professionnelVehicules/store', 'App\Http\Controllers\ProfessionnelVehiculeController@store')->name('professionnelVehiculeStore');
Route::get('/professionnelVehiculeList/{professionnelVehicule}/professionnelVehiculeEdit','App\Http\Controllers\ProfessionnelVehiculeController@edit')->name('professionnelVehiculeEdit');
Route::patch('/professionnelVehiculeList/{professionnelVehicule}', 'App\Http\Controllers\ProfessionnelVehiculeController@update')->name('professionnelVehiculeList.professionnelVehiculeUpdate');
Route::delete('/professionnelVehiculeList/{professionnelVehicule}', 'App\Http\Controllers\ProfessionnelVehiculeController@destroy')->name('professionnelVehiculeList.professionnelVehiculedestroy');
Route::get('professionnelVehiculeList/{id}', 'App\Http\Controllers\ProfessionnelVehiculeController@show')->name('professionnelVehicule.Show');

//usager
Route::get('usagerList', 'App\Http\Controllers\UsagerController@index')->name('usagerList');
Route::get('usagerAdd','App\Http\Controllers\UsagerController@create')->name('usagerAdd');
Route::post('usagers/store', 'App\Http\Controllers\UsagerController@store')->name('usagerStore');
Route::get('/usagerList/{usager}/usagerEdit','App\Http\Controllers\UsagerController@edit')->name('usagerEdit');
Route::patch('/usagerList/{usager}', 'App\Http\Controllers\UsagerController@update')->name('usagerList.usagerUpdate');
Route::delete('/usagerList/{usager}', 'App\Http\Controllers\UsagerController@destroy')->name('usagerList.usagerdestroy');
Route::get('usagerList/{id}', 'App\Http\Controllers\UsagerController@show')->name('usager.Show');


//Administrateur
Route::get('administrateurList', 'App\Http\Controllers\AdministrateursController@index')->name('administrateurList');
Route::get('administrateurAdd','App\Http\Controllers\AdministrateursController@create')->name('administrateurAdd');
Route::post('administrateurs/store', 'App\Http\Controllers\AdministrateursController@store')->name('administrateurStore');
Route::get('/administrateurList/{administrateur}/administrateurEdit','App\Http\Controllers\AdministrateursController@edit')->name('administrateurEdit');
Route::patch('/administrateurList/{administrateur}', 'App\Http\Controllers\AdministrateursController@update')->name('administrateurList.administrateurUpdate');
Route::delete('/administrateurList/{administrateur}', 'App\Http\Controllers\AdministrateursController@destroy')->name('administrateurList.administrateurdestroy');
Route::get('administrateurList/{id}', 'App\Http\Controllers\AdministrateursController@show')->name('administrateur.Show');

//TypeDemande
Route::get('typeDemandeList', 'App\Http\Controllers\TypeDemandeController@index')->name('typeDemandeList');

//Enrolement
Route::get('enrolementList', 'App\Http\Controllers\EnrolementController@index')->name('enrolementList');
Route::get('enrolementAdd','App\Http\Controllers\EnrolementController@create')->name('enrolementAdd');
Route::post('enrolements/store', 'App\Http\Controllers\EnrolementController@store')->name('enrolementStore');
Route::get('/enrolementList/{enrolement}/enrolementEdit','App\Http\Controllers\EnrolementController@edit')->name('enrolementEdit');
Route::patch('/enrolementList/{enrolement}', 'App\Http\Controllers\EnrolementController@update')->name('enrolementList.enrolementUpdate');
Route::delete('/enrolementList/{enrolement}', 'App\Http\Controllers\EnrolementController@destroy')->name('enrolementList.enrolementdestroy');
Route::get('enrolementList/{id}', 'App\Http\Controllers\EnrolementController@show')->name('enrolement.Show');

//Offre
Route::get('offreList', 'App\Http\Controllers\OffresController@index')->name('offreList');
Route::get('offreAdd','App\Http\Controllers\OffresController@create')->name('offreAdd');
Route::post('offres/store', 'App\Http\Controllers\OffresController@store')->name('offreStore');
Route::get('/offreList/{offre}/offreEdit','App\Http\Controllers\OffresController@edit')->name('offreEdit');
Route::patch('/offreList/{offre}', 'App\Http\Controllers\OffresController@update')->name('offreList.offreUpdate');
Route::delete('/offreList/{offre}', 'App\Http\Controllers\OffresController@destroy')->name('offreList.offredestroy');
Route::get('offreList/{id}', 'App\Http\Controllers\OffresController@show')->name('offre.Show');

//Demande
Route::get('demandeList', 'App\Http\Controllers\DemandeController@index')->name('demandeList');
Route::get('demandeAdd','App\Http\Controllers\DemandeController@create')->name('demandeAdd');
Route::post('demandes/store', 'App\Http\Controllers\DemandeController@store')->name('demandeStore');
Route::get('/demandeList/{demande}/demandeEdit','App\Http\Controllers\DemandeController@edit')->name('demandeEdit');
Route::patch('/demandeList/{demande}', 'App\Http\Controllers\DemandeController@update')->name('demandeList.demandeUpdate');
Route::delete('/demandeList/{demande}', 'App\Http\Controllers\DemandeController@destroy')->name('demandeList.demandedestroy');
Route::get('demandeList/{id}', 'App\Http\Controllers\DemandeController@show')->name('demande.Show');

//Garage
Route::get('garageList', 'App\Http\Controllers\GarageController@index')->name('garageList');
Route::get('garageAdd','App\Http\Controllers\GarageController@create')->name('garageAdd');
Route::post('garages/store', 'App\Http\Controllers\GarageController@store')->name('garageStore');
Route::get('/garageList/{garage}/garageEdit','App\Http\Controllers\GarageController@edit')->name('garageEdit');
Route::patch('/garageList/{garage}', 'App\Http\Controllers\GarageController@update')->name('garageList.garageUpdate');
Route::delete('/garageList/{garage}', 'App\Http\Controllers\GarageController@destroy')->name('garageList.garagedestroy');
Route::get('garageList/{id}', 'App\Http\Controllers\GarageController@show')->name('garage.Show');

//Note
Route::get('noterList', 'App\Http\Controllers\NoterController@index')->name('noterList');
Route::get('noterAdd','App\Http\Controllers\NoterController@create')->name('noterAdd');
Route::post('noters/store', 'App\Http\Controllers\NoterController@store')->name('noterStore');
Route::get('/noterList/{noter}/noterEdit','App\Http\Controllers\NoterController@edit')->name('noterEdit');
Route::patch('/noterList/{noter}', 'App\Http\Controllers\NoterController@update')->name('noterList.noterUpdate');
Route::delete('/noterList/{noter}', 'App\Http\Controllers\NoterController@destroy')->name('noterList.notedestroy');
Route::get('noterList/{id}', 'App\Http\Controllers\NoterController@show')->name('noter.Show');


Route::get('carte', 'App\Http\Controllers\CarteController@garage')->name('carte');
Route::get('fetch',[\App\Http\Controllers\CarteController::class,'fetch'])->name('fetch');
//Route::middleware(['auth','role:admin'])->group(function());
require __DIR__.'/auth.php';


