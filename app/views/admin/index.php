<?php

// use App\Controllers\AdminController\AccountController;
// use App\Controllers\AdminController\AdminController;
// use App\Controllers\AdminController\CategoryController;
// use App\Controllers\AdminController\CommentControlller;
// use App\Controllers\AdminController\CourseController;
// use App\Controllers\AdminController\PromotionalController;
// use App\Controllers\AdminController\RoleController;
// use App\Controllers\AdminController\StudyTimeController;
// use App\Controllers\AdminController\StudyTimeCourseController;
// use App\Controllers\AdminController\TeacherController;

// // require '../../models/env.php';
// // require '../../../vendor/autoload.php';
// // require '../../../route.php';
// session_start();
// // if(isset($_SESSION['id_role'])){
// //     if($_SESSION['id_role']==3){

// $accCtl = new AccountController();
// $roleCtl = new RoleController();
// $adminCtl = new AdminController();
// $promCtrl = new PromotionalController();
// $teacherCtr = new TeacherController();
// $cmtCtl = new CommentControlller();
// $stdtimeCtl = new StudyTimeController();
// $stdTimeCourseCtl = new StudyTimeCourseController();
// $catCtl = new CategoryController();
// $courseCtl = new CourseController();

// $url = isset($_GET['url']) ? $_GET['url'] : "/";
// include("layout/header.php");
// switch ($url) {
//     case '/':
//         require_once 'layout/home.php';
//         break;
//     case 'list-account-admin':
//         $accCtl->listAccountAdmin();
//     case 'list-account-student':
//         $accCtl->listAccountStudent();
//         break;
//     case 'delete-account-admin':
//         $accCtl->deleteAccountAdmin();
//         break;
//     case 'delete-account-student':
//         $accCtl->deleteAccountStudent();
//         break;

//     case 'list-role':
//         $roleCtl->allRole();
//         break;
//     case 'add-role':
//         $roleCtl->addRole();
//         break;
//     case 'edit-role':
//         $roleCtl->editRole();
//         break;
//     case 'delete-role':
//         $roleCtl->deleteRole();
//         break;


//     case 'list-contact':
//         $adminCtl->listContact();
//         break;
//     case 'rep-contact':
//         $adminCtl->repContact();
//         break;
//     case 'delete-contact':
//         $adminCtl->deleteContact();
//         break;

//     case 'list-promotional':
//         $promCtrl->listPromotional();
//         break;
//     case 'add-promotional':
//         $promCtrl->addPromotional();
//         break;
//     case 'edit-promotional':
//         $promCtrl->editPromotional();
//         break;
//     case 'delete-promotional':
//         $promCtrl->deletePromotional();
//         break;

//     case 'list-teacher':
//         $teacherCtr->listTeacher();
//         break;
//     case 'add-teacher':
//         $teacherCtr->addTeacher();
//         break;
//     case 'edit-teacher':
//         $teacherCtr->editteacher();
//         break;
//     case 'delete-teacher':
//         $teacherCtr->deleteteacher();
//         break;
//     case 'list-comment':
//         $cmtCtl->listCommentCtl();
//         break;
//     case 'list-rate':
//         $cmtCtl->listRateCtl();
//         break;
//     case 'delete-comment':
//         $cmtCtl->deleteComment();
//         break;

//     case 'list-study-time':
//         $stdtimeCtl->listStdTime();
//         break;
//     case 'add-study-time':
//         $stdtimeCtl->addStdTime();
//         break;
//     case 'edit-study-time':
//         $stdtimeCtl->editStdTime();
//         break;
//     case 'delete-study-time':
//         $stdtimeCtl->deleteStdTime();
//         break;
//     case 'list-study-time-course':
//         $stdTimeCourseCtl->listStdTimeCourse();
//         break;
//     case 'add-study-time-course':
//         $stdTimeCourseCtl->addStdTimeCourse();
//         break;
//     case 'edit-study-time-course':
//         $stdTimeCourseCtl->editStdTimeCourse();
//         break;
//     case 'delete-study-time-course':
//         $stdTimeCourseCtl->deleteStdTimeCourse();
//         break;

//     case 'list-cat':
//         $catCtl->listCat();
//         break;
//     case 'add-cat':
//         $catCtl->addCat();
//         break;
//     case 'edit-cat':
//         $catCtl->editCat();
//         break;
//     case 'delete-cat':
//         $catCtl->deleteCat();
//         break;

//     case 'list-course':
//         $courseCtl->listCourse();
//         break;
//     case 'add-course':
//         $courseCtl->addCourse();
//         break;
//     case 'edit-course':
//         $courseCtl->editCourse();
//         break;
//     case 'delete-course':
//         $courseCtl->deleteCourse();
//         break;
//     case 'course-by-cat':
//         $courseCtl->courseByCat();
//         break;
// }
// include("layout/footer.php");
//     }else{
//     echo '<img style="width:100%;height:100%" src="../../../public/images/404.png" alt="">';
//     }
// }else{
//     echo '<img style="width:100%;height:100%" src="../../../public/images/404.png" alt="">';
// }
