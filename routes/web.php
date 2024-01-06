<?php

use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarketProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductHomeController;
use App\Http\Controllers\ProfileMerchantController;
use App\Http\Controllers\UserDetalisController;
use App\Http\Controllers\NewStoreController;
use App\Models\userDetalis;
use Illuminate\Support\Facades\Auth;

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

Route::controller(AdminController::class)->prefix('admin')->group(function(){
    Route::get('/all/merchant', 'AllMerchant')->name('all.merchant');
    Route::get('/all/user', 'AllUser')->name('all.user');
    Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
    Route::get('/delete/merchant/{id}', 'DeleteMerchant')->name('delete.merchant');
    Route::post('/store/merchant', 'StoreMerchant')->name('store.merchant');
    Route::post('/store/user', 'StoreUser')->name('store.user');
    Route::get('/changeStatus', 'changeStatus');
    Route::get('/registerStore', 'NewStore')->name('registerStore');
    Route::get('/registerUser', 'NewUser')->name('registerUser');


});

Route::controller(NewStoreController::class)->prefix('admin')->group(function(){
    Route::get('/registerStore', 'NewStoreView')->name('registerStore');
    Route::post('/createStore', 'create')->name('createStore');
    Route::get('/registerUser', 'NewUser')->name('registerUser');


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
    Route::get('editProfile',[MerchantController::class,'previewProduct'])->name('preview-product');


    // profile 
    Route::get('editProfile', [ProfileMerchantController::class, 'edit'])->name('editProfile');
    Route::get('profileDetials', [UserDetalisController::class, 'profileDetials'])->name('profileDetials');
    Route::post('ProfileImage', [UserDetalisController::class, 'ProfileImage'])->name('ProfileImage');
    Route::post('CoverImage', [UserDetalisController::class, 'CoverImage'])->name('CoverImage');
    Route::post('updateSochial', [UserDetalisController::class, 'updateSochial'])->name('updateSochial');
    Route::post('updateBasicProfile', [UserDetalisController::class, 'updateBasicProfile'])->name('updateBasicProfile');

    
});
Route::get('/product-details/{id}',[MerchantController::class,'ProductDetails']);
Route::get('MarketProfile/{id}',[MarketProfileController::class,'index'])->name('MarketProfile');



// users

Route::middleware('auth')->group(function () {
    Route::get('/', [ProductHomeController::class, 'index'])->name('/');
    Route::get('searchBar', [ProductHomeController::class, 'searchBar']);

    // Route::get('/', function () {
    //     return view('products');
    // });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';






Route::get('addadmin',function(){




    userDetalis::create([
        'phone'=>'01033441143',
        'whatsapp'=>'01033441143',
        'facebook'=>'https://www.facebook.com/mohamed.etos/',
        'website'=>'www.Karama-SC.com',
        'location'=>'11 ش خالد بن الوليد المنيب الجيزه ',
        'bio'=>'اداياس هو متجر للملابس الرياضيه وخاص بكل جديد في عالم الملابس والموضه ',
        'ProfileImage'=>'test',
        'nationalId'=>'12345678911',
    ]);

    User::create([
        'name'=>'محمد محروس',
        'usercode'=>'11223344',
        'email'=>'admin@admin.com',
        'subtype'=>'admin',
        'password'=>Hash::make('11223344'),
        'userDetalis'=>1,   
    ]);

    userDetalis::create([
        'phone'=>'011011011',
        'whatsapp'=>'011011011',
        'facebook'=>'https://www.facebook.com/addidas.etos/',
        'website'=>'www.Karama-SC.com',
        'location'=>'11 ش خالد بن الوليد المنيب الجيزه ',
        'bio'=>'اداياس هو متجر للملابس الرياضيه وخاص بكل جديد في عالم الملابس والموضه ',
        'ProfileImage'=>'test',
        'nationalId'=>'12345678911',
    ]);

    User::create([
        'name'=>'addidas',
        'usercode'=>'1122334455',
        'email'=>'addidas@addidas.com',
        'subtype'=>'admin',
        'password'=>Hash::make('1122334455'),
        'userDetalis'=>2,   
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

// theme
Route::get('/{page}', [AdminController::class, 'index']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');