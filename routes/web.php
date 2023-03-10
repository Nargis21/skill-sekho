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
use App\Mail\ContactForm;
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

//contact form all route
Route::controller(ContactController::class)->group(function(){
    Route::get('/contact','contact')->name('contact');
    Route::post('/contact/form','contactForm')->name('contact.form');
});

//contact info admin all route
Route::controller(ContactController::class)->middleware('admin')->group(function(){
    Route::get('contact/info','contactInfo')->name('contact.info');
    Route::post('update/contact/info','updateContactInfo')->name('update.contact.info');
});

//order all route
Route::controller(OrderController::class)->middleware('auth')->group(function(){
    Route::get('checkout/{course_id}','checkout')->name('checkout');
    Route::post('place/order','placeOrder')->name('place.order');
    Route::get('my/courses','myCourses')->name('my.courses');
    Route::get('start/course/{course_name}','startCourse')->name('start.course');
    Route::get('/download/{course_name}','downloadFile')->name('download');
});

//admin order all route
Route::controller(OrderController::class)->middleware('admin')->group(function(){
    Route::get('pending/orders','pendingOrders')->name('pending.orders');
    Route::get('approve/order/{order_id}','approveOrder')->name('approve.order');
    Route::get('approved/orders','approvedOrders')->name('approved.orders');
    Route::get('trash/order/{order_id}','trashOrder')->name('trash.order');
    Route::get('trashed/orders','trashedOrders')->name('trashed.orders');
    Route::get('restore/order/{order_id}','restoreOrder')->name('restore.order');
    Route::get('online/students','onlineStudents')->name('online.students');
    Route::get('offline/students','offlineStudents')->name('offline.students');
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

// Route::get('logout', [UserController::class, 'destroy'])->middleware('auth')->name('logout');

//admin user all route
Route::controller(UserController::class)->middleware('superAdmin')->group(function(){
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
    Route::get('schedule','schedule')->name('schedule');
    Route::post('add/schedule','addSchedule')->name('add.schedule');
    Route::get('manage/schedule','manageSchedule')->name('manage.schedule');
    Route::get('delete/schedule/{id}','deleteSchedule')->name('delete.schedule');
    Route::get('edit/schedule/{id}','editSchedule')->name('edit.schedule');
    Route::post('update/schedule','updateSchedule')->name('update.schedule');
    Route::get('pdf/view/{id}','pdfView')->name('pdf.view');
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
