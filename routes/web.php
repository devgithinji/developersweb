<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Frontend\FrontEndController@index')->name('hometwo');
Route::get('/services', 'Frontend\FrontEndController@services')->name('services');
Route::get('/services/pricing', 'Frontend\FrontEndController@servicesPricing')->name('services.pricing');
Route::get('/projects', 'Frontend\FrontEndController@projects')->name('projects');
Route::get('/single/{id}/project', 'Frontend\FrontEndController@Singleproject')->name('single.showcase.project');
Route::get('category/{id}/projects','Frontend\FrontEndController@categoryProjetcs')->name('showcase.project.category');

Route::get('/blog', 'Frontend\FrontEndController@blog')->name('blog');
Route::get('blog/categories/{id}','Frontend\FrontEndController@categoryBlog')->name('category.blog');
Route::get('/blog/{id}/post', 'Frontend\FrontEndController@Singleblog')->name('single.blog');
//career
Route::get('/careers', 'Frontend\FrontEndController@careers')->name('careers');
Route::get('/careers/{id}/application', 'Frontend\FrontEndController@careersApplication')->name('careers.application');
Route::post('/careers/{id}/application/{user_id}store', 'Frontend\FrontEndController@careersApplicationStore')->name('careers.application.store');

Route::get('/aboutus', 'Frontend\FrontEndController@aboutus')->name('aboutus');
Route::get('/contactus', 'Frontend\FrontEndController@contactus')->name('contactus');
Route::get('/account', 'Frontend\FrontEndController@account')->name('account');
//developer
Route::get('/developer/{id}/profile', 'Frontend\FrontEndController@devprofile')->name('dev.profile');

Route::get('/faq', 'Frontend\FrontEndController@faq')->name('faq');
Route::get('/terms/conditions', 'Frontend\FrontEndController@termsConditions')->name('terms.conditions');
Route::get('/risk-management', 'Frontend\FrontEndController@riskManagement')->name('risk.management');
Route::get('/downloads', 'Frontend\FrontEndController@downloads')->name('downloads');

//Auth routes
Auth::routes(['verify' => true]);

//shop
Route::get('/shop/products', 'Frontend\ShopController@shop')->name('shop');
Route::get('/category/{id}/products', 'Frontend\ShopController@categoryProducts')->name('category.products');
Route::get('/shop/product/{id}', 'Frontend\ShopController@productView')->name('shop.product');
//cart
Route::get('/shop/cart', 'Frontend\ShopController@cartList')->name('cart.list');
Route::any('/shop/cart/product/{id}', 'Frontend\ShopController@cartAdd')->name('cart.add');
Route::get('/shop/remove/product/{id}', 'Frontend\ShopController@removeProduct')->name('cart.remove');

//show case projects
Route::get('/project/showcase', 'Frontend\ProjectController@view')->name('project.view');


//projects
Route::get('/project/{id}/view', 'Frontend\ProjectController@view')->name('project.view');

//proposal
Route::get('/proposal/create', 'Frontend\ProjectProposalController@create')->name('proposal.create');
Route::post('/proposal/store', 'Frontend\ProjectProposalController@store')->name('proposal.store');
Route::get('/proposal/{id}/view', 'Frontend\ProjectProposalController@view')->name('proposal.view');

//unauthenticated proposal req
Route::post('unauth/proposal/store', 'Frontend\ProjectProposalController@storeTwo')->name('unauth.proposal.store');


//review
Route::get('/review/create', 'Frontend\ReviewController@create')->name('review.create');
Route::post('/review/store', 'Frontend\ReviewController@store')->name('review.store');
Route::get('/review/{id}/edit', 'Frontend\ReviewController@edit')->name('review.edit');
Route::get('/review/{id}/view', 'Frontend\ReviewController@view')->name('client.review.view');
Route::post('/review/{id}/update', 'Frontend\ReviewController@update')->name('review.update');
Route::get('/review/{id}/delete', 'Frontend\ReviewController@update')->name('review.update');

//account profile
Route::get('/account/profile/edit', 'Frontend\UserProfileController@profileEdit')->name('user.profile.edit');
Route::post('/account/profile/update', 'Frontend\UserProfileController@profileUpdate')->name('user.profile.update');


Route::get('/home', 'HomeController@index')->name('home');


//admin routes
Route::group(['prefix' => '/dashboard'], function () {
    //dashboard
    Route::get('/', 'Admin\AdminDashboardController@index')->name('admin.dashboard');
    //staff auth
    Route::get('login', 'Auth\LoginController@showEmployeeLoginForm')->name('employee.show.login');
    Route::post('login', 'Admin\LoginController@Login')->name('employee.login');
    Route::get('employee/logout', 'Admin\AdminDashboardController@logout')->name('employee.logout');
    //staff create
    Route::get('staff', 'Admin\StaffController@index')->name('staff.list');
    Route::get('staff/create', 'Admin\StaffController@create')->name('staff.create');
    Route::get('staff/{id}/profile/edit', 'Admin\StaffController@profileEdit')->name('staff.profile.edit');
    Route::get('staff/{id}/profile/dismiss', 'Admin\StaffController@dismiss')->name('staff.profile.dismiss');
    Route::post('staff/store', 'Admin\StaffController@store')->name('staff.store');

    //clients


    //users
    Route::get('users/list','Admin\UsersController@index')->name('users.list');
    Route::get('users/list/profiles','Admin\UsersController@indexProfiles')->name('users.list.profiles');
    Route::get('user/{id}/view','Admin\UsersController@viewUser')->name('user.view');

    //staff profile edit
    Route::post('staff/{id}/avatar/upload', 'Admin\StaffController@avatarUpload')->name('staff.avatar.upload');
    Route::post('staff/{id}/avatar/delete', 'Admin\StaffController@avatarDelete')->name('staff.avatar.delete');
    Route::post('staff/{id}/resume/upload', 'Admin\StaffController@resumeUpload')->name('staff.resume.upload');
    Route::post('staff/{id}/personal/settings', 'Admin\StaffController@personalSettings')->name('staff.avatar.personalsettings');
    Route::post('staff/{id}/personal/links', 'Admin\StaffController@personalLinks')->name('staff.avatar.personalLinks');
    //staff view
    Route::get('staff/view', 'Admin\StaffController@viewProfiles')->name('staff.profiles');
    Route::get('staff/{id}/view', 'Admin\StaffController@view')->name('staff.profile.view');

    //services
    Route::get('services/list', 'Admin\ServicesController@index')->name('services.list');
    Route::get('services/create', 'Admin\ServicesController@create')->name('services.create');
    Route::post('services/store', 'Admin\ServicesController@store')->name('services.store');
    Route::get('services/{id}/edit', 'Admin\ServicesController@edit')->name('services.edit');
    Route::post('services/{id}/update', 'Admin\ServicesController@update')->name('services.update');
    Route::get('services/{id}/status/{status}/update', 'Admin\ServicesController@statusUpdate')->name('services.status.update');
    Route::get('services/{id}/delete', 'Admin\ServicesController@delete')->name('services.delete');

    //services pricing
    Route::get('pricing/list', 'Admin\ServicesController@servicePricingList')->name('prices.list');
    Route::get('pricing/create', 'Admin\ServicesController@servicePricingCreate')->name('prices.create');
    Route::post('pricing/store', 'Admin\ServicesController@servicePricingStore')->name('prices.store');
    Route::get('pricing/{id}/edit', 'Admin\ServicesController@servicePricingEdit')->name('prices.edit');
    Route::post('pricing/{id}/edit', 'Admin\ServicesController@servicePricingUpdate')->name('prices.update');
    Route::get('pricing/{id}/delete', 'Admin\ServicesController@servicePricingdelete')->name('prices.delete');
    Route::get('pricing/{id}/view', 'Admin\ServicesController@servicePricingview')->name('prices.view');
    //Reviews
    Route::get('reviews/list', 'Admin\ReviewsController@index')->name('reviews.list');
    Route::get('reviews/{id}/view', 'Admin\ReviewsController@view')->name('review.view');
    Route::get('reviews/{id}/status/{status}', 'Admin\ReviewsController@statusUpdate')->name('review.status.update');

    //showcase projects
    Route::get('projects/showcase', 'Admin\ProjectsController@showcase')->name('projects.showcase');
    Route::get('projects/showcase/create', 'Admin\ProjectsController@showcaseCreate')->name('projects.showcase.create');
    Route::get('projects/showcase/{id}/edit', 'Admin\ProjectsController@showcaseEdit')->name('projects.showcase.edit');
    Route::post('projects/showcase/store', 'Admin\ProjectsController@showcaseStore')->name('projects.showcase.store');
    Route::post('projects/showcase/{id}/update', 'Admin\ProjectsController@showcaseUpdate')->name('projects.showcase.update');
    Route::get('projects/showcase/{id}/delete', 'Admin\ProjectsController@showcaseDelete')->name('projects.showcase.delete');
    Route::get('projects/showcase/{id}/addPhotos', 'Admin\ProjectsController@showcaseAddPhotos')->name('projects.showcase.addphotos');
    Route::post('projects/showcase/{id}/storePhotos', 'Admin\ProjectsController@showcaseStorePhotos')->name('projects.showcase.storephotos');
    Route::get('projects/showcase/{id}/viewPhotos', 'Admin\ProjectsController@showcaseViewPhotos')->name('projects.showcase.viewphotos');
    Route::get('photo/{id}/delete','Admin\ProjectsController@deleteShoeCasePhotos')->name('project.photo.delete');


    //projects
    Route::get('projects/list', 'Admin\ProjectsController@index')->name('projects.list');
    Route::get('project/create', 'Admin\ProjectsController@Create')->name('project.create');
    Route::post('project/store', 'Admin\ProjectsController@store')->name('project.store');
    Route::get('project/{id}/view', 'Admin\ProjectsController@view')->name('project.show');
    Route::get('project/{id}/edit', 'Admin\ProjectsController@edit')->name('project.edit');
    Route::post('project/{id}/update', 'Admin\ProjectsController@update')->name('project.update');
    Route::get('project/{id}/status/{status}/update', 'Admin\ProjectsController@statusUpdate')->name('project.status.update');
    Route::get('project/{id}/delete', 'Admin\ProjectsController@delete')->name('project.delete');
    Route::get('project/quotations','Admin\ProjectsController@quotationsList')->name('projects.proposal.list');
    Route::get('quotations/{id}/view','Admin\ProjectsController@quotationView')->name('quotationView');
    Route::get('proposal/{id}/view','Admin\ProjectsController@proposalView')->name('proposalView');
    Route::get('project/quotation/{id}/status/{status}','Admin\ProjectsController@quotationsStatus')->name('quotation.status');
    Route::get('project/proposal/{id}/status/{status}','Admin\ProjectsController@proposalStatus')->name('proposal.status');


    //project milestones
    Route::get('project/{id}/milestone/create', 'Admin\ProjectsController@CreateMilestone')->name('project.milestone.create');
    Route::post('project/{id}/milestone/store', 'Admin\ProjectsController@StoreMilestone')->name('project.milestone.store');
    Route::get('project/{project_id}/milestone/{milestone_id}/edit', 'Admin\ProjectsController@EditMilestone')->name('project.milestone.edit');
    Route::get('project/{project_id}/milestone/{milestone_id}/view', 'Admin\ProjectsController@ViewMilestone')->name('project.milestone.view');
    Route::post('project/{project_id}/milestone/{milestone_id}/update', 'Admin\ProjectsController@UpdateMilestone')->name('project.milestone.update');
    Route::get('project/{project_id}/milestone/{milestone_id}/delete', 'Admin\ProjectsController@DeleteMilestone')->name('project.milestone.delete');

    //milestone tasks
    Route::get('milestone/{id}/task/create/', 'Admin\ProjectsController@CreateTask')->name('milestone.task.create');
    Route::post('milestone/{id}/task/store/', 'Admin\ProjectsController@StoreTask')->name('milestone.task.store');
    Route::get('milestone/task/{id}/edit/', 'Admin\ProjectsController@EditTask')->name('milestone.task.edit');
    Route::post('milestone/task/{id}/update/', 'Admin\ProjectsController@UpdateTask')->name('milestone.task.update');
    Route::get('milestone/task/{id}/delete', 'Admin\ProjectsController@DeleteTask')->name('milestone.task.delete');
    Route::get('milestone/task/{id}/view', 'Admin\ProjectsController@ViewTask')->name('milestone.task.view');

    //task list
    Route::get('task/view', 'Admin\ProjectsController@TaskList')->name('task.view');

    //careers
    Route::get('careers/list', 'Admin\CareerController@index')->name('career.list');
    Route::get('careers/create', 'Admin\CareerController@create')->name('career.create');
    Route::post('careers/store', 'Admin\CareerController@store')->name('career.store');
    Route::get('careers/{id}/edit', 'Admin\CareerController@edit')->name('career.edit');
    Route::get('careers/{id}/view', 'Admin\CareerController@view')->name('career.view');
    Route::get('careers/{id}/delete', 'Admin\CareerController@delete')->name('career.delete');
    Route::post('careers/{id}/update', 'Admin\CareerController@update')->name('career.update');
    Route::get('career/{id}/responsibilities/create', 'Admin\CareerController@createRes')->name('career.res.create');
    Route::post('career/{id}/responsibilities/store', 'Admin\CareerController@storeRes')->name('career.res.store');
    Route::get('career/{id}/responsibilities/edit', 'Admin\CareerController@editRes')->name('career.res.edit');
    Route::post('career/{id}/responsibilities/update', 'Admin\CareerController@updateRes')->name('career.res.update');
    Route::get('responsibility/{id}/delete', 'Admin\CareerController@deleteRes')->name('career.res.delete');
    Route::get('career/applications/list','Admin\CareerController@ApplicationList')->name('career.applications.list');
    Route::get('career/application/{id}/view','Admin\CareerController@ApplicationView')->name('career.application.view');

    //shop-category
    Route::get('shop/categories/list', 'Admin\ShopCategoryController@index')->name('shop.categories.list');
    Route::get('shop/category/{id}/edit', 'Admin\ShopCategoryController@edit')->name('shop.category.edit');
    Route::get('shop/category/create', 'Admin\ShopCategoryController@create')->name('shop.category.create');
    Route::post('shop/category/store', 'Admin\ShopCategoryController@store')->name('shop.category.store');
    Route::post('shop/category/{id}/update', 'Admin\ShopCategoryController@update')->name('shop.category.update');
    Route::get('shop/category/{id}/status/{status_id}/update', 'Admin\ShopCategoryController@statusUpdate')->name('shop.category.statusupdate');
    Route::get('shop/category/{id}/delete', 'Admin\ShopCategoryController@delete')->name('shop.category.delete');

    //shop-product
    Route::get('shop/products/list', 'Admin\ShopProductController@index')->name('shop.products.list');
    Route::get('shop/product/create', 'Admin\ShopProductController@create')->name('shop.product.create');
    Route::post('shop/product/store', 'Admin\ShopProductController@store')->name('shop.product.store');
    Route::get('shop/product/{id}/edit', 'Admin\ShopProductController@edit')->name('shop.product.edit');
    Route::get('shop/product/{id}/view', 'Admin\ShopProductController@view')->name('shop.product.view');
    Route::post('shop/product/{id}/update', 'Admin\ShopProductController@update')->name('shop.product.update');
    Route::get('shop/product/{id}/delete', 'Admin\ShopProductController@delete')->name('shop.product.delete');
    Route::get('shop/product/{id}/status/{status_id}/update', 'Admin\ShopProductController@statusUpdate')->name('shop.product.statusupdate');
    Route::get('shop/product/{id}/createspecs', 'Admin\ShopProductController@createspecs')->name('shop.product.createspecs');
    Route::post('shop/product/{id}/storespecs', 'Admin\ShopProductController@storespecs')->name('shop.product.storespecs');
    Route::get('shop/product/{id}/editspecs', 'Admin\ShopProductController@editspecs')->name('shop.product.editspecs');
    Route::post('shop/product/{id}/updatespecs', 'Admin\ShopProductController@updatespecs')->name('shop.product.updatespecs');
    Route::get('shop/product/{id}/deletespecs', 'Admin\ShopProductController@deletespecs')->name('shop.product.deletespecs');

    //blog
    //categories
    Route::get('post/categories/list', 'Admin\PostCategoryController@index')->name('post.categories.list');
    Route::get('post/category/create', 'Admin\PostCategoryController@create')->name('post.category.create');
    Route::get('post/category/{id}/edit', 'Admin\PostCategoryController@edit')->name('post.category.edit');
    Route::post('post/category/store', 'Admin\PostCategoryController@store')->name('post.category.store');
    Route::post('post/category/{id}/update', 'Admin\PostCategoryController@update')->name('post.category.update');
    Route::get('post/category/{id}/delete', 'Admin\PostCategoryController@delete')->name('post.category.delete');
    Route::get('categories/{id}/status/{status_id}/update', 'Admin\PostCategoryController@categoryStatusUpdate')->name('post.category.status.update');

    //post
    Route::get('post/list', 'Admin\PostController@index')->name('post.list');
    Route::get('post/create', 'Admin\PostController@create')->name('post.create');
    Route::get('post/{id}/view', 'Admin\PostController@view')->name('post.view');
    Route::post('post/store', 'Admin\PostController@store')->name('post.store');
    Route::get('post/{id}/edit', 'Admin\PostController@edit')->name('post.edit');
    Route::post('post/{id}/update', 'Admin\PostController@update')->name('post.update');
    Route::get('post/{id}/delete', 'Admin\PostController@delete')->name('post.delete');
    Route::get('post/{id}/status/{status_id}/update', 'Admin\PostController@postStatusUpdate')->name('post.status.update');

    //settings
    //general settings
    Route::get('settings/list', 'Admin\GeneralSettingsController@index')->name('general.settings.list');
    Route::get('settings/create', 'Admin\GeneralSettingsController@create')->name('general.settings.create');
    Route::post('settings/logo/store', 'Admin\GeneralSettingsController@logostore')->name('settings.logo.store');
    Route::post('settings/hero/store', 'Admin\GeneralSettingsController@herostore')->name('settings.hero.store');
    Route::post('settings/abtcompany/store', 'Admin\GeneralSettingsController@companystore')->name('settings.company.store');
    Route::post('settings/projects/store', 'Admin\GeneralSettingsController@projectsstore')->name('settings.projects.store');
    Route::post('settings/services/store', 'Admin\GeneralSettingsController@servicesstore')->name('settings.services.store');
    Route::post('settings/team/store', 'Admin\GeneralSettingsController@teamsstore')->name('settings.team.store');
    Route::post('settings/reviews/store', 'Admin\GeneralSettingsController@reviewsstore')->name('settings.reviews.store');
    Route::get('contactus/create', 'Admin\GeneralSettingsController@ContactUsCreate')->name('contactus.settings.create');
    Route::post('contactus/store', 'Admin\GeneralSettingsController@ContactUsStore')->name('contactus.settings.store');

    //terms and conditions
    Route::get('terms/list','Admin\TermsController@index')->name('terms.list');
    Route::get('terms/create','Admin\TermsController@create')->name('term.create');
    Route::post('terms/store','Admin\TermsController@store')->name('term.store');
    Route::get('terms/{id}/edit','Admin\TermsController@Edit')->name('term.edit');
    Route::get('terms/view','Admin\TermsController@View')->name('term.view');
    Route::post('terms/{id}/update','Admin\TermsController@update')->name('term.update');
    Route::get('terms/{id}/delete','Admin\TermsController@delete')->name('term.delete');

    //faq
    Route::get('faq/list','Admin\FaqController@index')->name('faq.list');
    Route::get('faq/create','Admin\FaqController@create')->name('faq.create');
    Route::post('faq/store','Admin\FaqController@store')->name('faq.store');
    Route::get('faq/{id}/edit','Admin\FaqController@Edit')->name('faq.edit');
    Route::get('faq/view','Admin\FaqController@View')->name('faq.view');
    Route::post('faq/{id}/update','Admin\FaqController@update')->name('faq.update');
    Route::get('faq/{id}/delete','Admin\FaqController@delete')->name('faq.delete');


    //employers logo
    Route::get('employers/logo','Admin\EmployerLogoController@index')->name('logo.list');
    Route::get('employers/logo/create','Admin\EmployerLogoController@create')->name('logo.create');
    Route::post('employers/logo/store','Admin\EmployerLogoController@store')->name('logo.store');
    Route::get('employers/logo/{id}/edit','Admin\EmployerLogoController@edit')->name('logo.edit');
    Route::post('employers/logo/{id}/update','Admin\EmployerLogoController@update')->name('logo.update');
    Route::get('employers/logo/{id}/delete','Admin\EmployerLogoController@delete')->name('logo.delete');

    //page Images
    Route::get('page/images/list','Admin\PageImageController@index')->name('page.images.list');
    Route::get('page/image/create','Admin\PageImageController@create')->name('page.image.create');
    Route::post('page/image/store','Admin\PageImageController@store')->name('page.image.store');
    Route::get('page/image/{id}/delete','Admin\PageImageController@delete')->name('page.image.delete');


});

