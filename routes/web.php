<?php

use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

Route::controller(CategoryController::class)->group(function(){
    Route::get('/all/category', 'AllCategory')->name('all.category');
    Route::post('/store/category', 'StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
    Route::post('/update/category/{id}', 'UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');

});

Route::controller(AdminController::class)->group(function(){
    Route::get('/all/merchant', 'AllMerchant')->name('all.merchant');
    Route::get('/all/user', 'AllUser')->name('all.user');
    Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
    Route::get('/delete/merchant/{id}', 'DeleteMerchant')->name('delete.merchant');
    Route::post('/store/merchant', 'StoreMerchant')->name('store.merchant');
    Route::post('/store/user', 'StoreUser')->name('store.user');
    Route::get('/changeStatus', 'changeStatus');


});



// merchant

Route::prefix('merchant')->middleware('auth')->group(function () {

    Route::get('merchant',[MerchantController::class, 'index'])->name('merchant');
    Route::get('new-product',[MerchantController::class, 'show'])->name('new-product');
    Route::get('list-product',[MerchantController::class, 'edit'])->name('list-product');
    Route::post('store_product',[MerchantController::class, 'store'])->name('store_product');
    Route::post('update_product/{id}',[MerchantController::class, 'update'])->name('update_product');
    Route::post('destroy',[MerchantController::class,'destroy'])->name('destroy');
    Route::get('edit-product/{id}',[MerchantController::class,'show_update'])->name('edit-product');
    Route::get('preview-product/{id}',[MerchantController::class,'previewProduct'])->name('preview-product');

});
Route::get('/product-details/{id}',[MerchantController::class,'ProductDetails']);



// users

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('products');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





Route::get('addadmin',function(){

    User::create([
        'name'=>'محمد محروس',
        'usercode'=>'11223344',
        'phone_number'=>'01033441143',
        'email'=>'admin@admin.com',
        'subtype'=>'admin',
        'password'=>Hash::make('11223344'),
    ]);
    User::create([
        'name'=>'yassen ',
        'usercode'=>'1122334455',
        'phone_number'=>'01017373391',
        'email'=>'user@user.com',
        'subtype'=>'user',
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

//theme
Route::get('/{page}', [AdminController::class, 'index']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');