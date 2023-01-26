<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaytmController;
use App\Http\Controllers\PlacementController;
use App\Models\Payments;
use App\Models\Paytm;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Route;
use App\Models\Placement;
use App\Models\Course;

Route::get('/v2', function () {
    return view('layouts.publicBase');
});

// Route::get("/",[HomeController::class,"home"])->name('homepage');

Route::get('/contact-us', function () {
    return view('public.contact');
})->name('contact');

// Route::get("/courses",[HomeController::class,"courses"])->name('courses');

// Route::get("/apply",[HomeController::class,"apply"])->name('apply');

Route::get("/response",[HomeController::class,"response"])->name('response');
Route::get("/view-course/{course}",[HomeController::class,"viewCourse"])->name('viewCourse');

Route::post('/apply',[AdminController::class,'addStudent'])->name('apply.addmission');

Route::get('/pay-dues', function () {
    return view('public.pay_dues');
})->name('dues');

Route::get('/get-dues', function () {
    $contact = $_GET['q'];

    if($contact == null){
        return redirect()->route('dues');
    }
    $data['user'] = $user = User::where('contact',$contact)->get();
    if($user->count() == 0){
        toast('Record not found please check your number or contact us..', 'error');
        return redirect()->back();
    }
    $data['dues'] = Payments::where('student_id',$user[0]->id)->get();
    return view('public.v2.online-payment',$data);
    // return view('public.pay_dues',$data);
})->name('get.dues');

Route::get('/check/{pay_id}', function ($payment_id) {
    $data['data'] = Payments::where('id',$payment_id)->first();
    return view('public.receipt',$data);
});

Route::get('generate-pdf/{payment_id}', function($payment_id){

    $data['data'] = Payments::where('id',$payment_id)->first();

    $pdf = PDF::loadView('public.receipt', $data);

    $date = new DateTime($data['data']->payment_date);
    $pay_date =  $date->format('d M Y');

    return $pdf->download($data['data']->student->name."$pay_date".'.pdf');
})->name('generate.pdf');

Route::get('/contact', function () {
    return view('public.contact');
});

Route::post('/paytm',[PaytmController::class,'pay'])->name('paytm.payment');
Route::post('/paytm-callback',[PaytmController::class,'paytmcallback'])->name('paytm.callback');

Route::get('/add-placements',[PlacementController::class,'add'])->name('add.placement');
Route::post('/add-placements',[PlacementController::class,'store'])->name('store.placement');

// v2 design
Route::get('/', function () {
    $data['placements'] = Placement::where('status',true)->get();
    $data['courses'] = Course::where('status',true)->get();
    return view('public.v2.index',$data);
})->name('homepage');

Route::get('/apply', function () {
    return view('public.v2.apply');
})->name('apply');
    
Route::get('/payment', function () {
    return view('public.v2.online-payment');
})->name('payment');

Route::get('/courses', function () {
    $data['courses'] = Course::where('status',true)->get();
    return view('public.v2.course',$data);
})->name('courses');


Route::prefix('v2')->group(function () {

    Route::get('/gallery', function () {
        return view('public.v2.gallery');
    })->name('gallery');

});
    
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::post('/image_upload', [AdminController::class,"upload"])->name('upload');
    
    // Route::resource('course', CourseController::class);
    
    Route::get('/',[AdminController::class,'index'] )->name('admin.dashboard');

    Route::get('/courses',[CourseController::class,'courses'])->name('admin.courses');
    Route::get('/delete-course/{course_id}',[CourseController::class,'delete'])->name('admin.courses.delete');

    Route::get('/add-course',[CourseController::class,'addCourse'])->name('admin.add.course');
    Route::post('/add-course',[CourseController::class,'store'])->name('admin.store.course');

    Route::get('/edit-course/{course_id}',[CourseController::class,'editCouse'])->name('admin.edit.course.view');
    Route::post('/edit-course',[CourseController::class,'edit'])->name('admin.edit.course');

    Route::get('/new-admission',[AdminController::class,'new_addmission'])->name('new.addmissions');
    Route::get('/student/approve/{id}',[AdminController::class,'approve'])->name('admin.student.approve');
    Route::get("/student/disabled/{id}",[AdminController::class, "disabled"])->name('admin.student.disabled');
    Route::get('/students/{id}/remove',[AdminController::class,'removeStudent'])->name('admin.students.remove');

    Route::get('/students',[AdminController::class,'students'])->name('students');
    Route::get('/add-student', function () {
        return view('admin.add_student');
    })->name('add.student.view');
    
    // Route::post('/add-student',[AdminController::class,'addStudent'])->name('add.student');

    Route::get('/dues',[AdminController::class,'dues_payments'])->name('dues.payments');
    Route::get('/paid',[AdminController::class,'paid_payments'])->name('paid.payments');
    Route::post('update-dues-amount',[AdminController::class,'updateDuesAmount'])->name('update.dues.amount');

    Route::post('/payment/pay', [AdminController::class,'pay_dues'])->name('set.payment.paid');
    Route::post('/payment/unpaid', [AdminController::class,'unpaid'])->name('set.payment.unpaid');

    Route::post('/send-sms',[AdminController::class,'sendSms'])->name('send.sms');
    Route::get('/message-all-students',[AdminController::class,'messageAll'])->name('message.all.students');
    // Route::get('/sms-check', function () {
    //     echo  send('9113751193','hello');
    // });

    Route::get('/placements',[PlacementController::class,'placements'])->name('placements');
    Route::delete('/placements/{id}',[PlacementController::class,'destroy'])->name('admin.placements.delete');
});

Route::get('/route',function(){
    \Artisan::call('route:clear');
});

Route::get('/cache',function(){
    \Artisan::call('cache:clear');
});

Route::get('/config',function(){
    \Artisan::call('config:clear');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
