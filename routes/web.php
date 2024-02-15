<?php

use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarketProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductHomeController;
use App\Http\Controllers\ProfileMerchantController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserDetalisController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\Admin\NewStoreController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\PointsAdminController;
use App\Http\Controllers\NotifyController;
use App\Models\notify;
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
Route::get('/admin/dashboard',[AdminController::class, 'AdminDashboard'])->middleware('auth')->name('admin.dashboard');

Route::controller(CategoryController::class)->middleware('auth')->group(function(){
    Route::get('/all/category', 'AllCategory')->name('all.category');
    Route::post('/store/category', 'StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
    Route::post('/update/category/{id}', 'UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');

});

Route::controller(AdminController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('merchant', 'AllMerchant')->name('all.merchant');

    Route::get('user', 'AllUser')->name('all.user');
    Route::post('DeleteUser', 'DeleteUser')->name('DeleteUser');
    Route::get('editUser/{id}', 'editUser')->name('editUser');
    Route::post('updateUser', 'updateUser')->name('updateUser');

    // Route::get('/delete/merchant/{id}', 'DeleteMerchant')->name('delete.merchant');
    // Route::post('/store/merchant', 'StoreMerchant')->name('store.merchant');
    // Route::post('/store/user', 'StoreUser')->name('store.user');
    Route::get('/changeStatus', 'changeStatus');

});

Route::controller(NewStoreController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('/registerStore', 'NewStoreView')->name('registerStore');
    Route::post('/createStore', 'create')->name('createStore');
    Route::get('/editStoreView/{id}', 'editStoreView')->name('editStoreView');
    Route::post('/updateStore', 'updateStore')->name('updateStore');
    Route::post('/deleteMerchant', 'deleteMerchant')->name('deleteMerchant');
});
Route::controller(RegisteredUserController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('/registerUserView', 'registerUserView')->name('registerUserView');
    Route::post('/registerUser', 'store')->name('registerUser');
});
Route::controller(ProductsController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('/allProducts', 'allProducts')->name('allProducts');
    Route::get('/editProudcts/{id}', 'editProudcts')->name('editProudcts');
    Route::get('/reviewProudcts/{id}', 'reviewProudcts')->name('reviewProudcts');
    Route::get('/reviewAllProudcts', 'reviewAllProudcts')->name('reviewAllProudcts');
    Route::post('/appendProduct', 'appendProduct')->name('appendProduct');
    Route::post('/unappendProduct', 'unappendProduct')->name('unappendProduct');
    Route::get('/acceptedProudcts', 'acceptedProudcts')->name('acceptedProudcts');
    Route::get('/rejectedProudcts', 'rejectedProudcts')->name('rejectedProudcts');
});

Route::controller(ChatController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('chatview', 'chatview')->name('chatview');
    Route::get('sendMail', 'sendMail')->name('sendMail');
    Route::get('checkUserCodeMail/{usercode}', 'checkUserCodeMail')->name('checkUserCodeMail');
    Route::post('sendMessage', 'sendMessage')->name('sendMessage');
});

Route::controller(PointsAdminController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('pointsOperations', 'pointsOperations')->name('pointsOperations');
    Route::get('addPoints', 'addPoints')->name('addPoints');
    Route::get('checkUserCode/{usercode}/{merchantId}', 'checkUserCode')->name('checkUserCode');
    Route::post('addUserPoints', 'addUserPoints')->name('addUserPoints');

});

Route::controller(NotifyController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('notifyList', 'notifyList')->name('notifyList');
    Route::get('sendNotify', 'sendNotify')->name('sendNotify');

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
    // points
    Route::get('UserPoints',[PointsController::class,'UserPoints'])->name('UserPoints');
    Route::get('checkUserCode/{usercode}',[PointsController::class,'checkUserCode'])->name('checkUserCode');
    Route::post('addUserPoints',[PointsController::class,'addUserPoints'])->name('addUserPoints');
    Route::get('exchangePointsView',[PointsController::class,'exchangePointsView'])->name('exchangePointsView');
    Route::post('exchangePoints',[PointsController::class,'exchangePoints'])->name('exchangePoints');
    Route::get('settingPoints',[PointsController::class,'settingPoints'])->name('settingPoints');


    // profile
    Route::get('editProfile', [ProfileMerchantController::class, 'edit'])->name('editProfile');
    Route::get('profileDetials', [UserDetalisController::class, 'profileDetials'])->name('profileDetials');
    Route::post('ProfileImage', [UserDetalisController::class, 'ProfileImage'])->name('ProfileImage');
    Route::post('CoverImage', [UserDetalisController::class, 'CoverImage'])->name('CoverImage');
    Route::post('updateSochial', [UserDetalisController::class, 'updateSochial'])->name('updateSochial');
    Route::post('updateBasicProfile', [UserDetalisController::class, 'updateBasicProfile'])->name('updateBasicProfile');


});


    // X Routes
Route::get('/product-details/{id}',[MerchantController::class,'ProductDetails']);
Route::get('MarketProfile/{id}',[MarketProfileController::class,'index'])->name('MarketProfile');
Route::get('/allNotify', [NotifyController::class,'allNotify'])->name('allNotify');



// users

Route::middleware('auth')->group(function () {
    Route::get('/', [ProductHomeController::class, 'index'])->name('/');
    Route::get('searchBar', [ProductHomeController::class, 'searchBar']);
    Route::get('/markAllReaded/{markedId}', [NotifyController::class, 'markAllReaded'])->name('markAllReaded');
    Route::get('/myPoints', [PointsController::class, 'myPoints'])->name('myPoints');

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
        'usercode'=>'11223355',
        'email'=>'addidas@addidas.com',
        'subtype'=>'user',
        'password'=>Hash::make('11223355'),
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
// Route::get('/{page}', [AdminController::class, 'index']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
