<?php

use App\Models\Post;
use App\Models\User;
use App\Models\comment;
use App\Models\categorie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompetenceController;

/*
|-----------------------------------------------------------------------------------------------------------------------------
| Web Routes
|-----------------------------------------------------------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('login', function () {
//     return view('login');
// });


Route::middleware(['auth'])->group(function () {
/*
*la route qui fait appel au tableau de bord
*/
    Route::get('/home',[DashboarController::class,'__invoke'])->name('home');

/*
*la partie qui concerne les utilisateurs.
*/
    Route::get('/template/utilisateurs', [UserController::class,'index'])->name('lisUser');
    Route::get('/template/createUser', [UserController::class,'create_user'])->name('CreateUser');
    Route::post('/template/create_user', [UserController::class,'add_user'])->name('Create_user');
    Route::get('/template/modification_user/{id}', [UserController::class,'Modifier_user'])->name('ModifierUser');
    Route::post('/template/update_user/{id}', [UserController::class,'update_user'])->name('UpdateUser');
    Route::get('/template/suppression_user/{id}', [UserController::class,'delete_user'])->name('delete_user');
    Route::get('/template/etat_user/{id}/{etat}',[UserController::class,'etatUser'])->name('etat_user');
    Route::get('/template/ModifierPassword/{id}', [UserController::class,'ModifierPassword'])->name('ModifierPassword');
    Route::post('/template/updatePassword/{id}', [UserController::class,'updatePassword'])->name('updatePassword');
    Route::get('/template/create_user_competence/{id}', [UserController::class,'createUserCompetence'])->name('create_user_competence');
    Route::post('/template/addUserCompetence/{id}', [UserController::class,'addUserCompetence'])->name('addUserCompetence');
    Route::get('/template/Detail_user/{id}', [UserController::class,'Detail_user'])->name('details_user');

/*
* la route qui permet d'envoyer le mail.
*/
    Route::get('/EnvoiMail/{id}',[UserController::class,'envoiMailUser'])->name('envoiMailUser');
/*
*la partie qui concerne les compétences.
*/
    Route::get('/template/competences',[CompetenceController::class,'index'])->name('listCompetence');
    Route::get('/template/createCompetence', [CompetenceController::class,'create_competence'])->name('CreateCompetene');
    Route::get('/template/modificationCompetence/{id}', [CompetenceController::class,'ModifierCompetence'])->name('ModifierCompetence');
    Route::get('/template/suppressionCompetence/{id}', [CompetenceController::class,'deleteCompetence'])->name('SuppressionCompetence');
    Route::post('/template/addCompetence', [CompetenceController::class,'add_competence'])->name('add_competence');
    Route::post('/template/updateCompetence/{id}', [CompetenceController::class,'update_competence'])->name('update_competence');
/*
*la partie qui concerne la categorie
*/
    Route::get('/template/categorie', [CategorieController::class,'index'])->name('categorie');
    Route::get('/template/creationCatego', [CategorieController::class,'create_Cat'])->name('CreateCate');
    Route::post('/template/createCatego', [CategorieController::class,'add_Cat'])->name('addCate');
    Route::get('/template/modificationCategorie/{id}', [CategorieController::class,'Modifier_Categorie'])->name('ModifierCateg');
    Route::post('/template/updateCategorie/{id}', [CategorieController::class,'updateCategorie'])->name('UpdateCategorie');
    Route::get('/template/suppressionCategorie/{id}', [CategorieController::class,'deleteCategorie'])->name('deleteCategorie');

/*
*la partie qui concerne la partie poste.
*/
    Route::get('/template/poste', [PostController::class,'index']) -> name('ListPoste');
    Route::get('/template/creationPoste', [PostController::class,'create_poste']) -> name('create_poste');
    Route::post('/template/createPoste', [PostController::class,'add_poste']) -> name('add_poste');
    Route::get('/template/modificationPoste/{id}', [PostController::class,'Modifier_Poste']) -> name('ModifierPoste');
    Route::post('/template/updatePoste/{id}', [PostController::class,'updatePoste']) -> name('update_poste');
    Route::get('/template/suppressionPoste/{id}', [PostController::class,'deletePoste']) -> name('SuppressionPoste');

/*
*voici la partie qui concerne les commentaires.
*/
    Route::get('/template/commentaires',[CommentController::class,'index']) -> name('lisCom');
    Route::get('/template/creationComment', [CommentController::class,'create_comment']) -> name('Create_commen');
    Route::post('/template/createComment', [CommentController::class,'add_comment']) -> name('add_comment');
    Route::get('/template/modifierComment/{id}', [CommentController::class,'Modifier_Comment']) -> name('ModifierComment');
    Route::post('/template/modifierComment/{id}', [CommentController::class,'updateComment']) -> name('updateComment');
    Route::get('/template/supprimerComment/{id}', [CommentController::class,'deleteComment']) -> name('SuppressionComment');
});




/*
* la connection d'utilisateur.
*/
Route::post('/loginUser', [LoginController::class,'login']) -> name('Authentification');
Route::get('/logout', [LoginController::class,'logout']) -> name('logout');
Auth::routes();


