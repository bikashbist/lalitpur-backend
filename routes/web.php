<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\MenuProductController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ServiceProController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TestPreparationController;
use App\Http\Controllers\Admin\PageBannerController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\TopUniversityController;
use App\Http\Controllers\CoreValueController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LanguageController;

// new import for
use App\Http\Controllers\OfficeIntroductionController;
use App\Http\Controllers\OfficeChiefController;
        use App\Http\Controllers\NewsController;

use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.home');

  Route::prefix('lalitpur')->name('user.')->group(function () {
 
    // About Us routes
    Route::get('/about-us', [UserController::class, 'aboutUs'])->name('about-us');
    Route::get('/office-introduction', [UserController::class, 'officeIntroduction'])->name('office-introduction');
    Route::get('/officials-and-staff', [UserController::class, 'officialsAndStaff'])->name('officials-and-staff');
    Route::get('/office-head', [UserController::class, 'officeHead'])->name('office-head');
    Route::get('/organizational-structure', [UserController::class, 'organizationalStructure'])->name('organizational-structure');
    Route::get('/our-team', [UserController::class, 'ourTeam'])->name('our-team');
    Route::get('/service-receipt-method', [UserController::class, 'serviceReceiptMethod'])->name('service-receipt-method');
    Route::get('/regulations', [UserController::class, 'regulations'])->name('regulations');
    
    // Services routes
    Route::get('/services', [UserController::class, 'services'])->name('services');
    Route::get('/service-flow', [UserController::class, 'serviceFlow'])->name('service-flow');
    Route::get('/citizen-charter', [UserController::class, 'citizenCharter'])->name('citizen-charter');
    Route::get('/civil-service', [UserController::class, 'civilService'])->name('civil-service');
    Route::get('/services-and-facilities', [UserController::class, 'servicesAndFacilities'])->name('services-and-facilities');
    Route::get('/publication-permission', [UserController::class, 'publicationPermission'])->name('publication-permission');
    Route::get('/other-services', [UserController::class, 'otherServices'])->name('other-services');
    
    // Publications routes
    Route::get('/publications', [UserController::class, 'publications'])->name('publications');
    Route::get('/news', [UserController::class, 'news'])->name('news');
    Route::get('/information-and-press-releases', [UserController::class, 'informationAndPressReleases'])->name('information-and-press-releases');
    Route::get('/statistics', [UserController::class, 'statistics'])->name('statistics');
    Route::get('/annual-report', [UserController::class, 'annualReport'])->name('annual-report');
    Route::get('/other-publications', [UserController::class, 'otherPublications'])->name('other-publications');
    
    // Resources routes
    Route::get('/resources', [UserController::class, 'resources'])->name('resources');
    Route::get('/laws', [UserController::class, 'laws'])->name('laws');
    Route::get('/regulations-resources', [UserController::class, 'regulationsResources'])->name('regulations-resources');
    Route::get('/guidelines', [UserController::class, 'guidelines'])->name('guidelines');
    Route::get('/process', [UserController::class, 'process'])->name('process');
    Route::get('/forms', [UserController::class, 'forms'])->name('forms');
    
    // Gallery routes
    Route::get('/gallery', [UserController::class, 'gallery'])->name('gallery');
    Route::get('/photo-gallery', [UserController::class, 'photoGallery'])->name('photo-gallery');
    Route::get('/video-gallery', [UserController::class, 'videoGallery'])->name('video-gallery');
    
    // Media Center routes
    Route::get('/media-center', [UserController::class, 'mediaCenter'])->name('media-center');
    Route::get('/press-releases', [UserController::class, 'pressReleases'])->name('press-releases');
    Route::get('/news-clippings', [UserController::class, 'newsClippings'])->name('news-clippings');
    Route::get('/media-coverage', [UserController::class, 'mediaCoverage'])->name('media-coverage');
    
    // Downloads routes
    Route::get('/downloads', [UserController::class, 'downloads'])->name('downloads');
    Route::get('/download-forms', [UserController::class, 'downloadForms'])->name('download-forms');
    Route::get('/download-reports', [UserController::class, 'downloadReports'])->name('download-reports');
    Route::get('/download-publications', [UserController::class, 'downloadPublications'])->name('download-publications');
    Route::get('/other-files', [UserController::class, 'otherFiles'])->name('other-files');
    
    // Contact route
    Route::get('/contact', [UserController::class, 'contact'])->name('contact');
});
// routes/web.php
Route::get('/news/{slug}', [UserController::class, 'newsDetails'])->name('news.show');



Route::get('/dashboard', function () {
    return view('admin/index');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/services.show/{id}', [UserController::class, 'ServiceShow'])->name('services.show');
// Route::get('/services/{category}', [UserController::class, 'show'])->name('services.show');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

Route::get('/news/{id}', [UserController::class, 'showNews'])->name('blogs.show');
Route::any('logout', function () {
    abort(404);
})->name('logout.fallback');
Route::get('/news/{news}', [\App\Http\Controllers\UserController::class, 'show'])->name('news.show');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('press', \App\Http\Controllers\Admin\AdminPressReleaseController::class)->except(['show']);
});
Route::middleware(['auth'])->group(function () {


   
    Route::get('/admin/logout', [AdminController::class, 'Destroy'])->name('admin.logout');
    Route::resource('menu-categories', MenuCategoryController::class);
    Route::resource('menu-products', MenuProductController::class);
    Route::resource('about-us', AboutUsController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('contact-info', ContactInfoController::class);
    Route::resource('service-categories', ServiceCategoryController::class);
    Route::resource('service-products', ServiceProductController::class);
    Route::get('/messages', [AdminController::class, 'Message'])->name('messages.index');
    Route::resource('banner', BannerController::class);
    Route::resource('advertisements', AdvertisementController::class);
    // Route::resource('products', ProductController::class);
    Route::resource('teams', TeamController::class);
    // Route::resource('services_product', ServiceProController::class);
    Route::resource('services_product', ServiceProController::class)->parameters([
        'services_product' => 'service',
        
    ]);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('admin/page-banners', PageBannerController::class);
    Route::resource('certificate', CertificateController::class);
    Route::resource('top-university', TopUniversityController::class);
    Route::resource('core-values', CoreValueController::class)->names([
        'index' => 'core-values.index',
        'create' => 'core-values.create',
        'store' => 'core-values.store',
        'show' => 'core-values.show',
        'edit' => 'core-values.edit',
        'update' => 'core-values.update',
        'destroy' => 'core-values.destroy'
    ]);
    Route::resource('documents', DocumentController::class);
    Route::resource('admin/locations', App\Http\Controllers\Admin\LocationController::class)->names('locations');
  
    Route::resource('testpreparation', TestPreparationController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class)->shallow();
    Route::resource('blog', BlogController::class);



    Route::get('/office-introduction', [OfficeIntroductionController::class, 'index'])->name('admin.office-introduction.index');
    Route::get('/office-introduction/create', [OfficeIntroductionController::class, 'create'])->name('admin.office-introduction.create');
    Route::post('/office-introduction', [OfficeIntroductionController::class, 'store'])->name('admin.office-introduction.store');
    Route::get('/office-introduction/{officeIntroduction}/edit', [OfficeIntroductionController::class, 'edit'])->name('admin.office-introduction.edit');
    Route::put('/office-introduction/{officeIntroduction}', [OfficeIntroductionController::class, 'update'])->name('admin.office-introduction.update');
    Route::delete('/office-introduction/{officeIntroduction}', [OfficeIntroductionController::class, 'destroy'])->name('admin.office-introduction.destroy');

   Route::resource('office-chiefs', \App\Http\Controllers\OfficeChiefController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.office-chiefs.index',
            'create' => 'admin.office-chiefs.create',
            'store' => 'admin.office-chiefs.store',
            'edit' => 'admin.office-chiefs.edit',
            'update' => 'admin.office-chiefs.update',
            'destroy' => 'admin.office-chiefs.destroy'
        ]);

      // Team Members Routes
    Route::resource('team-members', \App\Http\Controllers\TeamMemberController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.team-members.index',
            'create' => 'admin.team-members.create',
            'store' => 'admin.team-members.store',
            'edit' => 'admin.team-members.edit',
            'update' => 'admin.team-members.update',
            'destroy' => 'admin.team-members.destroy'
        ]);

         Route::resource('service-processes', \App\Http\Controllers\ServiceProcessController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.service-processes.index',
            'create' => 'admin.service-processes.create',
            'store' => 'admin.service-processes.store',
            'edit' => 'admin.service-processes.edit',
            'update' => 'admin.service-processes.update',
            'destroy' => 'admin.service-processes.destroy'
        ]);
          Route::resource('rules', \App\Http\Controllers\RuleController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.rules.index',
            'create' => 'admin.rules.create',
            'store' => 'admin.rules.store',
            'edit' => 'admin.rules.edit',
            'update' => 'admin.rules.update',
            'destroy' => 'admin.rules.destroy'
        ]);
          Route::resource('organizational-structures', \App\Http\Controllers\OrganizationalStructureController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.organizational-structures.index',
            'create' => 'admin.organizational-structures.create',
            'store' => 'admin.organizational-structures.store',
            'edit' => 'admin.organizational-structures.edit',
            'update' => 'admin.organizational-structures.update',
            'destroy' => 'admin.organizational-structures.destroy'
        ]);
         Route::resource('citizen-charters', \App\Http\Controllers\CitizenCharterController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.citizen-charters.index',
            'create' => 'admin.citizen-charters.create',
            'store' => 'admin.citizen-charters.store',
            'edit' => 'admin.citizen-charters.edit',
            'update' => 'admin.citizen-charters.update',
            'destroy' => 'admin.citizen-charters.destroy'
        ]);
         Route::resource('citizen-services', \App\Http\Controllers\CitizenServiceController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.citizen-services.index',
            'create' => 'admin.citizen-services.create',
            'store' => 'admin.citizen-services.store',
            'edit' => 'admin.citizen-services.edit',
            'update' => 'admin.citizen-services.update',
            'destroy' => 'admin.citizen-services.destroy'
        ]);
        Route::resource('other-services', \App\Http\Controllers\OtherServiceController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.other-services.index',
            'create' => 'admin.other-services.create',
            'store' => 'admin.other-services.store',
            'edit' => 'admin.other-services.edit',
            'update' => 'admin.other-services.update',
            'destroy' => 'admin.other-services.destroy'
        ]);
         Route::resource('publication-processes', \App\Http\Controllers\PublicationProcessController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.publication-processes.index',
            'create' => 'admin.publication-processes.create',
            'store' => 'admin.publication-processes.store',
            'edit' => 'admin.publication-processes.edit',
            'update' => 'admin.publication-processes.update',
            'destroy' => 'admin.publication-processes.destroy'
        ]);
          Route::resource('service-flows', \App\Http\Controllers\Admin\ServiceFlowController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.service-flows.index',
            'create' => 'admin.service-flows.create',
            'store' => 'admin.service-flows.store',
            'edit' => 'admin.service-flows.edit',
            'update' => 'admin.service-flows.update',
            'destroy' => 'admin.service-flows.destroy'
        ]);
            Route::resource('team-lalitpur-members', \App\Http\Controllers\Admin\TeamLalitpurController::class)
                ->except(['show'])
                ->names([
                    'index' => 'admin.team-lalitpur-members.index',
                    'create' => 'admin.team-lalitpur-members.create',
                    'store' => 'admin.team-lalitpur-members.store',
                    'edit' => 'admin.team-lalitpur-members.edit',
                    'update' => 'admin.team-lalitpur-members.update',
                    'destroy' => 'admin.team-lalitpur-members.destroy'
                ]);


     Route::resource('press', \App\Http\Controllers\Admin\AdminPressReleaseController::class)->except(['show']);

 
});
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('tourism-statistics', \App\Http\Controllers\Admin\TourismStatisticController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/register', function () {
//     abort(403, 'Registration is disabled.');
// })->name('register');

// Route::post('/register', function () {
//     abort(403, 'Registration is disabled.');
// });
Route::get('language/{lang}', [LanguageController::class, 'switch'])->name('language.switch');
require __DIR__.'/auth.php';
