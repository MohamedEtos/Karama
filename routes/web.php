<?php

use App\Models\User;
use App\Models\notify;
use App\Models\category;
use App\Models\userDetalis;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManagersControllers;
use App\Http\Controllers\ProductHomeController;
use App\Http\Controllers\UserDetalisController;
use App\Http\Controllers\MarketProfileController;
use App\Http\Controllers\Admin\NewStoreController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\ProfileMerchantController;
use App\Http\Controllers\Admin\PointsAdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\UserDetalisAdminController;



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

Route::controller(ManagersControllers::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('AddMangers',  'AddMangers')->name('AddMangers');
    Route::get('ViewMangers',  'ViewMangers')->name('ViewMangers');
    Route::get('editMangerView/{id}',  'editMangerView')->name('editMangerView');
    Route::post('updateManger',  'updateManger')->name('updateManger');
    Route::post('storeMangers',  'storeMangers')->name('storeMangers');
    Route::post('removeManger',  'removeManger')->name('removeManger');

});




Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);
});

//profile

Route::controller(UserDetalisAdminController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('editProfile',  'edit')->name('editProfile');
    Route::get('profileDetialsAdmin',  'profileDetials')->name('profileDetialsAdmin');
    Route::post('ProfileImageAdmin',  'ProfileImage')->name('ProfileImageAdmin');
    Route::post('CoverImageAdmin',  'CoverImage')->name('CoverImageAdmin');
    Route::post('updateSochialAdmin',  'updateSochial')->name('updateSochialAdmin');
    Route::post('updateBasicProfileAdmin',  'updateBasicProfile')->name('updateBasicProfileAdmin');
});





Route::controller(CategoryController::class)->middleware('auth')->group(function(){
    Route::get('/all/category', 'AllCategory')->name('all.category');
    Route::get('all/getCategoryAjax/{id}', 'getCategoryAjax')->name('getCategoryAjax');
    Route::post('all/subCatUpdate', 'subCatUpdate')->name('subCatUpdate');
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
    Route::get('/getCategoryAjax/{id}', 'getCategoryAjax')->name('getCategoryAjax');

});
Route::controller(RegisteredUserController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('/registerUserView', 'registerUserView')->name('registerUserView');
    Route::post('/registerUser', 'store')->name('registerUser');
});
Route::controller(ProductsController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('/allProducts', 'allProducts')->name('allProducts');
    Route::get('/editProudcts/{id}', 'editProudcts')->name('editProudcts');
    Route::post('/updateprduct', 'updateprduct')->name('updateprduct');
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
    Route::get('getUserChat/{id}', 'getUserChat')->name('getUserChat');

});

Route::controller(PointsAdminController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('pointsOperations', 'pointsOperations')->name('pointsOperations');
    Route::get('addPoints', 'addPoints')->name('addPoints');
    Route::get('checkUserCode/{usercode}/{merchantId}', 'checkUserCode')->name('checkUserCode');
    Route::post('addUserPoints', 'addUserPoints')->name('addUserPoints');
    Route::get('pointSetting', 'pointSetting')->name('pointSetting');

});

Route::controller(NotifyController::class)->middleware('auth')->prefix('admin')->group(function(){
    Route::get('notifyList', 'notifyList')->name('notifyList');
    Route::post('sendNotifyAjax', 'sendNotifyAjax')->name('sendNotifyAjax');
    Route::get('sendNotify', 'sendNotify')->name('sendNotify');
    Route::get('sendMail', 'sendMail')->name('sendMail');
    Route::get('validOTP', 'validOTP')->name('validOTP');
    Route::get('unvalidOTP', 'unvalidOTP')->name('unvalidOTP');

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
    Route::get('checkUserCodeAddPoints/{usercode}',[PointsController::class,'checkUserCodeAddPoints'])->name('checkUserCodeAddPoints');
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
    Route::get('products', [ProductHomeController::class, 'products'])->name('products');
    Route::get('searchBar', [ProductHomeController::class, 'searchBar']);
    Route::post('filterSearch', [ProductHomeController::class, 'filterSearch']);
    Route::POST('markAllReadedAjax', [NotifyController::class, 'markAllReadedAjax'])->name('markAllReadedAjax');
    Route::get('/myPoints', [PointsController::class, 'myPoints'])->name('myPoints');

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('empty', [AdminController::class, 'empty'])->name('empty');
});

require __DIR__.'/auth.php';








// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
