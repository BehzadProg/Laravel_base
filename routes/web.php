<?php

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Database\Factories\CategoryFactory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    echo "this is home page";
});


Route::get('/contact-to-us' , [ContactController::class , 'index']) -> name('contact');
Route::get('/about' , [AboutController::class , 'index']);
Route::get('/category/all' , [CategoryController::class , 'AllCat']) -> name('category.all');
Route::post('/category/add' , [CategoryController::class , 'AddCat']) -> name('storage.category');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User :: all(); // showing data from database in elequent orm procedure
        // $users = DB :: table('users')->get(); // showing data from database in query builder procedure
        return view('dashboard', compact('users'));
    })->name('dashboard');
});

Route::get('/profile/me',function (){
    $profiles = Profile::latest()->get();
    return view('admin.profile.index',compact('profiles'));
})->name('profile');

Route::get('/category/all',function(){
    // return CategoryFactory::new()->create();
    return Category::factory()->create();
});
