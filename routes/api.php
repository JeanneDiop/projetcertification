<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TarificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   // return $request->user();
//});




Route::get('/login', function(){
    return response()->json([
        'error' => 'Unauthenticated', 
    ], 401);
})->name('login');
// Tous les users peuvent se connecter 
Route::group(['middleware' => 'api'], function ($router) {
Route::post('logout', [AuthController::class, 'logout']);
// Route::post('refresh', [AuthController::class, 'refresh']);
  
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
//ajouter Categorie
Route::post('categorie/create', [CategorieController::class, 'store']);
//modifier categorie
Route::put('categorie/edit/{id}', [CategorieController::class, 'update']);


//ajouter Produit
Route::post('produit/create', [ProduitController::class, 'store']);
 //modifier un  Produit
Route::put('produit/edit/{id}', [ProduitController::class, 'edit']);
  //supprimer un produit
Route::delete('produit/supprimer/{id}', [ProduitController::class, 'destroy']);
   //lister les produits
Route::get('produit/lister', [ProduitController::class, 'index']);
//afficher un produit
Route::get('produit/detail/{id}', [ProduitController::class, 'show']);


//ajouter Tarification
Route::post('tarification/create', [TarificationController::class, 'store']);
//modifier un  Tarification
 Route::put('tarification/edit/{id}', [TarificationController::class, 'edit']);
//supprimer un tarification
Route::delete('tarification/supprimer/{id}', [TarificationController::class, 'destroy']);
//lister les tarifications
Route::get('tarification/lister', [TarificationController::class, 'index']);
//afficher un tarification
Route::get('tarification/detail/{id}', [TarificationController::class, 'show']);


//ajouter Achat
Route::post('achat/create', [AchatController::class, 'store']);
//modifier  achat
 Route::put('achat/edit/{id}', [AchatController::class, 'edit']);
//supprimer  achat
Route::delete('achat/supprimer/{id}', [AchatController::class, 'destroy']);
//lister les achats
Route::get('achat/lister', [AchatController::class, 'index']);
//afficher achat
Route::get('achat/detail/{id}', [AchatController::class, 'show']);