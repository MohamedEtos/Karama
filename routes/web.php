<?php

use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MerchantController;

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

//Admin Routes
Route::get('/admin/dashboard',[AdminController::class, 'AdminDashboard'])->name('admin.dashboard');


Route::get('addadmin',function(){

    User::create([
        'name'=>'محمد محروس',
        'usercode'=>'11223344',
        'phone_number'=>'01033441143',
        'email'=>'admin@admin.com',
        'subtype'=>'admin',
        'password'=>Hash::make('11223344'),
    ]);


    category::create([
        'name'=>'ملابس ',
        'descrption'=>'ملابس رجالي'
    ]);
    category::create([
        'name'=>'سيارات ',
        'descrption'=>'قطع غيار'
    ]);
    category::create([
        'name'=>'عطور ',
        'descrption'=>'عطور نسائيه'
    ]);

    return redirect('merchant/merchant');

});



// merchant

Route::prefix('merchant')->middleware('auth')->group(function () {

    Route::get('merchant',[MerchantController::class, 'index'])->name('merchant');
    Route::get('new-product',[MerchantController::class, 'show'])->name('new-product');
    Route::get('list-product',[MerchantController::class, 'edit'])->name('list-product');
    Route::post('store_product',[MerchantController::class, 'store'])->name('store_product');
    Route::post('destroy',[MerchantController::class,'destroy'])->name('destroy');
    Route::get('edit-product/{id}',[MerchantController::class,'update'])->name('edit-product');

});
Route::get('/product-details/{id}',[MerchantController::class,'ProductDetails']);




Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('products');
    });

});

// users

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//theme
Route::get('/{page}', [AdminController::class, 'index']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');