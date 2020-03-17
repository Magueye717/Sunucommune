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

Auth::routes();

//Route::get('/', 'HomeController@index');
//Portail
Route::get('/', 'Portail\PortailController@index')->name('portail.index');
Route::get('/article/search', 'Portail\PortailController@search')->name('portail.search');
Route::get('/info-commune', 'Portail\PortailController@info')->name('portail.info');
Route::get('/actualite', 'Portail\PortailController@actualite')->name('portail.actualite');
Route::get('/details/{id}', 'Portail\PortailController@details_actualite')->name('portail.actualites-details');
Route::get('/team/{id}', 'Portail\PortailController@cabinetDetail')->name('portail.cabinet');
/* Route::get('/team', 'Portail\PortailController@cabinetDetail')->name('portail.cabinet'); */

/*Participation citoyenne*/
Route::get('/citoyenne', 'Portail\ParticipationController@index')->name('participation.index');

/*Panel citoyenne*/
Route::get('/panel-citoyenne', 'Portail\ParticipationController@panel')->name('participation.panel');
Route::get('/panels-thematiques/{id}', 'Portail\ParticipationController@panelThematiques')->name('panel.thematiques');
Route::get('/panel-details/{id}', 'Portail\ParticipationController@panelDetails')->name('panel.details');

/*Sondage citoyenne*/
Route::get('/sondage-citoyenne', 'Portail\ParticipationController@sondage')->name('participation.sondage');
Route::get('/sondages-thematiques/{id}', 'Portail\ParticipationController@sondageThematiques')->name('sondage.thematiques');
Route::get('/sondage-details/{id}', 'Portail\ParticipationController@sondageDetails')->name('sondage.details');

//Procedure administrative
Route::get('/procedureUsager', 'Portail\ProcedureController@index')->name('procedure.index');
Route::get('/procedure-page/{id}', 'Portail\ProcedureController@events')->name('procedure.events');
Route::get('/procedure-details/{id}', 'Portail\ProcedureController@details')->name('procedure.details');


Route::get('/accueil', 'HomeController@index')->name('accueil');
Route::get('/home', 'HomeController@index')->name('home');

/* Espace admin */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@admin']);
    Route::resource('/users', 'UserController');
    Route::resource('/roles', 'RoleController')->except('show');
    Route::resource('/permissions', 'PermissionController')->only('index', 'edit', 'update');
});

Route::get('/dashboard', ['as' => 'gestion.dashboard', 'uses' => 'DashboardController@index']);

Route::resource('/infos', 'Commune\CommuneInfoController');
Route::patch('/historique/{id}', 'Commune\CommuneInfoController@updateHistorique')->name('historiques.update');
Route::resource('infos.ancien-maires', 'Commune\AncienMaireController')->except('index', 'show');
//Ajout elmoth
Route::resource('ancien-maires', 'Commune\AncienMaireController');
Route::resource('/partenaires', 'Commune\PartenaireController');
Route::resource('/membre-cabinets', 'Commune\MembreCabinetController');
Route::post('/membre-cabinets/reseau', 'Commune\MembreCabinetController@storeReseau')->name('reseau_social.store');
Route::resource('/articles', 'Commune\ArticleController');
Route::put('/articles/{id}/publication', 'Commune\ArticleController@publication')->name('articles.publication');
Route::get('/articles/deliberation/{id}', 'Portail\PortailController@document')->name('articles.document');
Route::resource('/mediatheques', 'Commune\MediathequeController');
Route::put('/mediatheques/{id}/publication', 'Commune\MediathequeController@publication')->name('mediatheques.publication');
Route::resource('/agendas', 'Commune\AgendaController');

/* Espace participation */
Route::prefix('participation')->group(function () {
    Route::namespace('Participation')->group(function () {
        Route::resource('/cadres', 'CadreConcertationController');
        Route::resource('/panels', 'PanelController');
        Route::put('/panels/{id}/valider', 'PanelController@valider')->name('panels.valider');
        Route::resource('/commentaires', 'PanelCommentaireController')->except('store');
        Route::post('commentaires','PanelCommentaireController@store')->name('commentaires.store');
        /* Route::put('/commentaires/{id}/valider', 'PanelCommentairesController@valider')->name('commentaires.valider'); */
        Route::post('/membre_cadres', 'CadreConcertationController@storeMembre')->name('membre_cadres.store');
        Route::resource('/sondages', 'SondageController');
        Route::put('/sondages/{id}/publication', 'SondageController@publication')->name('sondages.publication');

        Route::resource('/membre_cadress', 'MembreCadreController');
        Route::post('/fetch', 'CadreConcertationController@fetch')->name('collectivites.fetch');
        Route::resource('/thematiques', 'ThematiqueController');
    });
});


Route::prefix('ressources_humaines')->group(function (){
    Route::namespace('Rh')->group(function () {
        Route::resource('/agents', 'AgentController');
        Route::resource('/contrats', 'ContratController');
        Route::resource('/historique-contrats', 'HistoriqueContratController');
        Route::resource('/conges', 'CongeController');
    });
});

Route::prefix('procedures')->group(function (){
    Route::namespace('GestionProcedure')->group(function () {
        Route::resource('/categories', 'CategorieController');
        Route::resource('/procedures', 'ProcedureController');
        Route::put('/procedures/{id}/valider', 'ProcedureController@valider')->name('procedures.valider');
        Route::resource('/procedure-pieces', 'ProcedurePieceController');
        Route::resource('/usagers', 'ProcedureUsagerController');
    });
});
Route::prefix('infrastructures')->group(function (){
    Route::namespace('GestionInfrastructure')->group(function () {
        Route::resource('/ressources', 'RessourceController');
    });
});

/* Autres routes */
Route::get('/mon-profil', 'HomeController@showProfile')->name('mon.profil');
Route::get('/edit-profil', 'HomeController@showFormProfile')->name('edit.profile');
Route::post('/edit-profil', 'HomeController@editProfile')->name('edit.my.profile');
Route::get('/reset-password', 'HomeController@showFormPwd')->name('reset.password');
Route::post('/reset-password', 'HomeController@changePassword')->name('reset.my.password');
Route::get('/change-avatar', 'HomeController@showFormAvatar')->name('change.avatar');
Route::post('/change-avatar', 'HomeController@changeAvatar')->name('change.my.avatar');
