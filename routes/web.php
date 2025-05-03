<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\{
    HomeController,
    ProjectSiteController,
};

use App\Http\Controllers\Admin\{
    DashboardController,
    TestimonialController,
    BlogController,
    ProjectController,
    ProjectMotionGraphicController,
    ProjectCGIController,
    CategoryController,
    ProductController,
    ContactController,
    GraphicDesignController,
    OurClientController,
    VideoProduction,
    BannerController,
};


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blogs/{slug}', [HomeController::class, 'blog_details'])->name('blog.details');
// Route::get('/projects', [ProjectSiteController::class, 'index'])->name('project');

Route::get('/projects/cgi', [ProjectSiteController::class, 'project_cgi'])->name('project.cgi');
Route::get('/projects/cgi/{slug?}', [ProjectSiteController::class, 'project_cgi_details'])->name('project.cgi.details');

Route::get('/projects/motion-graphic', [ProjectSiteController::class, 'project_motion_graphic'])->name('project.motion-graphic');
Route::get('/projects/motion-graphic/{slug?}', [ProjectSiteController::class, 'project_motion_graphic_details'])->name('project.motion-graphic.details');

Route::get('/projects/video-production', [ProjectSiteController::class, 'project_video_production'])->name('project.video-production');
Route::get('/projects/video-production/{slug?}', [ProjectSiteController::class, 'project_video_production_details'])->name('project.video-production.details');


Route::get('/projects/grapic-design', [ProjectSiteController::class, 'grapic_design'])->name('project.grapic-design');
Route::get('/projects/grapic-design/{slug}', [ProjectSiteController::class, 'grapic_design_details'])->name('project.grapic-design-details');

Route::post('contact/store',[ContactController::class,'store'])->name('contact.store');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('testimonial', TestimonialController::class);
    Route::resource('blog', BlogController::class);

    // Route::resource('project', ProjectController::class);
    Route::resource('project-motion-graphic', ProjectMotionGraphicController::class);
    Route::resource('project-cgi', ProjectCGIController::class);
    Route::resource('graphic-design', GraphicDesignController::class);
    Route::resource('video-production', VideoProduction::class);

    Route::resource('our-client', OurClientController::class);
    Route::resource('banner', BannerController::class);

    Route::resource('category', CategoryController::class);

    Route::get('contact',[ContactController::class,'index'])->name('contact.index');
    Route::delete('contact/{id}/destroy',[ContactController::class,'destroy'])->name('contact.destroy');

    Route::controller(ProductController::class)->group( function () {
        Route::prefix('product')->group( function () {
            Route::get('','index')->name('product.index');
            Route::post('get-products-by-category','get_products_by_category_id')->name('products.get-products-by-category');
            Route::post('update-product-stock','update_product_stock')->name('products.update-product-stock');
            Route::get('basic-info-create','basic_info_create')->name('products.basic-info-create');
            Route::post('basic-info-process','basic_info_process')->name('products.add-basic-info');

            Route::get('basic-info-edit/{id?}','basic_info_edit')->name('products.basic-info-edit');
            Route::post('basic-info-edit-process','basic_info_edit_process')->name('products.add-basic-edit-info');

            Route::get('price-edit/{id?}','price_edit')->name('products.price-edit');
            Route::post('price-edit-process','price_edit_process')->name('products.price-edit-process');

            
            Route::get('inventory-edit/{id?}','inventory_edit')->name('products.inventory-edit');
            Route::post('inventory-edit-process','inventory_edit_process')->name('products.inventory-edit-process');
            
            Route::get('variation-edit/{id?}','variation_edit')->name('products.variation-edit');
            Route::post('variation-edit-process','variation_edit_process')->name('products.variation-edit-process');
            
            Route::get('product-images-edit/{id?}','product_images_edit')->name('products.product-images-edit');
            Route::post('product-gallery-save','productGalleryStore')->name('products.product-gallery-save');
            Route::post('get-product-temp-images','productTempImages')->name('products.get-product-temp-images');
            Route::post('delete-product-images','delete_product_media')->name('products.delete-product-images');
            Route::post('set-main-product-image','set_main_product_image')->name('products.set-main-product-image');
            Route::post('product-images-process','product_images_process')->name('products.product-images-process');


            Route::get('product-addons-edit/{id?}','product_addons_edit')->name('products.product-addons-edit');
            Route::post('product-addons-update','product_addons_update')->name('products.product-addons-update');

            Route::get('delete/{id}','destroy')->name('products.delete');
        });
    });
});

require __DIR__.'/auth.php';
