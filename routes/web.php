<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaytmController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\StudentController;
use App\Models\Payments;
use App\Models\Paytm;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Route;
use App\Models\Placement;
use App\Models\Course;




Route::view('/contact-us', 'public.contact')->name('contact');
Route::view('/pay-dues', 'public.pay_dues')->name('dues');
Route::view('/payment','public.v2.online-payment')->name('payment');

Route::middleware(['auth'])->group(function () {
    Route::post('/apply',[AdminController::class,'addStudent'])->name('apply.addmission');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('homepage');
    Route::get('/courses', 'courses')->name('courses');
    Route::get('/apply', 'apply')->name('apply');
    Route::get('/gallery', "gallery")->name('gallery');
    Route::get('/response', 'response')->name('response');
    Route::get('/view-course/{course}', 'viewCourse')->name('viewCourse');
});


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



Route::controller(PaytmController::class)->group(function () {
    Route::post('/paytm','pay')->name('paytm.payment');
    Route::post('/paytm-callback','paytmcallback')->name('paytm.callback');
});

Route::controller(PlacementController::class)->group(function () {
    Route::get('/add-placements','add')->name('add.placement');
    Route::post('/add-placements','store')->name('store.placement');
});

Route::prefix('account')->middleware('auth')->group(function(){
    Route::controller(StudentController::class)->group(function () {
       Route::get("profile", "profile")->name('student.profile');
       Route::get("/payments", "myPayments")->name('student.payments');
       Route::get("/courses", "myCourses")->name('student.courses');
    });
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // course routes
    Route::controller(CourseController::class)->group(function () {
        Route::get('/courses','courses')->name('admin.courses');
        Route::get('/delete-course/{course_id}','delete')->name('admin.courses.delete');
        Route::get('/add-course','addCourse')->name('admin.add.course');
        Route::post('/add-course','store')->name('admin.store.course');
        Route::get('/edit-course/{course_id}','editCouse')->name('admin.edit.course.view');
        Route::post('/edit-course','edit')->name('admin.edit.course');
    });
    

//    placement routes
    Route::controller(PlacementController::class)->group(function () {
        Route::get('/placements','placements')->name('placements');
        Route::delete('/placements/{id}','destroy')->name('admin.placements.delete');
    });
 
//  admin routes
    Route::controller(AdminController::class)->group(function () {
        Route::get('/','index')->name('admin.dashboard');
        Route::post('/image_upload', "upload")->name('upload');
        Route::get('/new-admission','new_addmission')->name('new.addmissions');
        Route::get('/student/approve/{id}','approve')->name('admin.student.approve');
        Route::get("/student/disabled/{id}", "disabled")->name('admin.student.disabled');
        Route::get('/students/{id}/remove','removeStudent')->name('admin.students.remove');
        Route::get('/students','students')->name('students');
        Route::get('/dues','dues_payments')->name('dues.payments');
        Route::get('/paid','paid_payments')->name('paid.payments');
        Route::post('update-dues-amount','updateDuesAmount')->name('update.dues.amount');
        Route::post('/payment/pay', 'pay_dues')->name('set.payment.paid');
        Route::post('/payment/unpaid', 'unpaid')->name('set.payment.unpaid');   
        Route::post('/send-sms','sendSms')->name('send.sms');
        Route::get('/message-all-students','messageAll')->name('message.all.students');
    });
   
    Route::get('/add-student', function () {   
        return view('admin.add_student');
    })->name('add.student.view');
   
});

Route::get('/route',function(){\Illuminate\Support\Facades\Artisan::call('route:clear');});

Route::get('/cache',function(){\Illuminate\Support\Facades\Artisan::call('cache:clear');});

Route::get('/config',function(){\Illuminate\Support\Facades\Artisan::call('config:clear');});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
