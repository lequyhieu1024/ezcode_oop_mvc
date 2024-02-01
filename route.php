<?php

use App\Controllers\AdminController\AccountController as AdminControllerAccountController;
use App\Controllers\AdminController\AdminController;
use App\Controllers\AdminController\CategoryController;
use App\Controllers\AdminController\CommentControlller;
use App\Controllers\AdminController\CourseController;
use App\Controllers\AdminController\PromotionalController;
use App\Controllers\AdminController\RoleController;
use App\Controllers\AdminController\StudyTimeController;
use App\Controllers\AdminController\StudyTimeCourseController;
use App\Controllers\AdminController\TeacherController;
use App\Controllers\ClientController\CoursesController;
use App\Controllers\ClientController\HomeController;
use App\Controllers\ClientController\AccountController;
use App\Controllers\ClientController\PaymentController;
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();
$url = isset($_GET['url']) ? $_GET['url'] : '/';
// var_dump($url);
$router->group(['prefix' => '/'], function ($router) {
    // *** CLIENT
    $router->get('/', [HomeController::class, 'index']);
    // account
    $router->get('login', [AccountController::class, 'login']);
    $router->post('login', [AccountController::class, 'login']);

    $router->get('register', [AccountController::class, 'register']);
    $router->post('register', [AccountController::class, 'register']);

    $router->get('logout', [AccountController::class, 'logout']);

    //navbar
    $router->get('my-courses', [HomeController::class, 'myCourses']);
    $router->get('liked-courses', [HomeController::class, 'likedCourses']);
    $router->get('list-promotional', [HomeController::class, 'listPromotional']);
    $router->get('list-contact', [HomeController::class, 'listContact']);
    $router->post('list-contact', [HomeController::class, 'sendContact']);


    $router->get('course-by-category/{id}', [HomeController::class, 'courseByCategory']);
    $router->get('detail-teacher/{id_giang_vien}', [HomeController::class, 'detailTeacher']);


    //seting
    $router->group(['prefix' => 'settings'], function ($router) {
        $router->get('/', [HomeController::class, 'setting']);
        $router->get('myinfo', [HomeController::class, 'myinfo']);
        $router->get('updateinfo', [HomeController::class, 'updateInfo']);
        $router->post('updateinfo', [HomeController::class, 'updateInfo']);
        $router->get('changepassword', [HomeController::class, 'changePassword']);
        $router->post('changepassword', [HomeController::class, 'changePassword']);
    });
    //course

    $router->get('detail-course/{id_khoa_hoc}/{id_danh_muc}', [CoursesController::class, 'detailCourse']);
    $router->get('like-course', [CoursesController::class, 'likeCourse']);
    $router->post('add-rate/{id_khoa_hoc}/{id_dang_ky_khoa_hoc}', [CoursesController::class, 'addRate']);
    $router->get('dislike-course', [CoursesController::class, 'dislikeCourse']);
    $router->post('add-comment/{id_khoa_hoc}/{id_danh_muc}', [CoursesController::class, 'comment']);
    $router->post('search-course', [CoursesController::class, 'searchCourse']);
    $router->get('detail-my-course/{id_khoa_hoc}/{id_dang_ky_khoa_hoc}', [CoursesController::class, 'detailMyCourse']);
    $router->get('unregister-course/{id_dang_ky_khoa_hoc}', [CoursesController::class, 'unregisterCourseCtl']);

    $router->get('payment/{id_khoa_hoc}', [PaymentController::class, 'paymentInfomation']);
    $router->post('payment/{id_khoa_hoc}', [PaymentController::class, 'pay']);
    // $router->get('payment-by-momo', [PaymentController::class, 'payMomo']);
    // $router->get('payment-by-vnpay', [PaymentController::class, 'payVnpay']);


    $router->filter('auth', function () {
        if (!isset($_SESSION['id_role'])) {
            header('location:login');
            return false;
        } else {
            if ($_SESSION['id_role'] != 3) {
                header('location:index.php');
                return false;
            }
        }
    });

    // admin
    $router->group(['before' => 'auth', 'prefix' => 'admin'], function ($router) {
        $router->get('/', [AdminController::class, 'index']);
        $router->group(['prefix' => 'registedcourse'], function ($router) {
            $router->get('/list-course', [CourseController::class, 'registedCourse']);
            // $router->get('/add-course', [CourseController::class, 'addCourse']); chức năng lọc
            $router->get('/update-status/{id}', [CourseController::class, 'updateStatus']);
            $router->post('/update-status/{id}', [CourseController::class, 'updateStatus']);
        });
        $router->group(['prefix' => 'courses'], function ($router) {
            $router->get('/list-course', [CourseController::class, 'listCourse']);
            $router->get('/course-by-cat/{id}', [CourseController::class, 'courseByCat']);
            $router->get('/add-course', [CourseController::class, 'addCourse']);
            $router->post('/add-course', [CourseController::class, 'addCourse']);
            $router->get('/edit-course/{id}', [CourseController::class, 'editCourse']);
            $router->post('/edit-course/{id}', [CourseController::class, 'editCourse']);
            $router->get('/delete-course/{id}', [CourseController::class, 'deleteCourse']);
        });
        $router->group(['prefix' => 'categories'], function ($router) {
            $router->get('/list-cat', [CategoryController::class, 'listCat']);
            $router->get('/add-cat', [CategoryController::class, 'addCat']);
            $router->post('/add-cat', [CategoryController::class, 'addCat']);
            $router->get('/edit-cat/{id}', [CategoryController::class, 'editCat']);
            $router->post('/edit-cat/{id}', [CategoryController::class, 'editCat']);
            $router->get('/delete-cat/{id}', [CategoryController::class, 'deleteCat']);
        });
        $router->group(['prefix' => 'teachers'], function ($router) {
            $router->get('/list-teacher', [TeacherController::class, 'listteacher']);
            $router->get('/add-teacher', [TeacherController::class, 'addteacher']);
            $router->post('/add-teacher', [TeacherController::class, 'addteacher']);
            $router->get('/edit-teacher/{id}', [TeacherController::class, 'editteacher']);
            $router->post('/edit-teacher/{id}', [TeacherController::class, 'editteacher']);
            $router->get('/delete-teacher/{id}', [TeacherController::class, 'deleteteacher']);
        });
        $router->group(['prefix' => 'promotionals'], function ($router) {
            $router->get('/list-promotional', [PromotionalController::class, 'listpromotional']);
            $router->get('/add-promotional', [PromotionalController::class, 'addpromotional']);
            $router->post('/add-promotional', [PromotionalController::class, 'addpromotional']);
            $router->get('/edit-promotional/{id}', [PromotionalController::class, 'editpromotional']);
            $router->post('/edit-promotional/{id}', [PromotionalController::class, 'editpromotional']);
            $router->get('/delete-promotional/{id}', [PromotionalController::class, 'deletepromotional']);
        });
        $router->group(['prefix' => 'roles'], function ($router) {
            $router->get('/list-role', [RoleController::class, 'listrole']);
            $router->get('/add-role', [RoleController::class, 'addrole']);
            $router->post('/add-role', [RoleController::class, 'addrole']);
            $router->get('/edit-role/{id}', [RoleController::class, 'editrole']);
            $router->post('/edit-role/{id}', [RoleController::class, 'editrole']);
            $router->get('/delete-role/{id}', [RoleController::class, 'deleterole']);
        });
        $router->group(['prefix' => 'stdtimes'], function ($router) {
            $router->get('/list-stdtime', [StudyTimeController::class, 'liststdtime']);
            $router->get('/add-stdtime', [StudyTimeController::class, 'addstdtime']);
            $router->post('/add-stdtime', [StudyTimeController::class, 'addstdtime']);
            $router->get('/edit-stdtime/{id}', [StudyTimeController::class, 'editstdtime']);
            $router->post('/edit-stdtime/{id}', [StudyTimeController::class, 'editstdtime']);
            $router->get('/delete-stdtime/{id}', [StudyTimeController::class, 'deletestdtime']);
        });
        $router->group(['prefix' => 'stdtimecourses'], function ($router) {
            $router->get('/list-stdtime-course', [StudyTimeCourseController::class, 'listStdTimeCourse']);
            $router->get('/add-stdtime-course', [StudyTimeCourseController::class, 'addstdtimecourse']);
            $router->post('/add-stdtime-course', [StudyTimeCourseController::class, 'addstdtimecourse']);
            $router->get('/edit-stdtime-course/{id}', [StudyTimeCourseController::class, 'editstdtimecourse']);
            $router->post('/edit-stdtime-course/{id}', [StudyTimeCourseController::class, 'editstdtimecourse']);
            $router->get('/delete-stdtime-course/{id}', [StudyTimeCourseController::class, 'deletestdtimecourse']);
        });
        $router->group(['prefix' => 'accounts'], function ($router) {
            $router->get('/list-accounts-admin', [AdminControllerAccountController::class, 'listAccountAdmin']);
            $router->get('/list-accounts-student', [AdminControllerAccountController::class, 'listAccountStudent']);
            $router->get('/delete-account-admin/{id}', [AdminControllerAccountController::class, 'deleteAccountAdmin']);
            $router->get('/delete-account-student/{id}', [AdminControllerAccountController::class, 'deleteAccountStudent']);
        });
        $router->group(['prefix' => 'comments'], function ($router) {
            $router->get('/list-comments', [CommentControlller::class, 'listCommentCtl']);
            $router->get('/list-rates', [CommentControlller::class, 'listRateCtl']);
            $router->get('/delete-comment/{id}', [CommentControlller::class, 'deleteComment']);
        });
        $router->group(['prefix' => 'contacts'], function ($router) {
            $router->get('/list-contact', [AdminController::class, 'listContact']);
            $router->get('/rep-contact/{id}', [AdminController::class, 'repContact']);
            $router->get('/delete-contact/{id}', [AdminController::class, 'deleteContact']);
        });
    });
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
