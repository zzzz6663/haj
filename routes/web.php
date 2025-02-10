<?php

use App\Models\Access;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\KarevanController;
use App\Http\Controllers\admin\ManagerController;
use App\Http\Controllers\admin\PassengerController;
use App\Http\Controllers\admin\CollectionController;
use App\Http\Controllers\admin\CommissionController;
use App\Http\Controllers\admin\ProvincialAgentController;
use App\Http\Controllers\admin\ProvincialSupervisorController;


Route::resource('note', NoteController::class);
Route::get('/passenger_info/{user}', [HomeController::class, "passenger_info"])->name('passenger.info') ->middleware('signed');
Route::post('/get_calandar/{room}', [HomeController::class, "get_calandar"]);
Route::post('/get_city/{province}', [HomeController::class, "get_city"]);
Route::get('/clear', [HomeController::class, "clear"])->name('clear');
Route::get('/lo', [HomeController::class, "lo"])->name('lo');
Route::get('/login', [HomeController::class, "login"])->name('login');
Route::post('/check_code', [HomeController::class, "check_code"])->name('check.code');
Route::any('/mobile_login', [HomeController::class, "mobile_login"])->name('mobile.login');
Route::any('/register', [HomeController::class, "register"])->name('register');
Route::get('/logout', [HomeController::class, "logout"])->name('logout');
Route::get('/redirect', [HomeController::class, "redirect"])->name('redirect');
Route::post('/remove_img/{image}', [HomeController::class, "remove_img"])->name('remove.img');
Route::any('/get_reserve', [HomeController::class, "get_reserve"])->name('get.reserve');
Route::get('/update', [HomeController::class, "update"])->name('update.page');
Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/about', [HomeController::class, "about"])->name('about');
Route::get('/contact', [HomeController::class, "contact"])->name('contact');
Route::prefix('admin')->group(function () {
    Route::any('/forget_password', [AdminController::class, "forget_password"])->name('forget.password');
    Route::get('/login', [AdminController::class, "login"])->name('admin.login');
    Route::post('/check_login', [AdminController::class, "check_login"])->name('check.login');
});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/go_panel/{user}', [AdminController::class, "go_panel"])->name('go.panel')->middleware(["role:admin"]);;
    Route::post('/get_karevan/{province}', [AdminController::class, "get_karevan"]);
    Route::any('/reports', [PassengerController::class, "reports"])->name('reports')->middleware(["role:admin|manager|doctor|provincialSupervisor|provincialAgent"]);
    Route::any('/history_user/{user}', [PassengerController::class, "history_user"])->name('history.user')->middleware(["role:admin|manager|doctor|provincialSupervisor|provincialAgent"]);
    Route::any('/reset_user/{user}', [PassengerController::class, "reset_user"])->name('reset.user')->middleware(["role:admin|manager|doctor|provincialSupervisor|provincialAgent"]);
    Route::any('/exam_user/{user}', [PassengerController::class, "exam_user"])->name('exam.user')->middleware(["role:admin|manager|doctor|provincialSupervisor|provincialAgent"]);
    Route::post('/save_attr/{user}', [PassengerController::class, "save_attr"])->name('save.attr')->middleware(["role:doctor|admin"]);;
    Route::post('/save_testimage/{user}', [PassengerController::class, "save_testimage"])->name('save.testimage');
    Route::any('/update_psssenger_status/{user}', [PassengerController::class, "update_psssenger_status"])->name('update.psssenger.status');
    Route::any('/psssenger_commission_reslut/{user}', [PassengerController::class, "psssenger_commission_reslut"])->name('psssenger.commission.reslut');
    Route::any('/new_user_commission/{commission}', [CommissionController::class, "new_user_commission"])->name('new.user.commission');
    Route::any('/update_user_commission/{user}', [CommissionController::class, "update_user_commission"])->name('update.user.commission');
    Route::post('/remove_user_commission/{user}', [CommissionController::class, "remove_user_commission"])->name('remove.user.commission');
    Route::resource('user', UserController::class);
    Route::resource('passenger', PassengerController::class)->middleware(["role:admin|manager|doctor|provincialSupervisor|provincialAgent"]);;
    Route::resource('doctor', DoctorController::class)->middleware(["role:admin|manager"]);;;
    Route::resource('manager', ManagerController::class)->middleware(["role:admin"]);;;;
    Route::resource('commission', CommissionController::class);
    Route::resource('provincialSupervisor', ProvincialSupervisorController::class)->middleware(["role:admin|manager"]);;;;
    Route::resource('provincialAgent', ProvincialAgentController::class)->middleware(["role:admin|manager"]);;;;
    Route::resource('karevan', KarevanController::class)->middleware(["role:admin|manager"]);;;;;
    Route::resource('collection', CollectionController ::class);
    Route::get('/dashboard', [AdminController::class, "dashboard"])->name('dashboard.admin');
    Route::any('/imports', [AdminController::class, "imports"])->name('imports');
    Route::any('/profile', [AdminController::class, "profile"])->name('profile');
    Route::any('/rule', [AdminController::class, "rule"])->name('rule');
    Route::post('/change_doctor/{karevan}', [AdminController::class, "change_doctor"])->name('change.doctor');
    Route::post('/change_password', [AdminController::class, "change_password"])->name('change.password');
    Route::post('/change_karevan/{user}', [AdminController::class, "change_karevan"])->name('change.karevan');
    Route::any('/get_passenger', [AdminController::class, "get_passenger"])->name('get.passenger');
    Route::any('/get_drug', [AdminController::class, "get_drug"])->name('get.drug');
    Route::any('/add_drug/{user}', [AdminController::class, "add_drug"])->name('add.drug');
    Route::any('/remove_drug/{user}', [AdminController::class, "remove_drug"])->name('remove.drug');
    Route::any('/remove_testimage/{testimage}', [AdminController::class, "remove_testimage"])->name('remove.testimage');
});





