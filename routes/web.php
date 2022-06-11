<?php

use Illuminate\Support\Facades\Route;
use App\Model\DynamicService;


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
/*
redirect link old
*/
Auth::routes(['verify' => true]);

Route::get('/pages/clipping_path_service', function () {
    return redirect('service/clipping-path');
});
Route::get('/pages/background_removal_service', function () {
    return redirect('service/remove-background-from-image');
});
Route::get('/pages/image_masking_service', function () {
    return redirect('service/image-masking');
});
Route::get('/pages/jewelry_image_editing', function () {
    return redirect('service/jewelary-photo-editing');
});
Route::get('/pages/ecommerce_image_editing', function () {
    return redirect('service/e-commerce-image-masking');
});
Route::get('/pages/shadow_creation', function () {
    return redirect('service/shadow-creation');
});
Route::get('/pages/image_manipulation_service', function () {
    return redirect('service/photo-manipulation');
});
Route::get('/pages/image_retouching', function () {
    return redirect('service/image-retouching');
});
Route::get('/photo_color_correction', function () {
    return redirect('service/photo-color-correction');
});


Route::get('/pages/contact', function () {
    return redirect('/contact');
});
Route::get('/index.php/about', function () {
    return redirect('/about');
});
Route::get('/pages/clipping_path_service', function () {
    return redirect('/clipping-path');
});
Route::get('/index.php/pages/contact', function () {
    return redirect('/contact');
});
Route::get('/allportfolio', function () {
    return redirect()->route('allPortfolio');
});
// Route::get('/e-commerce-image-masking', function () {
//     return redirect('/e-commerce-image-editing');
// });
/*
end redirect link old
*/
/* extra link redirect */
Route::get('/service/clipping-path', function () {
    return redirect('/clipping-path');
});
Route::get('/service/remove-background-from-image', function () {
    return redirect('/remove-background-from-image');
});
Route::get('/service/image-masking', function () {
    return redirect('/image-masking');
});
Route::get('/service/jewelary-photo-editing', function () {
    return redirect('/jewelary-photo-editing');
});
Route::get('/service/e-commerce-image-masking', function () {
    return redirect('/e-commerce-image-masking');
});
Route::get('/service/shadow-creation', function () {
    return redirect('/shadow-creation');
});
Route::get('/service/photo-manipulation', function () {
    return redirect('/photo-manipulation');
});
Route::get('/service/image-retouching', function () {
    return redirect('/image-retouching');
});
Route::get('/service/photo-color-correction', function () {
    return redirect('/photo-color-correction');
});

/* end extra link redirect*/

Route::get('/', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return 123;
    } else {
        // return 456;
        return view('users.index');
    }
})->name('home');

Route::get('/pricings', function () {
    $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
    return view('users.pricing', compact('services'));
})->name('pricing');

Route::get('/portfolios', function () {
    $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
    return view('users.portfolio', compact('services'));
})->name('allPortfolio');

Route::get('/all-timezone', function () {
    $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
    return view('users.showalltime', compact('services'));
});

//Route::get('/admin-layout', function () {
//    return view('admin_layout.index');
//})->name('admin.index');
Route::get('/admin-login', function () {
    return view('admin_layout.auth.login');
});

//Route::get('/place-order', function () {
//    return view('users.place_order');
//})->name('placeOrder');

//Route::get('/free-trail', function () {
//    return view('users.free_trail');
//})->name('freeTrail');

Route::get('/price-policy', function () {
    $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
    return view('users.pricepolicy', compact('services'));
})->name('pricePolicy');


//Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();
//
//    return redirect('/');
//})->middleware(['auth', 'signed'])->name('verification.verify');

// Auth::routes();

//services
// Route::get('/clipping-path', 'HomeController@clippingpath')->name('clippingpath');
// Route::get('/remove-background-from-image', 'HomeController@background')->name('background');
// Route::get('/shadow-creation', 'HomeController@shadow')->name('shadow');
// Route::get('/image-retouching', 'HomeController@retouching')->name('retouching');
// Route::get('/image-masking', 'HomeController@masking')->name('masking');
// Route::get('/e-commerce-image-masking', 'HomeController@ecommerce')->name('ecommerce');
// Route::get('/photo-manipulation', 'HomeController@manipulation')->name('manipulation');
// Route::get('/photo-color-correction', 'HomeController@correction')->name('correction');
// Route::get('/jewelary-photo-editing', 'HomeController@jewelary')->name('jewelary-editing');
//pages
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/privacy-policy', 'HomeController@privacy')->name('privacy');
Route::get('/terms-condition', 'HomeController@conditions')->name('conditions');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/contact', 'HomeController@contact')->name('contact');



// Route::get('/share-social', 'HomeController@shareSocial')->name('shareSocial');

Route::post('contact/post', 'User\ContactController@contact')->name('user.contact.post');




Route::get('/free-trail', 'User\FreeTrailController@index')->name('freeTrail')->middleware('auth', 'verified');
Route::post('/free-trail/post', 'User\FreeTrailController@postfree')->name('freeTrailForm')->middleware('auth', 'verified');


Route::get('/place-order', 'User\PlaceOrderController@index')->name('placeOrder')->middleware('auth', 'verified');
Route::post('/place-order/post', 'User\PlaceOrderController@postorder')->name('placeOrderForm')->middleware('auth', 'verified');
Route::post('/place-order/image-upload', 'User\PlaceOrderController@dropimage')->name('placeorder.dropdown.image')->middleware('auth', 'verified');
Route::post('dropzone-image-delete', 'User\PlaceOrderController@dropimagedelete')->name('placeorder.dropdown.image.delete')->middleware('auth', 'verified');




// ======================User_dashboard=================
Route::group(['verify' => true, 'prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'HomeController@userDashboard')->name('user.dashboard')->middleware('verified');

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'HomeController@userProfile')->name('user.dashboard.profile')->middleware('verified');
            Route::post('/update', 'HomeController@userProfileUpdate')->name('user.profile.update')->middleware('verified');
            Route::post('/image/update', 'HomeController@userProfileImageUpdate')->name('user.profile.image')->middleware('verified');
            Route::post('/email/share-referral', 'HomeController@emailReferral')->name('user.email.referral')->middleware('verified');
        });

         //free trail controller
        Route::get('/free-trial/{status}', 'HomeController@userFree')->name('user.free.index')->middleware('verified');
        Route::get('/free-trial/{id}/info', 'HomeController@userFreeInfo')->name('user.free.info')->middleware('verified');
        
        Route::group(['prefix' => 'order'], function () {
            Route::get('/all', 'HomeController@userOrderAll')->name('user.dashboard.order.all')->middleware('verified');
            Route::get('/new', 'HomeController@userOrderNew')->name('user.dashboard.order.new')->middleware('verified');
            Route::get('/accepted', 'HomeController@userOrderAccepted')->name('user.dashboard.order.accepted')->middleware('verified');
            Route::get('/rejected', 'HomeController@userOrderRejected')->name('user.dashboard.order.rejected')->middleware('verified');
            Route::get('/processing', 'HomeController@userOrderProcess')->name('user.dashboard.order.processing')->middleware('verified');
            Route::get('/QC', 'HomeController@userOrderQc')->name('user.dashboard.order.qc')->middleware('verified');
            Route::get('/completed', 'HomeController@userOrderCompleted')->name('user.dashboard.order.completed')->middleware('verified');
            Route::get('/info', 'HomeController@userOrderInfo')->name('user.order.info')->middleware('verified');
            Route::post('/profile/image/update', 'HomeController@userProfileImageUpdate')->name('user.profile.image')->middleware('verified');
        });

        Route::group(['prefix' => 'invoice'], function () {
            Route::get('/all', 'HomeController@allInvoice')->name('user.dashboard.invoice.all')->middleware('verified');
            Route::get('/new', 'HomeController@newInvoice')->name('user.dashboard.invoice.new')->middleware('verified');
            Route::get('/paid', 'HomeController@paidInvoice')->name('user.dashboard.invoice.paid')->middleware('verified');
            Route::get('/unpaid', 'HomeController@unpaidInvoice')->name('user.dashboard.invoice.unpaid')->middleware('verified');
            Route::get('/overdue', 'HomeController@overdueInvoice')->name('user.dashboard.invoice.overdue')->middleware('verified');
            Route::get('/pdf/{id}', 'HomeController@pdfInvoice')->name('user.dashboard.invoice.pdf')->middleware('verified');
            Route::get('/view/{id}', 'HomeController@viewInvoice')->name('user.dashboard.invoice.view')->middleware('verified');
            Route::get('/print/{id}', 'HomeController@printInvoice')->name('user.dashboard.invoice.print')->middleware('verified'); 
        });

    });
});

// ====================admin======================

Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::get('/admin/index', 'Admin\AdminController@index')->name('admin.indexx');
    
    // Order Management
    Route::get('/orders/all', 'Admin\AdminController@allOrders')->name('admin.order.all');
    Route::get('/orders/new', 'Admin\AdminController@newOrders')->name('admin.order.new');
    Route::get('/orders/{id}/info', 'Admin\AdminController@orderInfo')->name('admin.order.info');
    Route::post('/orders/action', 'Admin\AdminController@orderAction')->name('admin.order.action');
    Route::get('/orders/accepted', 'Admin\AdminController@orderAccepted')->name('admin.order.accepted');
    Route::get('/orders/rejected', 'Admin\AdminController@orderRejected')->name('admin.order.rejected');
    Route::get('/orders/processing', 'Admin\AdminController@orderProcess')->name('admin.order.processing');
    Route::get('/orders/completed', 'Admin\AdminController@orderCompleted')->name('admin.order.completed');
    Route::get('/orders/qc', 'Admin\AdminController@orderQC')->name('admin.order.qc');
    Route::post('/order/status/update', 'Admin\AdminController@orderStatusUpdate')->name('admin.order.status.update');
    Route::post('/order/link/update', 'Admin\AdminController@linkUpdate')->name('admin.order.upload.link');

    // User Management
    Route::get('/users/index', 'Admin\AdminController@users')->name('admin.users.index');
    Route::get('/user/{id}/info', 'Admin\AdminController@userInfo')->name('admin.user.info')->middleware('auth');
    Route::post('/user/{id}/gift', 'Admin\AdminController@gift')->name('admin.user.gift');
    Route::post('/user/referral-bonus-transfer', 'Admin\AdminController@refTransfer')->name('admin.user.rBonus');
    Route::post('/user/delete', 'Admin\AdminController@delete')->name('admin.user.delete');

    //invoice management
    Route::get('/invoice/all', 'Admin\AdminController@allInvoice')->name('admin.invoice.all');
    Route::get('/invoice/inew', 'Admin\AdminController@inewInvoice')->name('admin.invoice.inew');
    Route::get('/invoice/paid', 'Admin\AdminController@paidInvoice')->name('admin.invoice.paid');
    Route::get('/invoice/unpaid', 'Admin\AdminController@draftInvoice')->name('admin.invoice.draft');
    Route::get('/invoice/overdue', 'Admin\AdminController@overdueInvoice')->name('admin.invoice.overdue');
    Route::get('/invoice/new', 'Admin\AdminController@newInvoice')->name('admin.invoice.new');
    Route::get('/invoice/order', 'Admin\AdminController@test')->name('admin.invoice.order');
    Route::get('/invoice/order/filter', 'Admin\AdminController@testFilter')->name('admin.invoice.order.filter');
    Route::get('/invoice/order/get', 'Admin\AdminController@testGet')->name('admin.invoice.order.get');
    Route::get('/invoice/order/getInvoice', 'Admin\AdminController@invoice')->name('admin.invoice.get.invoice');
    Route::post('/invoice/pdf', 'Admin\AdminController@pdf')->name('admin.invoice.pdf'); 
    Route::get('/invoice/pdf/{id}', 'Admin\AdminController@getPdf')->name('admin.invoice.getPdf');    
    Route::post('/invoice/approve/{id}', 'Admin\AdminController@approveInvoice')->name('admin.invoice.approve');
    Route::get('/invoice/view/{id}', 'Admin\AdminController@viewInvoice')->name('admin.invoice.view');
    Route::get('/invoice/edit/{id}', 'Admin\AdminController@editInvoice')->name('admin.invoice.edit');
    Route::post('/invoice/save/{id}', 'Admin\AdminController@saveInvoice')->name('admin.invoice.save');
    Route::post('/invoice/email/send', 'Admin\AdminController@emailInvoice')->name('admin.invoice.email');
    Route::post('/invoice/payment/add', 'Admin\AdminController@paymentInvoice')->name('admin.invoice.payment');
    Route::post('/invoice/delete', 'Admin\AdminController@deleteInvoice')->name('admin.invoice.delete');
    Route::get('/invoice/print/{id}', 'Admin\AdminController@printInvoice')->name('admin.invoice.print'); 
    
    //free trail controller
    Route::get('/free-trial/{status}', 'Admin\FreeOrderController@index')->name('admin.freeorder.index');
    Route::get('/free-trial/{id}/info', 'Admin\FreeOrderController@vieworder')->name('admin.free-trial.info');
    Route::post('/free-trial/action', 'Admin\FreeOrderController@action')->name('admin.free-trial.action');
    Route::post('/free-trial/status/update', 'Admin\FreeOrderController@statusUpdate')->name('admin.free-trial.status.update');
    Route::post('/free-trial/link/update', 'Admin\FreeOrderController@linkUpdate')->name('admin.free-trial.upload.link');

    // place order controller
    Route::get('/admin-place-order', 'Admin\PlaceOrderController@index')->name('admin.placeorder.index');
    Route::get('/admin-place-order-view/{id}', 'Admin\PlaceOrderController@vieworder')->name('admin.placeorder.view');

    // dynamic slider
    Route::get('/admin/services', 'Admin\DynamicServiceController@index')->name('admin.service.index');
    Route::get('/admin/services/create', 'Admin\DynamicServiceController@add')->name('admin.service.add');
    Route::post('/admin/services/create', 'Admin\DynamicServiceController@create')->name('admin.service.create');
    Route::get('/admin/services/edit/{id}', 'Admin\DynamicServiceController@edit')->name('admin.service.edit');
    Route::post('/admin/services/edit/{id}', 'Admin\DynamicServiceController@edit_post')->name('admin.service.edit.post');
    Route::get('/admin/services/status', 'Admin\DynamicServiceController@isActive')->name('admin.service.isActive');
    Route::post('/admin/services/delete', 'Admin\DynamicServiceController@delete')->name('admin.service.delete');

    //dynamic portfolio
    Route::get('/admin-portfolio', 'Admin\DynamicPortfolioController@index')->name('admin.portfolio.index');
    Route::get('/admin-service-portfolio', 'Admin\DynamicPortfolioController@findServices')->name('admin.portfolio.services');
    Route::post('/admin-portfolio-image-add', 'Admin\DynamicPortfolioController@imageAdd')->name('admin.portfolio.add');
    Route::get('/admin-portfolio-status', 'Admin\DynamicPortfolioController@isActive')->name('admin.portfolio.isActive');
    Route::post('/admin-portfolio-delete', 'Admin\DynamicPortfolioController@delete')->name('admin.portfolio.delete');

    //dynamic pricing
    Route::get('/admin/pricing', 'Admin\DynamicPricingController@index')->name('admin.pricing.index');
    Route::post('/admin/pricing/add', 'Admin\DynamicPricingController@add')->name('admin.pricing.add');
    Route::post('/admin/pricing/update', 'Admin\DynamicPricingController@update')->name('admin.pricing.update');
    Route::post('/admin/pricing/delete', 'Admin\DynamicPricingController@delete')->name('admin.pricing.delete');

    //header-tags
    Route::get('/admin/header-tags', 'HeaderTagsController@index')->name('admin.header.index');
    Route::post('/admin/header-tags/add', 'HeaderTagsController@add')->name('admin.header.add');
    Route::post('/admin/header-tags/update', 'HeaderTagsController@update')->name('admin.header.update');
    Route::post('/admin/header-tags/delete', 'HeaderTagsController@delete')->name('admin.header.delete');
    Route::get('/admin/header-tags/status-toggle', 'HeaderTagsController@isActive')->name('admin.header.isActive');
});


Route::get('/{slug}', 'HomeController@service')->name('servicess');

