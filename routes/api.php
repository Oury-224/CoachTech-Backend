<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\DashboarController;
use App\Http\Controllers\API\CategorieController;
use App\Http\Controllers\API\CompetenceController;
use App\Http\Controllers\API\AuthentificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function($router) {
    Route::post('/v1/register', [AuthentificationController::class, 'register']);
    Route::post('/v1/login', [AuthentificationController::class, 'login']);
    Route::post('/v1/logout', [AuthentificationController::class, 'logout']);
    Route::post('/v1/refresh', [AuthentificationController::class, 'refresh']);
    Route::post('/v1/profile', [AuthentificationController::class, 'profile']);
});

/*
* les liens partants vers la partie utilisateur.
*/
Route::get('/v1/liste-user',[UserController::class,'index']);
Route::get('/v1/create-user',[UserController::class,'createuser']);
Route::post('/v1/create-user',[UserController::class,'add_user']);
Route::get('/v1/modifier-user/{id}',[UserController::class,'Modifier_user']);
Route::put('/v1/update-user/{id}',[UserController::class,'update_user']);
Route::delete('/v1/suppression-user/{id}',[UserController::class,'delete_user']);
Route::put('v1/etat-user/{id}',[UserController::class,'etatUser']);
Route::get('v1/modifier-password/{id}',[UserController::class,'ModifierPassword']);
Route::put('/v1/update-password/{id}',[UserController::class,'updatePassword']);
Route::get('/v1/create-user-competence/{id}',[UserController::class,'createUserCompetence']);
Route::post('/v1/add-user-competence/{id}',[UserController::class,'addUserCompetence']);
Route::get('/v1/detail-user/{id}',[UserController::class,'Detail_user']);
Route::get('v1/envoi-mail/{id}',[UserController::class,'envoiMailUser']);

/*
* les liens partants vers la partie categorie.
*/
Route::get('v1/liste-categorie',[CategorieController::class,'index']);
Route::get('v1/creation-catego',[CategorieController::class,'create_Cat']);
Route::post('v1/create-catego',[CategorieController::class,'add_Cat']);
Route::get('v1/modification-categorie/{id}',[CategorieController::class,'Modifier_Categorie']);
Route::put('v1/update-categorie/{id}',[CategorieController::class,'updateCategorie']);
Route::delete('v1/suppression-categorie/{id}',[CategorieController::class,'deleteCategorie']);

/*
* les liens partants vers la partie poste.
*/
Route::get('v1/poste',[PostController::class,'index']);
Route::get('v1/creation-poste',[PostController::class,'create_poste']);
Route::post('v1/create-poste',[PostController::class,'add_poste']);
Route::get('v1/modification-poste/{id}',[PostController::class,'Modifier_Poste']);
Route::put('v1/update-poste/{id}',[PostController::class,'updatePoste']);
Route::delete('v1/suppression-poste/{id}',[PostController::class,'deletePoste']);

/*
* les liens partants vers la partie commentaire.
*/
Route::get('v1/commentaires',[CommentController::class,'index']);
Route::get('v1/creation-comment',[CommentController::class,'create_comment']);
Route::post('v1/create-comment',[CommentController::class,'add_comment']);
Route::get('v1/modifier-comment/{id}',[CommentController::class,'Modifier_Comment']);
Route::put('v1/modifier-comment/{id}',[CommentController::class,'updateComment']);
Route::delete('v1/supprimer-comment/{id}',[CommentController::class,'deleteComment']);

/*
* les liens partants vers la partie competence.
*/
Route::get('v1/competences',[CompetenceController::class,'index']);
Route::get('v1/create-competence',[CompetenceController::class,'create_competence']);
Route::post('v1/add-competence',[CompetenceController::class,'add_competence']);
Route::get('v1/modification-competence/{id}',[CompetenceController::class,'ModifierCompetence']);
Route::put('v1/update-competence/{id}',[CompetenceController::class,'update_competence']);
Route::delete('v1/suppression-competence/{id}',[CompetenceController::class,'deleteCompetence']);

/*
* les liens partants vers la partie dashboard.
*/
Route::get('/v1/home',[DashboarController::class,'__invoke']);

/*
* les liens partants vers la partie home.
*/
Route::post('/v1/login-user',[HomeController::class,'login']);
Route::get('/v1/logout',[HomeController::class,'logout']);
