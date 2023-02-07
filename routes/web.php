<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\Home\SliderController;
use App\Http\Controllers\OrderController;
use GuzzleHttp\Psr7\Request;

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
    return view('frontend.index');
});
Route::get('/home', function () {
    return view('frontend.index');
});

//contact all route
Route::controller(ContactController::class)->group(function(){
    Route::get('/contact','contact')->name('contact');
    Route::post('/contact/form','contactForm')->name('contact.form');
});

//order all route
Route::controller(OrderController::class)->middleware('auth')->group(function(){
    Route::get('checkout/{course_id}','checkout')->name('checkout');
    Route::post('place/order','placeOrder')->name('place.order');
    Route::get('my/courses','myCourses')->name('my.courses');
    Route::get('start/course/{course_name}','startCourse')->name('start.course');
});

//admin order all route
Route::controller(OrderController::class)->middleware('admin')->group(function(){
    Route::get('pending/orders','pendingOrders')->name('pending.orders');
    Route::get('approve/order/{order_id}','approveOrder')->name('approve.order');
    Route::get('approved/orders','approvedOrders')->name('approved.orders');
    Route::get('trash/order/{order_id}','trashOrder')->name('trash.order');
    Route::get('trashed/orders','trashedOrders')->name('trashed.orders');
    Route::get('restore/order/{order_id}','restoreOrder')->name('restore.order');
});

//course all route
Route::controller(CourseController::class)->group(function(){
    Route::get('courses/all','allCourses')->name('all.courses');
    Route::get('courses/{category_name}','showCourses')->name('show.courses');
    Route::get('course/{course_id}','courseDetails')->name('course.details');
});


//User all route
Route::controller(UserController::class)->middleware('auth')->group(function(){
    Route::get('logout','destroy')->name('logout');
    Route::get('user/profile','profile')->name('profile');
    Route::get('edit/profile','editProfile')->name('edit.profile');
    Route::post('store/profile','storeProfile')->name('store.profile');
    Route::get('user/changePassword','changePassword')->name('changePassword');
    Route::post('user/updatePassword','updatePassword')->name('updatePassword');
});

//admin user all route
Route::controller(UserController::class)->middleware('admin')->group(function(){
    Route::get('users','users')->name('users');
    Route::get('make/admin/{user_id}','makeAdmin')->name('make.admin');
    Route::get('remove/admin/{user_id}','removeAdmin')->name('remove.admin');
});

//Home banner admin all route
Route::prefix('home')->controller(BannerController::class)->middleware('admin')->group(function(){
    Route::get('/banner','homeBanner')->name('home.banner');
    Route::post('/banner/update','updateBanner')->name('update.banner');
});

// Home Slider all route
Route::prefix('home')->controller(SliderController::class)->middleware('admin')->group(function(){
    Route::get('/slider/content','sliderContent')->name('slider.content');
    Route::get('/slider/content/edit/{slider_id}','sliderContentEdit')->name('slider.content.edit');
    Route::post('/slider/content/update','sliderContentUpdate')->name('slider.content.update');
    Route::get('/slider/images','sliderImages')->name('slider.images');
    Route::get('/slider/image/edit/{slider_id}','sliderImageEdit')->name('slider.image.edit');
    Route::post('/slider/image/update','sliderImageUpdate')->name('slider.image.update');
});

//Category admin all route
Route::controller(CategoryController::class)->middleware('admin')->group(function(){
    Route::get('category','category')->name('category');
    Route::post('add/category','addCategory')->name('add.category');
    Route::get('manage/category','manageCategory')->name('manage.category');
    Route::get('delete/category/{id}','deleteCategory')->name('delete.category');
    Route::get('edit/category/{id}','editCategory')->name('edit.category');
    Route::post('update/category','updateCategory')->name('update.category');
    Route::get('deactivate/category/{id}','deactivateCategory')->name('deactivate.category');
    Route::get('activate/category/{id}','activateCategory')->name('activate.category');
});

//Course Admin all route
Route::controller(CourseController::class)->middleware('admin')->group(function(){
    Route::get('course','course')->name('course');
    Route::post('add/course','addCourse')->name('add.course');
    Route::get('manage/course','manageCourse')->name('manage.course');
    Route::get('delete/course/{id}','deleteCourse')->name('delete.course');
    Route::get('edit/course/{id}','editCourse')->name('edit.course');
    Route::post('update/course','updateCourse')->name('update.course');
    Route::get('deactivate/course/{id}','deactivateCourse')->name('deactivate.course');
    Route::get('activate/course/{id}','activateCourse')->name('activate.course');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
