<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\navbarController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\partaiController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\crudPartaiController;
use App\Http\Controllers\tambahPartaiController;
use App\Http\Controllers\sejarahController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\kontenController;
use App\Http\Controllers\crudKontenController;
use App\Http\Controllers\tambahKontenController;
use App\Http\Controllers\mapController;
use App\Http\Controllers\crudTPSController;
use App\Http\Controllers\tambahTPSController;
use App\Http\Controllers\crudSejarahController;
use App\Http\Controllers\tambahSejarahController;
use App\Http\Controllers\viewController;
use App\Http\Controllers\registrasiController;
use App\Http\Controllers\navbarAdminController;
use App\Http\Controllers\crudUserController;
use App\Http\Controllers\passwordController;
use App\Http\Controllers\editPartaiController;
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

//navbar Controller
Route::get('navbar', [navbarController::class, 'index']);

//navbarAdmin Controller
Route::get('navbarAdmin', [navbarAdminController::class, 'index']);

//home Controller
Route::get('/', function () {
    return view('home');
});
Route::get('home', [homeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

//dashboard Controller
Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth')->name('dashboard');

//partai Controller
Route::get('partai', [partaiController::class, 'index']);
Route::get('partai', [partaiController::class, 'tampildata']);
Route::get('getdatapartai/{id}', [partaiController::class, 'getdatapartai'])->name('getdatapartai');
Route::get('/partai', [PartaiController::class, 'index'])->name('partai');

//crudPartai Controller
Route::get('crudPartai', [crudPartaiController::class, 'index'])->name('crudPartai');
Route::get('crudPartai', [crudPartaiController::class, 'tampildata']);
Route::post('insertdata', [crudPartaiController::class, 'insertdata']);
Route::get('getdata/{id}', [crudPartaiController::class, 'getdata'])->name('getdata');
Route::post('updatedata/{id}', [crudPartaiController::class, 'updatedata'])->name('updatedata');
Route::get('deletedata/{id}', [crudPartaiController::class, 'deletedata'])->name('deletedata');
Route::get('filterdata', [crudPartaiController::class, 'filterdata'])->name('filterdata');

//tambahPartai Controller
Route::get('tambahPartai', [tambahPartaiController::class, 'index']);

//sejarah Controller
Route::get('sejarah', [sejarahController::class, 'index']);
Route::get('/sejarah', [SejarahController::class, 'index'])->name('sejarah');

//crudSejarah Controller
Route::get('crudsejarah', [crudSejarahController::class, 'index']);
Route::get('crudsejarah', [crudSejarahController::class, 'tampildatasejarah']);
Route::post('insertdatasejarah', [crudSejarahController::class, 'insertdatasejarah']);
Route::get('getdatasejarah/{id}', [crudSejarahController::class, 'getdatasejarah'])->name('getdatasejarah');
Route::post('updatedatasejarah/{id}', [crudSejarahController::class, 'updatedatasejarah'])->name('updatedatasejarah');
Route::get('deletedatasejarah/{id}', [crudSejarahController::class, 'deletedatasejarah'])->name('deletedatasejarah');

//tambahSejarah Controller
Route::get('tambahSejarah', [tambahSejarahController::class, 'index']);

//map Controller
Route::get('map', [mapController::class, 'index']);
Route::get('map', [mapController::class, 'getTps']);

//crudTPS Controller
Route::get('crudTPS', [crudTPSController::class, 'index']);
Route::get('crudTPS', [crudTPSController::class, 'tampildataTPS']);
Route::post('insertdataTPS', [crudTPSController::class, 'insertdataTPS']);
Route::get('getdataTPS/{id}', [crudTPSController::class, 'getdataTPS'])->name('getdataTPS');
Route::post('updatedataTPS/{id}', [crudTPSController::class, 'updatedataTPS'])->name('updatedataTPS');
Route::get('deletedataTPS/{id}', [crudTPSController::class, 'deletedataTPS'])->name('deletedataTPS');

//tambahTPS Controller
Route::get('tambahTPS', [tambahTPSController::class, 'index']);

//konten Controller
Route::get('konten', [kontenController::class, 'index']);
Route::get('konten', [kontenController::class, 'showdata']);

//crudKonten Controller
Route::get('crudKonten', [crudKontenController::class, 'index']);
Route::get('crudKonten', [crudKontenController::class, 'tampildatakonten']);
Route::post('insertdatakonten', [crudKontenController::class, 'insertdatakonten']);
Route::get('getdatakonten/{id}', [crudKontenController::class, 'getdatakonten'])->name('getdatakonten');
Route::post('updatedatakonten/{id}', [crudKontenController::class, 'updatedatakonten'])->name('updatedatakonten');
Route::get('deletedatakonten/{id}', [crudKontenController::class, 'deletedatakonten'])->name('deletedatakonten');

//tambahKonten Controller
Route::get('tambahKonten', [tambahKontenController::class, 'index']);

//view Controller
Route::get('view', [viewController::class, 'index']);

//login Controller
Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/postLogin', [loginController::class, 'postLogin'])->name('postLogin');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
Route::post('postlogin', [loginController::class, 'postlogin']);
Route::post('/user/{id}/activate', [loginController::class, 'activateUser'])->name('activate.user');
Route::post('/user/{id}/deactivate', [loginController::class, 'deactivateUser'])->name('deactivate.user');

//registrasi Controller
Route::get('/registrasi', [registrasiController::class, 'index'])->name('registrasi');
Route::post('/insertdataregister', [registrasiController::class, 'insertdataregister'])->name('insertdataregister');

//crudUser Controller
Route::get('crudUser', [crudUserController::class, 'index']);
Route::get('/crudUser', [crudUserController::class, 'tampildatauser'])->name('tampildatauser');
Route::get('/deletedatauser/{id}', [crudUserController::class, 'deletedatauser'])->name('deletedatauser');

//password Controller
Route::get('/password', [passwordController::class, 'index'])->name('password.index');
Route::post('/password/update', [passwordController::class, 'updatePassword'])->name('password.update');

//      Auth Middleware     //
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route for search by name Calon
Route::post('/searchByName', [crudPartaiController::class, 'searchByName'])->name('searchByName');

// Route for search by name Konten
Route::post('/searchByNameKonten', [crudKontenController::class, 'searchByNameKonten'])->name('searchByNameKonten');

// Route for search by alamat TPS
Route::post('/search', [crudTPSController::class, 'search'])->name('search');

// Filter for sejarah by Tahun Pemilu
Route::post('/searchByTahun', [crudSejarahController::class, 'searchByTahun'])->name('searchByTahun');

// Route for search by nama user
Route::post('/searchByUser', [crudUserController::class, 'searchByUser'])->name('searchByUser');

// Route for filter by partai
Route::get('/crudPartai/filterByPartai', [crudPartaiController::class, 'filterByPartai'])->name('filterByPartai');

// For Edit Page
Route::get('/crudPartai', [crudPartaiController::class, 'index'])->name('crudPartai');
Route::get('/crudkonten', [crudKontenController::class, 'index'])->name('crudkonten');
Route::get('/crudTPS', [crudTPSController::class, 'index'])->name('crudTPS');
Route::get('/crudsejarah', [crudSejarahController::class, 'index'])->name('crudsejarah');

Route::post('/search', [crudTPSController::class, 'search'])->name('search');


