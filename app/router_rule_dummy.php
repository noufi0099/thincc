<?php

 

$router->map( 'GET', '/', function() {
	 
	require_once __DIR__ .'/home-v2.php';
});

$router->map( 'GET', '/home', function() {
	 
	require_once __DIR__ .'/home-v2.php';
});


$router->map( 'GET', '/home-v2', function() {
	 
	require_once __DIR__ .'/home-v2.php';
});


$router->map( 'GET', '/disclosures', function() {
	 
	require_once __DIR__ .'/disclosures.php';
});

$router->map( 'GET', '/admission-prospectus', function() {
	 
	require_once __DIR__ .'/admission-prospectus.php';
});

$router->map( 'GET', '/handbook', function() {
	 
	require_once __DIR__ .'/handbook.php';
});

$router->map( 'GET', '/nirf', function() {
	 
	require_once __DIR__ .'/nirf.php';
});

$router->map( 'GET', '/consultancy', function() {
	 
	require_once __DIR__ .'/consultancy.php';
});

$router->map( 'GET', '/consultancy', function() {
	 
	require_once __DIR__ .'/consultancy.php';
});


$router->map( 'GET', '/fee-structure', function() {
	 
	require_once __DIR__ .'/Fee-structure.php';
});

$router->map( 'POST', '/search-website', function() {
	 
	require_once __DIR__ .'/search-website.php';
});



$router->map( 'GET', '/academic-calender', function() {
	 
	require_once __DIR__ .'/academic-calender.php';
});

$router->map( 'GET', '/Academic-calender', function() {
	 
	require_once __DIR__ .'/academic-calender2.php';
});

 


$router->map( 'GET', '/college-magazine', function() {
	 
	require_once __DIR__ .'/college-magazine.php';
});


$router->map( 'GET', '/gallery', function() {
	 
	require_once __DIR__ .'/gallery1.php';
});


$router->map( 'GET', '/about-us', function() {
	 
	require_once __DIR__ .'/about-us.php';
});

$router->map( 'GET', '/history', function() {
	 
	require_once __DIR__ .'/about-us.php';
});
$router->map( 'GET', '/vision-mission', function() {
	 
	require_once __DIR__ .'/vision-mission.php';
});
$router->map( 'GET', '/milestone', function() {
	 
	require_once __DIR__ .'/milestone.php';
});
$router->map( 'GET', '/motto-college', function() {
	 
	require_once __DIR__ .'/motto_college.php';
});
$router->map( 'GET', '/accreditation', function() {
	 
	require_once __DIR__ .'/accreditation.php';
});
$router->map( 'GET', '/sister-institutions', function() {
	 
	require_once __DIR__ .'/sister_concern2.php';
});
$router->map( 'GET', '/iqac', function() {
	 
	require_once __DIR__ .'/iqac.php';
});
$router->map( 'GET', '/iqac/policies-and-procedures', function() {
	 
	require_once __DIR__ .'/policies-and-procedures.php';
});
$router->map( 'GET', '/internal-quality-assurance-cell', function() {
	 
	require_once __DIR__ .'/iqac.php';
});



$router->map( 'GET', '/controller-of-examination', function() {
	 
	require_once __DIR__ .'/controller-of-examination.php';
});

$router->map( 'GET', '/internal-complaint-committee', function() {
	 
	require_once __DIR__ .'/internal-complaint-committee.php';
});

$router->map( 'GET', '/academic-audit-committee', function() {
	 
	require_once __DIR__ .'/academic-audit-committee.php';
});

$router->map( 'GET', '/principal', function() {
	 
	require_once __DIR__ .'/principal.php';
});

$router->map( 'GET', '/managing-commitee', function() {
	 
	require_once __DIR__ .'/managing-commitee.php';
});

$router->map( 'GET', '/managing-committee', function() {
	 
	require_once __DIR__ .'/managing-commitee.php';
});


$router->map( 'GET', '/former-principals', function() {
	 
	require_once __DIR__ .'/former-principals.php';
});



$router->map( 'GET', '/statutory-bodies', function() {
	 
	require_once __DIR__ .'/governing-council.php';
});


$router->map( 'GET', '/governing-council', function() {
	 
	require_once __DIR__ .'/governing-council.php';
});

$router->map( 'GET', '/academic-council', function() {
	 
	require_once __DIR__ .'/academic-council.php';
});

$router->map( 'GET', '/board-of-studies', function() {
	 
	require_once __DIR__ .'/board-of-studies.php';
});

$router->map( 'GET', '/finance-committee', function() {
	 
	require_once __DIR__ .'/finance-committee.php';
});

$router->map( 'GET', '/the-college-council', function() {
	 
	require_once __DIR__ .'/the-college-council.php';
});



$router->map( 'GET', '/fosa', function() {
	 
	require_once __DIR__ .'/fosa.php';
});

$router->map( 'GET', '/pta', function() {
	 
	require_once __DIR__ .'/pta.php';
});


$router->map( 'GET', '/staff-club', function() {
	 
	require_once __DIR__ .'/staff-club.php';
});

$router->map( 'GET', '/art', function() {
	 
	require_once __DIR__ .'/art.php';
});

$router->map( 'GET', '/anti-ragging-committe', function() {
	 
	require_once __DIR__ .'/anti-ragging-committe.php';
});
$router->map( 'GET', '/anti-ragging-squad', function() {
	 
	require_once __DIR__ .'/anti-ragging-squad.php';
});

$router->map( 'GET', '/grievance-redressal-committee', function() {
	 
	require_once __DIR__ .'/grievance-edressal-committee2.php';
});

$router->map( 'GET', '/grievance-against-sexual-harassment', function() {
	 
	require_once __DIR__ .'/grievance-edressal-committee.php';
});

$router->map( 'GET', '/ethics-committee', function() {
	 
	require_once __DIR__ .'/ethics-committee.php';
});

$router->map( 'GET', '/surprise-inspection-squad', function() {
	 
require_once __DIR__ .'/surprise-inspection-squad.php';

});


$router->map( 'GET', '/women-cell', function() {
	 
require_once __DIR__ .'/women-cell.php';

});

// campus life section

$router->map( 'GET', '/scholarships', function() {
	 
require_once __DIR__ .'/scholarships.php';

});

$router->map( 'GET', '/edu-supports', function() {
	 
require_once __DIR__ .'/edu-supports.php';

});

$router->map( 'GET', '/one-for-one', function() {
	 
require_once __DIR__ .'/one-for-one.php';

});

$router->map( 'GET', '/scholar-support-programme', function() {
	 
require_once __DIR__ .'/scholar-support-programme.php';

});

$router->map( 'GET', '/walk-with-a-scholar', function() {
	 
require_once __DIR__ .'/walk-with-a-scholar.php';

});

$router->map( 'GET', '/ek-bharath-shresht-bharath', function() {
	 
require_once __DIR__ .'/ek-bharath-shresht-bharath.php';

});

$router->map( 'GET', '/enterprenership-career-hub', function() {
	 
require_once __DIR__ .'/enterprenership-career-hub.php';

});

$router->map( 'GET', '/insight', function() {
	 
require_once __DIR__ .'/insight.php';

});


$router->map( 'GET', '/digital-talking-library', function() {
	 
require_once __DIR__ .'/insight2.php';

});


$router->map( 'GET', '/braille-section', function() {
	 
require_once __DIR__ .'/braille-section.php';

});

$router->map( 'GET', '/reprographic-center', function() {
	 
require_once __DIR__ .'/reprographic-center.php';

});
$router->map( 'GET', '/career-corner', function() {
	 
require_once __DIR__ .'/career-corner.php';

});
$router->map( 'GET', '/digital-library', function() {
	 
require_once __DIR__ .'/digital-library.php';

});





$router->map( 'GET', '/radio-club', function() {
	 
require_once __DIR__ .'/radio-club.php';

});
$router->map( 'GET', '/national-cadet-corps', function() {
	 
require_once __DIR__ .'/national-cadet-corps.php';

});
$router->map( 'GET', '/national-service-scheme', function() {
	 
require_once __DIR__ .'/national-service-scheme.php';

});


$router->map( 'GET', '/information-centre', function() {
	 
require_once __DIR__ .'/information-centre.php';

});


$router->map( 'GET', '/statistical-computing-lab', function() {
	 
require_once __DIR__ .'/statistical-computing-lab.php';

});


$router->map( 'GET', '/farook-institute-of-language-skills', function() {
	 
require_once __DIR__ .'/farook-institute-of-language-skills.php';

});

$router->map( 'GET', '/centre-for-cultural-heritage', function() {
	 
require_once __DIR__ .'/centre-for-cultural-heritage.php';

});
$router->map( 'GET', '/audio-production-centre', function() {
	 
require_once __DIR__ .'/audio-production-centre.php';

});
$router->map( 'GET', '/child-line', function() {
	 
require_once __DIR__ .'/child-line.php';

});
$router->map( 'GET', '/daycare-center', function() {
	 
require_once __DIR__ .'/daycare-center.php';

});
$router->map( 'GET', '/dialysis-centre', function() {
	 
require_once __DIR__ .'/dialysis-centre.php';

});

$router->map( 'GET', '/health-centre', function() {
	 
require_once __DIR__ .'/health-centre.php';

});



$router->map( 'GET', '/mappila-studies-and-research-centre', function() {
	 
require_once __DIR__ .'/mappila-studies-and-research-centre.php';

});


$router->map( 'GET', '/pain-and-paliative-clinic', function() {
	 
require_once __DIR__ .'/pain-and-paliative-clinic.php';

});
$router->map( 'GET', '/co-operative-store', function() {
	 
require_once __DIR__ .'/co-operative-store.php';

});

$router->map( 'GET', '/pm-institute', function() {
	 
require_once __DIR__ .'/pm-institute.php';

});

$router->map( 'GET', '/media-lab', function() {
	 
require_once __DIR__ .'/media-lab.php';

});

$router->map( 'GET', '/digital-hub', function() {
	 
require_once __DIR__ .'/digital-hub.php';

});


// campus life ends

$router->map( 'GET', '/Directorate-of-Academics', function() {
	 
	require_once __DIR__ .'/Directorate_of_Academics.php';
});
$router->map( 'GET', '/fial', function() {
	 
	require_once __DIR__ .'/fial.php';
});
$router->map( 'GET', '/NPTEL-chapter', function() {
	 
	require_once __DIR__ .'/NPTEL_Chapter.php';
});
$router->map( 'GET', '/Advisory-scheme', function() {
	 
	require_once __DIR__ .'/Advisory_scheme.php';
});

$router->map( 'GET', '/publication-division', function() {
	 
	require_once __DIR__ .'/publication-division.php';
});


// Academics

$router->map( 'GET', '/Academics', function() {
	 
	require_once __DIR__ .'/Academics_home.php';
});

$router->map( 'GET', '/Academics-study', function() {
	 
	require_once __DIR__ .'/Academics_study.php';
});

$router->map( 'GET', '/Academics-department', function() {
	 
	require_once __DIR__ .'/Academics_department.php';
});
 
$router->map( 'GET', '/Department/[:param1]', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english.php';
});

$router->map( 'GET', '/Academics-study', function() {
	 
	require_once __DIR__ .'/Academics_study.php';
});


$router->map( 'GET', '/Department/[:param1]/', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english.php';
});


$router->map( 'GET', '/Department/[:param1]/pages/[:param2]', function($param1,$param2){

	$_REQUEST['metaurlkey']=$param1;
	$_REQUEST['metaurlkey2']=$param2;

	require_once __DIR__ .'/Academics_department_english_custom_tab.php';
});


$router->map( 'GET', '/Department/[:param1]/achievements', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_achievements.php';
});

$router->map( 'GET', '/Department/[:param1]/activities', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_activities.php';
});

$router->map( 'GET', '/Department/[:param1]/alumni', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_alumni.php';
});


$router->map( 'GET', '/Department/[:param1]/news-and-events', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_news_and_events.php';
});

$router->map( 'GET', '/Department/[:param1]/news-and-events/[:param2]', function($param1,$param2) {

	$_GET['metaurlkey']=$param2;
	$_GET['metaurlkey2']=$param1;
	
	require_once __DIR__ .'/news-single-department.php';
}); 


$router->map( 'GET', '/Department/[:param1]/facilities', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_facilities.php';
});

$router->map( 'GET', '/Department/[:param1]/faculty', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_faculty.php';
});

$router->map( 'GET', '/Department/[:param1]/former-teachers', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_faculty_retired.php';
});


$router->map( 'GET', '/Department/[:param1]/placement', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_placement.php';
});

$router->map( 'GET', '/Department/[:param1]/higher-study', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_studies.php';
});

$router->map( 'GET', '/Department/[:param1]/programme', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_programme.php';
});

$router->map( 'GET', '/Department/[:param1]/research', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_research.php';
});

$router->map( 'GET', '/Department/[:param1]/higher-studies', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/Academics_department_english_higher_studies.php';
});




//Discover




$router->map( 'GET', '/employees-club', function() {
	 
	require_once __DIR__ .'/employees-club.php';
});


$router->map( 'GET', '/blood-donors-forum', function() {
	 
	require_once __DIR__ .'/bloodmateFarook.php';
});


$router->map( 'GET', '/college-students-union', function() {
	 
	require_once __DIR__ .'/college-students-union.php';
});

$router->map( 'GET', '/faculty/[:param1]', function($param1) {
	 
	 $_GET['dpt']=$param1;

	require_once __DIR__ .'/faculty.php';
});

$router->map( 'GET', '/events', function() {
	 
	require_once __DIR__ .'/events.php';
});

$router->map( 'GET', '/blogs', function() {
	 
	require_once __DIR__ .'/blogs.php';
});


$router->map( 'GET', '/blogs/[:param1]', function($param1) {

	$_GET['metaurlkey']=$param1;
	
	require_once __DIR__ .'/blog-single.php';
}); 



$router->map( 'GET', '/event-article', function() {
	 
	require_once __DIR__ .'/event-article.php';
});

$router->map( 'GET', '/event/[:param1]', function($param1) {

	$_GET['metaurlkey']=$param1;
	
	require_once __DIR__ .'/event-single.php';
}); 




$router->map( 'GET', '/news', function() {
	 
	require_once __DIR__ .'/news.php';
});



$router->map( 'GET', '/news/[:param1]', function($param1) {

	$_GET['metaurlkey']=$param1;
	require_once __DIR__ .'/news-single.php';
}); 


$router->map( 'GET', '/anmts-article', function() {
	 
	require_once __DIR__ .'/anmts-article.php';
});


$router->map( 'GET', '/announcements', function() {
	 
	require_once __DIR__ .'/announcements.php';
});

$router->map( 'GET', '/announcements/[:param1]', function($param1) {

	$_GET['metaurlkey']=$param1;
	require_once __DIR__ .'/anmts-article.php';
}); 


// Department

$router->map( 'GET', '/Activities-article', function() {
	 
	require_once __DIR__ .'/Activities-article.php';
});

$router->map( 'GET', '/Facilities-article', function() {
	 
	require_once __DIR__ .'/Facilities-article.php';
});

$router->map( 'GET', '/Projects-article', function() {
	 
	require_once __DIR__ .'/Projects-article.php';
});


$router->map( 'GET', '/Membership-article', function() {
	 
	require_once __DIR__ .'/Membership-article.php';
});


$router->map( 'GET', '/Achievements-article', function() {
	 
	require_once __DIR__ .'/Achievements-article.php';
});

$router->map( 'GET', '/Activities-article', function() {
	 
	require_once __DIR__ .'/Activities-article.php';
});

// $router->map( 'GET', '/', function() {
	 
// 	require_once __DIR__ .'/';
// }); 


$router->map( 'GET', '/Ministerial-staff', function() {
	 
	require_once __DIR__ .'/Ministeral-staff.php';
});

$router->map( 'GET', '/Ministerial-staff/management-staff', function() {
	 
	require_once __DIR__ .'/Ministeral-staff.php';
});
$router->map( 'GET', '/Ministerial-staff/planning-board', function() {
	 
	require_once __DIR__ .'/Ministeral-staff-2.php';
});
$router->map( 'GET', '/Ministerial-staff/college-library', function() {
	 
	require_once __DIR__ .'/Ministeral-staff-3.php';
});
$router->map( 'GET', '/Ministerial-staff/college-office', function() {
	 
	require_once __DIR__ .'/Ministeral-staff-4.php';
});
$router->map( 'GET', '/Ministerial-staff/laboratory-staff', function() {
	 
	require_once __DIR__ .'/Ministeral-staff-5.php';
});
$router->map( 'GET', '/Ministerial-staff/member-in-charge', function() {
	 
	require_once __DIR__ .'/Ministeral-staff-6.php';
});
$router->map( 'GET', '/Ministerial-staff/nts', function() {
	 
	require_once __DIR__ .'/Ministeral-staff-7.php';
});


//Research

$router->map( 'GET', '/research-promotion-council', function() {
	 
	require_once __DIR__ .'/research-promotion-council.php';
});


$router->map( 'GET', '/research-assesment-committee', function() {
	 
	require_once __DIR__ .'/research-assesment-committee.php';
});

$router->map( 'GET', '/research-advisory-committee', function() {
	 
	require_once __DIR__ .'/research-advisory-committee.php';
});

$router->map( 'GET', '/research-advisory-council', function() {
	 
	require_once __DIR__ .'/research-advisory-committee.php';
});


$router->map( 'GET', '/phds-produced', function() {
	 
	require_once __DIR__ .'/phds-produced.php';
});

$router->map( 'GET', '/journals', function() {
	 
	require_once __DIR__ .'/journals.php';
});

$router->map( 'GET', '/research-guides', function() {
	 
	require_once __DIR__ .'/research-guides.php';
});
$router->map( 'GET', '/research-scholars', function() {
	 
	require_once __DIR__ .'/research-scholars.php';
});





// Abussabah-library

$router->map( 'GET', '/abussabah-library', function() {
	 
	require_once __DIR__ .'/abussabah-library.php';
});

$router->map( 'GET', '/infrastructure', function() {
	 
	require_once __DIR__ .'/infrastructure.php';
});

$router->map( 'GET', '/library-collection', function() {
	 
	require_once __DIR__ .'/library-collection.php';
});

$router->map( 'GET', '/computerization', function() {
	 
	require_once __DIR__ .'/computerization.php';
});

$router->map( 'GET', '/services', function() {
	 
	require_once __DIR__ .'/services.php';
});

$router->map( 'GET', '/working-hours', function() {
	 
	require_once __DIR__ .'/working-hours.php';
});

$router->map( 'GET', '/membership', function() {
	 
	require_once __DIR__ .'/membership.php';
});

$router->map( 'GET', '/librarian', function() {
	 
	require_once __DIR__ .'/librarian.php';
});



// footer

$router->map( 'GET', '/contact', function() {
	 
	require_once __DIR__ .'/contact.php';
});

$router->map( 'GET', '/feedback', function() {
	 
	require_once __DIR__ .'/feedback.php';
});


 

 
 $router->map( 'GET', '/student-counselling-centre', function() {
	 
	require_once __DIR__ .'/student-counselling-centre.php';
});

 $router->map( 'GET', '/hostel', function() {
	 
	require_once __DIR__ .'/hostel.php';
});

  $router->map( 'GET', '/search-website', function() {
	 
	require_once __DIR__ .'/search-website.php';
});

    $router->map( 'GET', '/not-found', function() {
	 
	require_once __DIR__ .'/404.php';
});

        $router->map( 'GET', '/loginpanel', function() {
	 
	require_once __DIR__ .'/loginpanel/login.php';
});
            $router->map( 'GET', '/xlp', function() {
	 
	require_once __DIR__ .'/loginpanel/login.php';
});


$router->map( 'GET', '/legacy-of-farookcollege', function() {
	 
	require_once __DIR__ .'/explore1.php';
});


$router->map( 'GET', '/infrastructural-facilities', function() {
	 
	require_once __DIR__ .'/explore2.php';
});
$router->map( 'GET', '/student-support-programmes', function() {
	 
	require_once __DIR__ .'/explore3.php';
});
$router->map( 'GET', '/teaching-and-learning-practices', function() {
	 
	require_once __DIR__ .'/explore4.php';
});
$router->map( 'GET', '/research-and-consultancy-programmes', function() {
	 
	require_once __DIR__ .'/explore5.php';
});
$router->map( 'GET', '/extension-activities-and-best-practices', function() {
	 
	require_once __DIR__ .'/explore6.php';
});
$router->map( 'GET', '/startup-innovation-career-hub', function() {
	 
	require_once __DIR__ .'/explore7.php';
});
$router->map( 'GET', '/alumni-association-fosa', function() {
	 
	require_once __DIR__ .'/explore8.php';
});
$router->map( 'GET', '/study-in-india-programme', function() {
	 
	require_once __DIR__ .'/explore9.php';
});
$router->map( 'GET', '/examination-and-admission-portal', function() {
	 
	require_once __DIR__ .'/explore10.php';
});

$router->map( 'GET', '/departments-and-programmes', function() {
	 
	require_once __DIR__ .'/explore11.php';
});

$router->map( 'GET', '/digital-hub-and-informatic-centre', function() {
	 
	require_once __DIR__ .'/explore12.php';
});

$router->map( 'GET', '/news-and-events', function() {
	 
	require_once __DIR__ .'/news_and_events.php';
});


$router->map( 'GET', '/news-and-events/[:param1]', function($param1) {

	$_GET['metaurlkey']=$param1;
	require_once __DIR__ .'/news-single.php';
}); 


$router->map( 'GET', '/achievements', function() {
	 
	require_once __DIR__ .'/achievements.php';
});

$router->map( 'GET', '/student-achievements', function() {
	 
	require_once __DIR__ .'/achievements_student.php';
});

$router->map( 'GET', '/faculty-achievements', function() {
	 
	require_once __DIR__ .'/achievements_faculty.php';
});

$router->map( 'GET', '/faculty-profile', function() {
	 
	require_once __DIR__ .'/faculty-profile.php';
});


$router->map( 'GET', '/department/[:param1]/faculty/[:param2]', function($param1,$param2){

	$_REQUEST['metaurlkey']=$param2;
	$_REQUEST['metaurlkey2']=$param1;

	require_once __DIR__ .'/faculty-profile.php';
});

$router->map( 'GET', '/department/[:param1]/former-teachers/[:param2]', function($param1,$param2){

	$_REQUEST['metaurlkey']=$param2;
	$_REQUEST['metaurlkey2']=$param1;

	require_once __DIR__ .'/faculty-profile-retired.php';
});

$router->map( 'GET', '/department/[:param1]/research/supervisor/[:param2]', function($param1,$param2){

	$_REQUEST['metaurlkey']=$param2;
	$_REQUEST['metaurlkey2']=$param1;

	require_once __DIR__ .'/research-supervisor-profile.php';
});

$router->map( 'GET', '/department/[:param1]/research/scholar/[:param2]', function($param1,$param2){

	$_REQUEST['metaurlkey']=$param2;
	$_REQUEST['metaurlkey2']=$param1;

	require_once __DIR__ .'/research-scholar-profile.php';
});

$router->map( 'GET', '/ministerial-staff/[:param1]', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/m-faculty-profile.php';
});
$router->map( 'GET', '/ministerial-staff/[:param1]/[:param2]', function($param1,$param2){

	$_REQUEST['metaurlkey']=$param2;
	$_REQUEST['metaurlkey1']=$param1;


	require_once __DIR__ .'/m-faculty-profile.php';
});



$router->map( 'GET', '/files/[:param1]', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/view_uploaded_files.php';
});



$router->map( 'GET', '/naac', function() {
	 
	require_once __DIR__ .'/naac-dvv.php';
});

 

 


$router->map( 'GET', '/naac/[:param1]', function($param1) {

	$_GET['metaurlkey']=$param1;
	require_once __DIR__ .'/naac-dvv.php';
}); 


$router->map( 'GET', '/naac/[:param1]/[:param2]/[:param3]', function($param1,$param2,$param3){

	$_REQUEST['metaurlkey1']=$param1;
	$_REQUEST['metaurlkey2']=$param2;
	$_REQUEST['metaurlkey3']=$param3;
	
	require_once __DIR__ .'/naac-dvv-criterion-content.php';
	
});


$router->map( 'GET', '/message-by-iqac-coordinator', function() {
	 
	require_once __DIR__ .'/iqac-message.php';
});

$router->map( 'GET', '/functions-objectives-of-iqac', function() {
	 
	require_once __DIR__ .'/iqac-functions-and-objectives.php';
});

$router->map( 'GET', '/iqac-core-committee', function() {
	 
	require_once __DIR__ .'/iqac-core-committee.php';
});

$router->map( 'GET', '/iqac-committee', function() {
	 
	require_once __DIR__ .'/iqac-committee.php';
});

$router->map( 'GET', '/iqac-about-survey-and-feedback', function() {
	 
	require_once __DIR__ .'/iqac-about-survey-and-feedback.php';
});

$router->map( 'GET', '/iqac-structured-stakeholder-feedback', function() {
	 
	require_once __DIR__ .'/iqac-structured-stakeholder-feedback.php';
});


$router->map( 'GET', '/iqac-feedback-report', function() {
	 
	require_once __DIR__ .'/iqac-feedback-report.php';
});

$router->map( 'GET', '/iqac-action-taken-reports', function() {
	 
	require_once __DIR__ .'/iqac-action-taken-reports.php';
});

$router->map( 'GET', '/iqac-quality-standards-and-procedures', function() {
	 
	require_once __DIR__ .'/iqac-quality-standards-and-procedures.php';
});

$router->map( 'GET', '/iqac-quality-initiative-reports', function() {
	 
	require_once __DIR__ .'/iqac-quality-initiative-reports.php';
});


$router->map( 'GET', '/iqac-institutional-values', function() {
	 
	require_once __DIR__ .'/iqac-institutional-values.php';
});

$router->map( 'GET', '/iqac-distinctiveness', function() {
	 
	require_once __DIR__ .'/iqac-distinctiveness.php';
});

$router->map( 'GET', '/iqac-best-practices', function() {
	 
	require_once __DIR__ .'/iqac-best-practices.php';
});

$router->map( 'GET', '/iqac-strategic-plan-documents', function() {
	 
	require_once __DIR__ .'/iqac-strategic-plan-documents.php';
});

$router->map( 'GET', '/iqac-external-peer-team-report', function() {
	 
	require_once __DIR__ .'/iqac-external-peer-team-report.php';
});

$router->map( 'GET', '/iqac-autonomous-status-report', function() {
	 
	require_once __DIR__ .'/iqac-autonomous-status-report.php';
});

$router->map( 'GET', '/iqac-minutes-and-proceedings', function() {
	 
	require_once __DIR__ .'/iqac-minutes-and-proceedings.php';
});

$router->map( 'GET', '/iqac-self-study-report', function() {
	 
	require_once __DIR__ .'/iqac-self-study-report.php';
});

$router->map( 'GET', '/iqac-annual-quality-assurance-report', function() {
	 
	require_once __DIR__ .'/iqac-annual-quality-assurance-report.php';
});


$router->map( 'GET', '/iqac-college-annual-reports', function() {
	 
	require_once __DIR__ .'/iqac-college-annual-reports.php';
});

$router->map( 'GET', '/iqac-mandatory-disclosures', function() {
	 
	require_once __DIR__ .'/iqac-mandatory-disclosures.php';
});

$router->map( 'GET', '/explore-fc/[:param1]/pages/[:param2]', function($param1,$param2){

	$_REQUEST['metaurlkey']=$param1;
	$_REQUEST['metaurlkey2']=$param2;

	require_once __DIR__ .'/explore-fc-custom.php';
});


$router->map( 'GET', '/social-orbit', function() {
	 
	require_once __DIR__ .'/journals1.php';
});

$router->map( 'GET', '/majallath-al-sabah-lil-buhooth', function() {
	 
	require_once __DIR__ .'/journals2.php';
});


$router->map( 'GET', '/custom-pages/[:param1]', function($param1){

	$_REQUEST['metaurlkey']=$param1;

	require_once __DIR__ .'/custom-pages.php';
});

$router->map( 'GET', '/custom-pages', function() {
	 
	require_once __DIR__ .'/custom-pages.php';
});


$router->map( 'GET', '/research-proceedings', function() {
	 
	require_once __DIR__ .'/research-proceedings.php';
});

$router->map( 'GET', '/research-projects', function() {
	 
	require_once __DIR__ .'/research-projects.php';
});


?>


