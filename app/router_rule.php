<?php

$router->map( 'GET', '/', function() {
	echo "invalid endpoint";
});

$router->map( 'GET', '/welcome-page', function() {
	require_once __DIR__ .'/onboarding/welcomescreen.php';
});


$router->map( 'POST', '/request-otp', function() {
	require_once __DIR__ .'/onboarding/request-otp.php';
});

$router->map( 'POST', '/verify-otp', function() {
	require_once __DIR__ .'/onboarding/verify-otp.php';
});

$router->map( 'POST', '/city-names', function() {
	require_once __DIR__ .'/onboarding/city-names.php';
});




$router->map( 'POST', '/signup', function() {
	require_once __DIR__ .'/onboarding/signup-mobile.php';
});

$router->map( 'GET', '/course-categories', function() {
	require_once __DIR__ .'/onboarding/course-categories.php';
});

$router->map( 'POST', '/course-details', function() {
	require_once __DIR__ .'/onboarding/course-details.php';
});


$router->map( 'POST', '/single-course-details', function() {
	require_once __DIR__ .'/onboarding/single-course-details.php';
});

$router->map( 'POST', '/course-enroll', function() {
	require_once __DIR__ .'/onboarding/course-enroll.php';
});


$router->map( 'POST', '/student-profile', function() {
	require_once __DIR__ .'/account/student-account.php';
});

$router->map( 'GET', '/guest-home', function() {
	require_once __DIR__ .'/home/guest-home.php';
});


$router->map( 'POST', '/student-home', function() {
	require_once __DIR__ .'/home/student-home.php';
});

$router->map( 'POST', '/student-calendar', function() {
	require_once __DIR__ .'/home/student-calendar.php';
});




$router->map( 'POST', '/subject-contents', function() {
	require_once __DIR__ .'/materials/subject-contents.php';
});


$router->map( 'POST', '/subject-stories', function() {
	require_once __DIR__ .'/materials/subject-stories.php';
});


$router->map( 'POST', '/subject-keynotes', function() {
	require_once __DIR__ .'/materials/subject-keynotes.php';
});


$router->map( 'POST', '/home-tips', function() {
	require_once __DIR__ .'/home/home-tips.php';
});

$router->map( 'POST', '/exam-notifications', function() {
	require_once __DIR__ .'/home/exam-notifications.php';
});

$router->map( 'POST', '/qn-paper', function() {
	require_once __DIR__ .'/home/qn-paper.php';
});


$router->map( 'POST', '/student-notifications', function() {
	require_once __DIR__ .'/notify/notify.php';
});

$router->map( 'POST', '/update-profile', function() {
	require_once __DIR__ .'/account/update-profile.php';
});

$router->map( 'POST', '/notification-key-update', function() {
	require_once __DIR__ .'/account/notification-key-update.php';
});


$router->map( 'POST', '/account-delete', function() {
	require_once __DIR__ .'/account/account-delete.php';
});


$router->map( 'POST', '/send-app-feedback', function() {
	require_once __DIR__ .'/account/send-app-feedback.php';
});


$router->map( 'POST', '/add-to-favorite', function() {
	require_once __DIR__ .'/account/add-to-favorite.php';
});
$router->map( 'POST', '/view-favorite', function() {
	require_once __DIR__ .'/account/view-favorite.php';
});


$router->map( 'POST', '/profile-image-upload', function() {
	require_once __DIR__ .'/account/profile-image-upload.php';
});


$router->map( 'POST', '/student-assignments', function() {
	require_once __DIR__ .'/activity/assignments.php';
});

$router->map( 'POST', '/student-report', function() {
	require_once __DIR__ .'/activity/student-report.php';
});

#### Homepage 

// DEfault home page without login



 
?>