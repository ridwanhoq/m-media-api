<?php

namespace App\Models;

use App\Http\Components\Helpers\BengaliHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Setting extends Model
{

    protected static $logName = "Setting";

    use HasFactory;

    //number rows inserted or updated at once by cron job
    public static $chunk_size = 100;

    //student mainstream plan and followup
    public static $mainstream_plan_enable_after_months     = 0;
    public static $mainstream_first_followup_after_months  = 6;
    public static $mainstream_second_followup_after_months = 18;

    //sms environment whether real sms to be sent or not
    public static $sms_environment = 'live';

    //cron environment whether scheduling to be used or not
    public static $cron_environment = 'demo';

    //to truncate database except some basic data needs to run the application
    public static $truncate_allowed = 0;

    //role permission
    public static $superAdminRoleName = 'SUPER ADMIN';
    public static $adminRoleName      = 'ADMIN';

    //districtwise restriction status checks
    public static $role_permission_enable                   = 1; //districtwise restriction
    public static $view_own_district_geo_for_teacher        = 0; //only own district upazila show in dropdown of teacher create, edit form
    public static $view_own_district_geo_for_staff          = 0; //only own district upazila show in dropdown of staff create, edit form
    public static $view_own_district_geo_for_student        = 0; //only own district upazila show in dropdown of student create, edit form
    public static $can_crud_own_district_center             = 1; //can add, edit, delete own district center only
    public static $can_crud_own_district_teacher            = 1; //can add, edit, delete own district center's teacher only
    public static $can_crud_own_district_student            = 1; //can add, edit, delete own district student only
    public static $can_view_own_district_cash_transfer      = 1; //can view own district cash transfers only
    public static $can_view_own_district_evaluation         = 1; //can view own district evaluation only
    public static $can_crud_own_district_attendance         = 1; //can crud own district attendance only
    public static $can_view_own_district_ppe_score          = 1; //can view own district ppe score onoly 
    public static $can_view_own_district_ppe_syllabus       = 1; //can view own district ppe syllabus onoly 
    public static $can_view_own_district_mgml_score         = 1; //can view own district mgml score only
    public static $can_view_own_district_mgml_cycls         = 1; //can view own district mgml cycles only
    public static $can_view_own_district_mgml_subjects      = 1; //can view own district mgml subjects only
    public static $can_view_own_district_mgml_syllabus      = 1; //can view own district mgml syllabus only
    public static $can_crud_own_district_cmc                = 1; //can crud own district cmc members only
    public static $can_edit_own_distric_center_setting      = 1; //can edit own district center setting only
    public static $can_view_own_district_lc_score           = 1; //can view own district lc score overview only
    public static $can_view_own_district_learner_assessment = 1; //can view own district learner assesment only
    public static $can_crud_own_district_staff              = 1; //can crud own district staff only
    public static $can_crud_own_district_notice             = 1; //can crud own district notice only
    public static $can_crud_own_district_training           = 1; //can crud own district training only
    public static $can_crud_own_district_survey             = 1; //can crud own district survey only
    public static $can_crud_own_district_complain           = 1; //can crud own district complain only
    public static $can_crud_own_district_admin              = 1; //can crud own district admin only


    //allowed extra x days to enter student score for ppe and mgml
    //by default 4 days extra after the unit ends i.e. 34 days from unit start date
    public static $extra_days_to_save_score         = 4;
    public static $extra_days_to_save_score_admin   = 30;

    //overall score after each 4 months
    public static $overall_score_after_months       = 4;

    //old data entry module enable/disable
    public static $student_assessment_manual        = 1;
    public static $terminal_competency_manual       = 1;

    //old center data modify to adjust cycle, unit
    public static $center_educational_info          = 1;

    //center batch system
    public static $has_center_multiple_batches      = 0;



    /**
     * starts
     */

    public static function transaction_statuses_array()
    {
        return [
            1   => ["en" => "Pending", "key" => 1],
            2   => ["en" => "Processing", "key" => 2],
            3   => ["en" => "Approved", "key" => 3],
            4   => ["en" => "Denied", "key" => 4],
            5   => ["en" => "Cancelled", "key" => 5]
        ];
    }














    /**
     * ends
     */

    public static function staff_roles()
    {
        return [
            1 => ['name_en' => 'Project Director', 'name_bn' => 'প্রকল্প পরিচালক', 'ln_name_en' => 'PD/PM/PC', 'ln_name_bn' => 'পিডি/পিএম/পিসি', 'slug' => 'project_director', 'key' => 'pd', 'index_key' => 1],
            2 => ['name_en' => 'District Co-ordinator', 'name_bn' => 'জেলা সমন্বয়কারী', 'ln_name_en' => 'DC/C4DC/C&FAC/Finance/M&E', 'ln_name_bn' => 'ডিসি/সি৪ডিসি/সি এন্ড এফএসি/ফাইন্যান্স', 'slug' => 'district_co_oordinator', 'key' => 'dc', 'index_key' => 2],
            3 => ['name_en' => 'Upazilla Co-ordinator', 'name_bn' => 'উপজেলা সমন্বয়কারী', 'ln_name_en' => 'UC/AC', 'ln_name_bn' => 'ইউসি/এসি', 'slug' => 'upazilla_co_ordinator', 'key' => 'uc', 'index_key' => 3],
            4 => ['name_en' => 'Technical Officer', 'name_bn' => 'টেকনিক্যাল কর্মকর্তা', 'ln_name_en' => 'TO/TC', 'ln_name_bn' => 'টিও/টিএসি', 'slug' => 'technical_officer', 'key' => 'to', 'index_key' => 4],
            5 => ['name_en' => 'Program Organizer', 'name_bn' => 'প্রকল্প কর্মকর্তা', 'ln_name_en' => 'PO', 'ln_name_bn' => 'পিও', 'slug' => 'project_officer', 'key' => 'po', 'index_key' => 5],
        ];
    }

    public static function staff_roles_only($index = 'name_en')
    {
        $out_array = [];
        foreach (self::staff_roles() as $key => $array) {
            $out_array[$key] = $array[$index];
        }
        return $out_array;
    }

    public static function genders_array()
    {
        return [
            1 => ['en' => 'Male', 'bn' => 'পুরুষ', 'ln_name_en' => 'Boy', 'key' => 1],
            2 => ['en' => 'Female', 'bn' => 'মহিলা', 'ln_name_en' => 'Girl', 'key' => 2],
            3 => ['en' => 'Other', 'bn' => 'অন্যান্য', 'ln_name_en' => 'Others', 'key' => 3],
        ];
    }

    public static function months_array()
    {
        return [
            1  => ['en' => 'January', 'bn' => 'জানুয়ারি', 'key' => 1],
            2  => ['en' => 'February', 'bn' => 'ফেব্রুয়ারি', 'key' => 2],
            3  => ['en' => 'March', 'bn' => 'মার্চ', 'key' => 3],
            4  => ['en' => 'April', 'bn' => 'এপ্রিল', 'key' => 4],
            5  => ['en' => 'May', 'bn' => 'মে', 'key' => 5],
            6  => ['en' => 'June', 'bn' => 'জুন', 'key' => 6],
            7  => ['en' => 'July', 'bn' => 'জুলাই', 'key' => 7],
            8  => ['en' => 'August', 'bn' => 'আগস্ট', 'key' => 8],
            9  => ['en' => 'September', 'bn' => 'সেপ্টেম্বর', 'key' => 9],
            10 => ['en' => 'October', 'bn' => 'অক্টোবর', 'key' => 10],
            11 => ['en' => 'November', 'bn' => 'নভেম্বর', 'key' => 11],
            12 => ['en' => 'December', 'bn' => 'ডিসেম্বর', 'key' => 12],
        ];
    }

    public static function religions_array()
    {
        return [
            10 => ['en' => 'Islam', 'bn' => 'ইসলাম', 'key' => 10],
            20 => ['en' => 'Hindu', 'bn' => 'হিন্দু', 'key' => 20],
            30 => ['en' => 'Budist', 'bn' => 'বৌদ্ধ', 'key' => 30],
            40 => ['en' => 'Christian', 'bn' => 'খ্রিষ্টান', 'key' => 40],
        ];
    }

    public static function education_qualification_array()
    {
        return [
            10 => ['en' => 'No Education', 'bn' => 'শিক্ষা নেই', 'key' => 10],
            20 => ['en' => 'Primary Level', 'bn' => 'প্রাইমারী', 'key' => 20],
            30 => ['en' => 'Lower Secondary Level', 'bn' => 'নিম্ন মাধ্যমিক', 'key' => 30],
            40 => ['en' => 'S.S.C', 'bn' => 'এস.এস.সি', 'key' => 40],
            50 => ['en' => 'H.S.C', 'bn' => 'এইচ.এস.সি', 'key' => 50],
            60 => ['en' => 'Graduation', 'bn' => 'স্নাতক', 'key' => 60],
            70 => ['en' => 'Masters', 'bn' => 'মাস্টার্স', 'key' => 70],
        ];
    }

    public static function marital_status_array()
    {
        return [
            1 => ['en' => 'Married', 'bn' => 'বিবাহিত', 'key' => 1],
            2 => ['en' => 'Unmarried', 'bn' => 'অবিবাহিত', 'key' => 2],
            3 => ['en' => 'Widowed', 'bn' => 'বিধবা', 'key' => 3],
        ];
    }

    public static function employment_status_array()
    {
        return [
            10 => ['en' => 'Active', 'bn' => 'সক্রিয়', 'key' => 10],
            20 => ['en' => 'Replaced', 'bn' => 'প্রতিস্থাপিত', 'key' => 20],
            30 => ['en' => 'Resigned', 'bn' => 'পদত্যাগ করেছেন', 'key' => 30],
        ];
    }

    public static function employee_assigned_or_not_array()
    {
        return [
            1 => ['en' => 'Assigned', 'bn' => '', 'key' => 1],
            2 => ['en' => 'Not Assigned', 'bn' => '', 'key' => 2],
        ];
    }

    public static function leave_status_array()
    {
        return [
            10 => ['en' => 'Maternity Leave', 'bn' => 'মাতৃত্বকালীন ছুটি', 'key' => 10],
            20 => ['en' => 'Sick Leave', 'bn' => 'অসুস্থতাজনিত ছুটি', 'key' => 20],
            30 => ['en' => 'Casual Leave', 'bn' => 'নৈমিত্তিক ছুটি', 'key' => 30],
            40 => ['en' => 'Short Leave', 'bn' => 'সংক্ষিপ্ত ছুটি', 'key' => 40],
        ];
    }

    public static function teaching_experience_array()
    {
        return [
            10 => ['en' => 'Below 1 year', 'bn' => '১ বছরের নিচে', 'key' => 10],
            20 => ['en' => '1 Year', 'bn' => '১ বছর', 'key' => 20],
            30 => ['en' => '2 Years', 'bn' => '২ বছর', 'key' => 30],
            40 => ['en' => 'Above 10 Years', 'bn' => '১০ বছরের উপরে', 'key' => 40],
        ];
    }

    public static function student_statuses_array()
    {
        return [
            1 => ['en' => 'Active', 'bn' => 'সক্রিয়', 'key' => 1],
            2 => ['en' => 'Dropout', 'bn' => 'ড্রপআউট', 'key' => 2],
            3 => ['en' => 'Irregular', 'bn' => 'অনিয়মিত', 'key' => 3],
            4 => ['en' => 'Replaced', 'bn' => 'প্রতিস্থাপিত', 'key' => 4],
            5 => ['en' => 'Main Stream', 'bn' => 'মূল ধারা', 'key' => 5], //if student status is mainstream i.e. 5 then update student education_status of students table should be updated 2 means complete
            6 => ['en' => 'Others', 'bn' => 'অন্যান্য', 'key' => 6],
        ];
    }

    public static function ethnicity_types_array()
    {
        return [
            10 => ['en' => 'Chakma', 'bn' => 'চাকমা', 'key' => 10],
            20 => ['en' => 'Garo', 'bn' => 'গারো', 'key' => 20],
            30 => ['en' => 'Kuki', 'bn' => 'কুকি', 'key' => 30],
            40 => ['en' => 'Marma', 'bn' => 'মারমা', 'key' => 40],
            50 => ['en' => 'Not Applicable', 'bn' => 'প্রযোজ্য নয়', 'key' => 50],
            60 => ['en' => 'Others', 'bn' => 'অন্যান্য', 'key' => 60],
        ];
    }

    public static function disability_types_array()
    {
        return [
            1 => ['en' => 'Not Applicable', 'bn' => 'প্রযোজ্য নয়', 'key' => 1],
            2 => ['en' => 'Physical', 'bn' => 'শারীরিক', 'key' => 2],
            3 => ['en' => 'Mental', 'bn' => 'মানসিক', 'key' => 3],
            4 => ['en' => 'Speech', 'bn' => 'বাক', 'key' => 4],
            5 => ['en' => 'Hearing', 'bn' => 'শ্রবণ', 'key' => 5],
            6 => ['en' => 'Vision', 'bn' => 'দৃষ্টি', 'key' => 6],
            7 => ['en' => 'Multiple', 'bn' => 'একাধিক', 'key' => 7],
            8 => ['en' => 'Other', 'bn' => 'অন্যান্য', 'key' => 8],
        ];
    }

    public static function disability_degrees_array()
    {
        return [
            1 => ['en' => 'Low', 'bn' => 'কম', 'key' => 1],
            2 => ['en' => 'Moderate', 'bn' => 'পরিমিত', 'key' => 2],
            3 => ['en' => 'Severe', 'bn' => 'গুরুতর', 'key' => 3],
            4 => ['en' => 'Not Applicable', 'bn' => 'প্রযোজ্য নয়', 'key' => 4],
        ];
    }

    public static function yes_no_array()
    {
        return [
            1 => ['en' => 'yes', 'bn' => 'হ্যাঁ', 'key' => 1],
            2 => ['en' => 'no', 'bn' => 'না', 'key' => 2],
        ];
    }

    public static function weights_array()
    {
        return [
            1 => ['en' => 'Below 21', 'bn' => '২১ এর নিচে', 'key' => 1],
            2 => ['en' => '21-25', 'bn' => '২১-২৫', 'key' => 2],
            3 => ['en' => '26-30', 'bn' => '২৬-৩০', 'key' => 3],
            4 => ['en' => '31-35', 'bn' => '৩১-৩৫', 'key' => 4],
            5 => ['en' => '36-40', 'bn' => '৩৬-৪০', 'key' => 5],
            6 => ['en' => '41-45', 'bn' => '৪১-৪৫', 'key' => 6],
            7 => ['en' => '46-50', 'bn' => '৪৬-৫০', 'key' => 7],
            8 => ['en' => 'Avobe 50', 'bn' => '৫০ এর উপরে', 'key' => 8],
        ];
    }

    public static function heights_array()
    {
        return [
            1  => ['en' => 'Below 100 c.m', 'bn' => '১০০ সেঃমিঃ এর নিচে', 'key' => 1],
            2  => ['en' => '101-105 c.m', 'bn' => '১০১-১০৫ সেঃমিঃ', 'key' => 2],
            3  => ['en' => '106-110 c.m', 'bn' => '১০৬-১১০ সেঃমিঃ', 'key' => 3],
            4  => ['en' => '111-115 c.m', 'bn' => '১১১-১১৫ সেঃমিঃ', 'key' => 4],
            5  => ['en' => '116-120 c.m', 'bn' => '১১৬-১২০ সেঃমিঃ', 'key' => 5],
            6  => ['en' => '121-125 c.m', 'bn' => '১২১-১২৫ সেঃমিঃ', 'key' => 6],
            7  => ['en' => '126-130 c.m', 'bn' => '১২৬-১৩০ সেঃমিঃ', 'key' => 7],
            8  => ['en' => '131-135 c.m', 'bn' => '১৩১-১৩৫ সেঃমি', 'key' => 8],
            9  => ['en' => '136-140 c.m', 'bn' => '১৩৬-১৪০ সেঃমি', 'key' => 9],
            10 => ['en' => '141-145 c.m', 'bn' => '১৪১-১৪৫ সেঃমি', 'key' => 10],
            11 => ['en' => '146-150 c.m', 'bn' => '১৪৬-১৫০ সেঃমি', 'key' => 11],
            12 => ['en' => '151-155 c.m', 'bn' => '১৫১-১৫৫ সেঃমি', 'key' => 12],
            13 => ['en' => '156-160 c.m', 'bn' => '১৫৬-১৬০ সেঃমি', 'key' => 13],
            14 => ['en' => 'Avobe160 c.m', 'bn' => '১৬০ সেঃমি এর উপরে', 'key' => 14],
        ];
    }

    public static function good_bad_array()
    {
        return [
            1 => ['en' => 'Good', 'bn' => 'ভাল', 'key' => 1],
            2 => ['en' => 'Not so good', 'bn' => 'মোটামুটি', 'key' => 2],
            3 => ['en' => 'Bad', 'bn' => 'ভাল নয়', 'key' => 3],
        ];
    }

    public static function relations_array()
    {
        return [
            1 => ['en' => 'Father', 'bn' => 'বাবা', 'key' => 1],
            2 => ['en' => 'Mother', 'bn' => 'মা', 'key' => 2],
            3 => ['en' => 'Sister', 'bn' => 'বোন', 'key' => 3],
            4 => ['en' => 'Brother', 'bn' => 'ভাই', 'key' => 4],
            5 => ['en' => 'Others', 'bn' => 'অন্যান্য', 'key' => 5],
        ];
    }

    public static function professions_array()
    {
        return [
            1  => ['en' => 'Housewife', 'bn' => 'গৃহিণী', 'key' => 1],
            2  => ['en' => 'Govt Service', 'bn' => 'সরকারি চাকুরি', 'key' => 2],
            3  => ['en' => 'Non Govt Service', 'bn' => 'বেসরকারি চাকুরি', 'key' => 3],
            4  => ['en' => 'Day Labour', 'bn' => 'শ্রমিক', 'key' => 4],
            5  => ['en' => 'Own Business', 'bn' => 'নিজস্ব ব্যাবসা', 'key' => 5],
            6  => ['en' => 'Samll Business', 'bn' => 'ছোট ব্যাবসা', 'key' => 6],
            7  => ['en' => 'Living Abroad', 'bn' => 'প্রবাসী', 'key' => 7],
            8  => ['en' => 'Teaching', 'bn' => 'শিক্ষকতা', 'key' => 8],
            9  => ['en' => 'Fisherman', 'bn' => 'জেলে', 'key' => 9],
            10 => ['en' => 'Farmer', 'bn' => 'কৃষক', 'key' => 10],
            11 => ['en' => 'Others', 'bn' => 'অন্যান্য', 'key' => 11],
        ];
    }

    public static function monthly_incomes_array()
    {
        return [
            1  => ['en' => 'Below 3000 TK', 'bn' => '৩০০০ টাকার নিচে', 'key' => 1],
            2  => ['en' => '3000 TK', 'bn' => '৩০০ টাকা', 'key' => 2],
            3  => ['en' => '4000 TK', 'bn' => '৪০০০ টাকা', 'key' => 3],
            4  => ['en' => '5000 TK', 'bn' => '৫০০০ টাকা', 'key' => 4],
            5  => ['en' => '6000 TK', 'bn' => '৬০০০ টাকা', 'key' => 5],
            6  => ['en' => '7000 TK', 'bn' => '৭০০০ টাকা', 'key' => 6],
            7  => ['en' => '8000 TK', 'bn' => '৮০০০ টাকা', 'key' => 7],
            8  => ['en' => '9000 TK', 'bn' => '৯০০০ টাকা', 'key' => 8],
            9  => ['en' => '10000 TK', 'bn' => '১০,০০০ টাকা', 'key' => 9],
            10 => ['en' => '11000 TK', 'bn' => '১১,০০০ টাকা', 'key' => 10],
            11 => ['en' => '12000 TK', 'bn' => '১২,০০০ টাকা', 'key' => 11],
            12 => ['en' => '13000 TK', 'bn' => '১৩,০০০ টাকা', 'key' => 12],
            13 => ['en' => '14000 TK', 'bn' => '১৪,০০০ টাকা', 'key' => 13],
            14 => ['en' => '15000 TK', 'bn' => '১৫,০০০ টাকা', 'key' => 14],
            15 => ['en' => 'Avobe 15000 TK', 'bn' => '১৫,০০০ টাকার উপরে', 'key' => 15],
        ];
    }

    public static function evaluations_categories_array()
    {
        return [
            1 => ['en' => 'Class conduction', 'bn' => 'ক্লাস সঞ্চালন', 'key' => 1],
            2 => ['en' => 'Evaluation', 'bn' => 'মূল্যায়ন', 'key' => 2],
            3 => ['en' => 'Community Engagement', 'bn' => 'সামাজিক অংশগ্রহণ', 'key' => 3],
            4 => ['en' => 'Documentation', 'bn' => 'ডকুমেন্টেশন', 'key' => 4],
        ];
    }
    public static function evaluations_days_array()
    {
        return [
            1 => ['en' => '3', 'bn' => '৩', 'key' => 1],
            2 => ['en' => '7', 'bn' => '৭', 'key' => 2],
            3 => ['en' => '10', 'bn' => '১০', 'key' => 3],
            4 => ['en' => '10+', 'bn' => '১০+', 'key' => 4],
        ];
    }
    public static function staff_after_visit_advices_array()
    {
        return [
            1  => ["en" => "Attendance has increased", "bn" => "উপস্থিতি বৃদ্ধি পেয়েছে", 'key' => 1],
            2  => ["en" => "Daily lesson plan has been properly formulated", "bn" => "দৈনিক পাঠ পরিকল্পনা সঠিকভাবে প্রণয়ন করা হয়েছে", 'key' => 2],
            3  => ["en" => "Lesson based materials have been used properly", "bn" => "পাঠ ভিত্তিক উপকরণ সঠিকভাবে ব্যবহার করা হয়েছে", 'key' => 3],
            4  => ["en" => "Teacher presentation has been significantly improved", "bn" => "শিক্ষকের উপস্থাপনা উল্লেখযোগ্যভাবে উন্নত করা হয়েছে", 'key' => 4],
            5  => ["en" => "Time management has been done routinely", "bn" => "সময় ব্যবস্থাপনা নিয়মিত করা হয়েছে", 'key' => 5],
            6  => ["en" => "Procedures have been followed properly", "bn" => "পদ্ধতি যথাযথভাবে অনুসরণ করা হয়েছে", 'key' => 6],
            7  => ["en" => "Learning-Teaching process has been followed", "bn" => "শিখন-শেখানো প্রক্রিয়া অনুসরণ করা হয়েছে", 'key' => 7],
            8  => ["en" => "Individual work record", "bn" => "ব্যক্তিগত কাজের রেকর্ড", 'key' => 8],
            9  => ["en" => "Register update has been kept", "bn" => "রেজিস্টার আপডেট রাখা হয়েছে", 'key' => 9],
            10 => ["en" => "Learner progress is properly documented", "bn" => "শিক্ষার্থীদের অগ্রগতি সঠিকভাবে নথিভুক্ত করা হয়", 'key' => 10],
            11 => ["en" => "Learner participation in group work is ensured", "bn" => "দলগত কাজে শিক্ষার্থীদের অংশগ্রহণ নিশ্চিত করা হয়", 'key' => 11],
            12 => ["en" => "Classroom is properly decorated", "bn" => "শ্রেণীকক্ষ যথাযথভাবে সাজানো হয়েছে", 'key' => 12],
            13 => ["en" => "Community participation is increased", "bn" => "সামাজিক অংশগ্রহণ বেড়েছে", 'key' => 13],
            14 => ["en" => "Stock is being managed properly", "bn" => "স্টক সঠিকভাবে পরিচালনা করা হচ্ছে", 'key' => 14],
            15 => ["en" => "Hygiene is being maintained", "bn" => "পরিচ্ছন্নতা বজায় রাখা হচ্ছে", 'key' => 15],
            16 => ["en" => "Parents are consulted about student health and nutrition", "bn" => "শিক্ষার্থীদের স্বাস্থ্য এবং পুষ্টি সম্পর্কে অভিভাবকদের সাথে পরামর্শ করা হয়", 'key' => 16],
            17 => ["en" => "Parental monitoring has been increased", "bn" => "অভিভাবকদের নজরদারি বাড়ানো হয়েছে", 'key' => 17],
            18 => ["en" => "Children are being behaved well", "bn" => "শিশুদের ভালো ব্যবহার করা হচ্ছে", 'key' => 18],
            19 => ["en" => "Children have access to drinking water", "bn" => "শিশুদের পানীয় জলের অ্যাক্সেস আছে", 'key' => 19],
            20 => ["en" => "access to Toilets  ", "bn" => "টয়লেট অ্যাক্সেস আছে", 'key' => 20],
        ];
    }
    public static function attendace_percentage_array()
    {
        return [
            1 => ['en' => 'A', 'bn' => 'এ', 'description_en' => 'Attendance Percentage 90%-100% (A)', 'description_bn' => 'উপস্থিতি হার ৯০%-১০০%', 'key' => 1],
            2 => ['en' => 'B', 'bn' => 'বি', 'description_en' => 'Attendance Percentage 80%-89% (B)', 'description_bn' => 'উপস্থিতি হার ৮০%-৮৯%', 'key' => 2],
            3 => ['en' => 'C', 'bn' => 'সি', 'description_en' => 'Attendance Percentage Less than 80% (C)', 'description_bn' => 'উপস্থিতি হার ৮০% এর নিচে', 'key' => 3],
        ];
    }
    public static function centers_grades_array()
    {
        return [
            5 => ['en' => 'A', 'bn' => 'এ', 'description_en' => "80-100", 'description_bn' => '৮০-১০০', 'key' => 5],
            3 => ['en' => 'B', 'bn' => 'বি', 'description_en' => "50-79", 'description_bn' => '৫০-৭৯', 'key' => 3],
            0 => ['en' => 'C', 'bn' => 'সি', 'description_en' => "0-49", 'description_bn' => '০-৪৯', 'key' => 0],
        ];
    }

    public static function evaluations_grades_array()
    {
        return [
            1 => ['en' => 'Yes', 'bn' => 'হ্যাঁ', 'mark' => 5, 'key' => 1],
            2 => ['en' => 'Partial', 'bn' => 'আংশিক', 'mark' => 3, 'key' => 2],
            3 => ['en' => 'No', 'bn' => 'না', 'mark' => 0, 'key' => 3],
        ];
    }
    public static function quarter_array()
    {
        return [
            1 => ['en' => 'April', 'bn' => 'এপ্রিল', 'key' => 1],
            2 => ['en' => 'August', 'bn' => 'আগস্ট', 'key' => 2],
            3 => ['en' => 'December', 'bn' => 'ডিসেম্বর', 'key' => 3],
        ];
    }

    public static function enrollment_grades_array()
    {
        return [
            1 => ['en' => 'G1', 'bn' => 'জি১', 'key' => 1],
            2 => ['en' => 'G2', 'bn' => 'জি২', 'key' => 2],
            3 => ['en' => 'G3', 'bn' => 'জি৩', 'key' => 3],
            4 => ['en' => 'G4', 'bn' => 'জি৪', 'key' => 4],
            5 => ['en' => 'G5', 'bn' => 'জি৫', 'key' => 5],
            6 => ['en' => 'Not Applicable', 'bn' => 'প্রযোজ্য  নয়', 'key' => 6],
        ];
    }

    public static function admitted_classes_array()
    {
        return [
            1 => ['en' => 'First', 'bn' => 'প্রথম', 'key' => 1],
            2 => ['en' => 'Second', 'bn' => 'দ্বিতীয়', 'key' => 2],
            3 => ['en' => 'Third', 'bn' => 'তৃতীয়', 'key' => 3],
            4 => ['en' => 'Fourth', 'bn' => 'চতুর্থ', 'key' => 4],
            5 => ['en' => 'Fifth', 'bn' => 'পঞ্চম', 'key' => 5],
            6 => ['en' => 'Sixth', 'bn' => 'ষষ্ঠ', 'key' => 6],
        ];
    }

    public static function institution_types_array()
    {
        return [
            1 => ['en' => 'GPS', 'bn' => 'জি পি এস', 'key' => 1],
            2 => ['en' => 'KG', 'bn' => 'কেজি', 'key' => 2],
            3 => ['en' => 'Secondary', 'bn' => 'মাধ্যমিক', 'key' => 3],
            4 => ['en' => 'NNPS', 'bn' => 'এন এন পি এস', 'key' => 4],
            5 => ['en' => 'Ebtedayee', 'bn' => 'এবতেদায়ি', 'key' => 5],
            6 => ['en' => 'Others', 'bn' => 'অন্যান্য', 'key' => 6],
        ];
    }

    public static function student_mainstream_followup_remarks_array()
    {
        return [
            1 => ['en' => 'Running and regular', 'bn' => 'চলমান এবং নিয়মিত', 'key' => 1],
            2 => ['en' => 'Running but irregular', 'bn' => 'চলছে কিন্তু অনিয়মিত', 'key' => 2],
            3 => ['en' => 'Dropout', 'bn' => 'বাদ পড়া', 'key' => 3],
        ];
    }

    public static function dropout_reasons_array()
    {
        return [
            1 => ['en' => 'Distance', 'bn' => 'পারিবারিক দূরত্ব', 'key' => 1],
            2 => ['en' => 'Proverty', 'bn' => 'দারিদ্র্য', 'key' => 2],
            3 => ['en' => 'Family Awareness', 'bn' => 'পারিবারিক সচেতনতা', 'key' => 3],
            4 => ['en' => 'Working child', 'bn' => 'শিশু শ্রমিক', 'key' => 4],
            5 => ['en' => 'Inattentive', 'bn' => 'অমনযোগী', 'key' => 5],
            6 => ['en' => 'Migration', 'bn' => 'মাইগ্রেশন', 'key' => 6],
            7 => ['en' => 'Others', 'bn' => 'অন্যান্য', 'key' => 7],
        ];
    }

    public static function employer_relationships_array()
    {
        return [
            1 => ['en' => 'Manager', 'bn' => 'ম্যানেজার', 'key' => 1],
            2 => ['en' => 'Others', 'bn' => 'অন্যান্য', 'key' => 2],
        ];
    }

    public static function work_types_array()
    {
        return [
            1 => ['en' => 'Labour', 'bn' => 'শ্রমিক', 'key' => 1],
            2 => ['en' => 'Others', 'bn' => 'অন্যান্য', 'key' => 2],
        ];
    }

    public static function work_durations_array()
    {
        return [
            1  => ['en' => 'Below 1', 'bn' => '১ এর নিচে', 'key' => 1],
            2  => ['en' => '1', 'bn' => '১', 'key' => 2],
            3  => ['en' => '2', 'bn' => '২', 'key' => 3],
            4  => ['en' => '3', 'bn' => '৩', 'key' => 4],
            5  => ['en' => '4', 'bn' => '৪', 'key' => 5],
            6  => ['en' => '5', 'bn' => '৫', 'key' => 6],
            7  => ['en' => '6', 'bn' => '৬', 'key' => 7],
            8  => ['en' => '7', 'bn' => '৭', 'key' => 8],
            9  => ['en' => '8', 'bn' => '৮', 'key' => 9],
            10 => ['en' => '9', 'bn' => '৯', 'key' => 10],
            11 => ['en' => '10', 'bn' => '১০', 'key' => 11],
            12 => ['en' => 'Above 10', 'bn' => '১০ এর উপরে', 'key' => 12],
        ];
    }

    public static function cmc_designations_array()
    {
        return [
            1 => ['en' => 'Parent', 'bn' => 'পিতামাতা', 'key' => 1],
            2 => ['en' => 'Member', 'bn' => 'সদস্য', 'key' => 2],
            3 => ['en' => 'Chairman', 'bn' => 'চেয়ারম্যান', 'key' => 3],
            4 => ['en' => 'Co-chairman', 'bn' => 'দায়িত্ব প্রাপ্ত চেয়ারম্যান', 'key' => 4],
        ];
    }

    public static function ppe_grade_points_array()
    {
        return [
            5 => ['en' => 'A', 'bn' => 'এ', 'description_en' => 'Good', 'description_bn' => '', 'key' => 5],
            3 => ['en' => 'B', 'bn' => 'বি', 'description_en' => 'Moderate', 'description_bn' => '', 'key' => 3],
            1 => ['en' => 'C', 'bn' => 'সি', 'description_en' => 'Need Improvement', 'description_bn' => '', 'key' => 1],
        ];
    }

    public static function notice_types_array()
    {
        return [
            ['en' => 'All', 'bn' => 'সকল'],
            ['en' => 'Teacher', 'bn' => 'শিক্ষক'],
            ['en' => 'Staff', 'bn' => 'সহকর্মী'],
            ['en' => 'All Teacher', 'bn' => 'সকল শিক্ষক'],
            ['en' => 'All Staff', 'bn' => 'সকল সহকর্মী']
        ];
    }

    public static function mgml_grade_points_array()
    {
        return [
            5 => ['en' => 'A+', 'bn' => 'এ+', 'description_en' => 'Fully Achieved: 80% -100%', 'description_bn' => '', 'grade_point_en' => 5, 'grade_point_bn' => BengaliHelper::bn_number(5), 'key' => "5"],
            4 => ['en' => 'A', 'bn' => 'এ', 'description_en' => 'Mostly Achieved: 70% -79%', 'description_bn' => '', 'grade_point_en' => 4, 'grade_point_bn' => BengaliHelper::bn_number(4), 'key' => "4"],
            3 => ['en' => 'A-', 'bn' => 'এ-', 'description_en' => 'Partially Achieved: 60% -69%', 'description_bn' => '', 'grade_point_en' => 3.5, 'grade_point_bn' => BengaliHelper::bn_number(3.5), 'key' => "3.5"],
            2 => ['en' => 'B', 'bn' => 'বি', 'description_en' => 'Partially deficits: 50% -59%', 'description_bn' => '', 'grade_point_en' => 3, 'grade_point_bn' => BengaliHelper::bn_number(3), 'key' => "3"],
            1 => ['en' => 'C', 'bn' => 'সি', 'description_en' => 'Mostly deficits: 40% -49%', 'description_bn' => '', 'grade_point_en' => 2, 'grade_point_bn' => BengaliHelper::bn_number(2), 'key' => "2"],
            0 => ['en' => 'F', 'bn' => 'এফ', 'description_en' => 'Not achieved: Less than 40%', 'description_bn' => '', 'grade_point_en' => 0, 'grade_point_bn' => BengaliHelper::bn_number(0), 'key' => "0"],
        ];
    }

    //if(>4 <5 then show value of index 5, >3 <3.5 then)

    public static function mgml_cycles_array()
    {
        return [
            1 => ['en' => 'Red Group', 'bn' => 'লাল দল', 'en_cycle_text' => 'Cycle 1', 'bn_cycle_text' => 'Cycle 1', 'key' => 1],
            2 => ['en' => 'Yellow Group', 'bn' => 'হলুদ দল', 'en_cycle_text' => 'Cycle 2', 'bn_cycle_text' => 'Cycle 2', 'key' => 2],
            3 => ['en' => 'Green Group', 'bn' => 'সবুজ দল', 'en_cycle_text' => 'Cycle 3', 'bn_cycle_text' => 'Cycle 3', 'key' => 3],
            4 => ['en' => 'Pink Group', 'bn' => 'গোলাপি দল', 'en_cycle_text' => 'Cycle 4', 'bn_cycle_text' => 'Cycle 4', 'key' => 4],
            5 => ['en' => 'Orange Group', 'bn' => 'কমলা দল', 'en_cycle_text' => 'Cycle 5', 'bn_cycle_text' => 'Cycle 5', 'key' => 5],
        ];
    }

    public static function ppe_scores_ppe_year_array()
    {
        return [
            1 => ['en' => 'PPE 1 Year', 'bn' => 'পিপিই ১ম বর্ষ', 'key' => 1],
            2 => ['en' => 'PPE 2 Year', 'bn' => 'পিপিই ২য় বর্ষ', 'key' => 2],
        ];
    }

    public static function ppe_scores_ppe_year_for_two_year_array()
    {
        return [
            1 => ['en' => '1st Year', 'bn' => '১ম বর্ষ', 'key' => 1],
            2 => ['en' => '2nd Year', 'bn' => '২য় বর্ষ', 'key' => 2],
        ];
    }

    public static function mgml_competency_remarks()
    {
        return [
            1 => ['en' => 'No activity due to achieved', 'bn' => '', 'key' => 1],
            2 => ['en' => 'Need some help', 'bn' => 'সাহায্য প্রয়োজন', 'key' => 2],
            3 => ['en' => 'Did not read, different plan required', 'bn' => 'পড়া হয়নি, ভিন্ন পরিকল্পনা দরকার', 'key' => 3],
        ];
    }

    public static function days_array()
    {
        return [
            1 => ['en' => 'Saturday', 'bn' => 'শনিবার', 'key' => 1],
            2 => ['en' => 'Sunday', 'bn' => 'রবিবার', 'key' => 2],
            3 => ['en' => 'Monday', 'bn' => 'সোমবার', 'key' => 3],
            4 => ['en' => 'Tuesday', 'bn' => 'মঙ্গলবার', 'key' => 4],
            5 => ['en' => 'Wednesday', 'bn' => 'বুধবার', 'key' => 5],
            6 => ['en' => 'Thursday', 'bn' => 'বৃহস্পতিবার', 'key' => 6],
            7 => ['en' => 'Friday', 'bn' => 'শুক্রবার', 'key' => 7],
        ];
    }

    public static function creativities_array()
    {
        return [
            'Drawing', 'Music', 'Acting', 'Other',
        ];
    }

    public static function residence_of_parents_type_array()
    {
        return [
            1 => ['en' => 'Own House', 'bn' => '', 'key' => 1],
            2 => ['en' => 'Rented House', 'bn' => '', 'key' => 2],
            3 => ['en' => 'Landless', 'bn' => '', 'key' => 3],
        ];
    }

    public static function baseline_cycles_array()
    {
        return [
            1 => ['en' => '<= 36', 'bn' => 'এ+', 'description_en' => 'Red', 'key' => "1"],
            2 => ['en' => '>= 37 AND <=68', 'bn' => 'এ', 'description_en' => 'Yellow', 'key' => "2"],
            3 => ['en' => '>68', 'bn' => 'এ-', 'description_en' => 'Green', 'key' => "3"],
        ];
    }

    public static function array_list_by_element_index($staticfunction, $index = 'en')
    {
        // for religions
        // self::array_list_by_element_key('religions', 'en');
        $out_array = [];
        foreach (self::$staticfunction() as $key => $array) {
            $out_array[$key] = $array[$index];
        }
        return $out_array;
    }

    public static function get_data_by_index($staticfunction, $index, $lan = 'en', $extra_title = null)
    {
        $found = in_array($index, array_keys(self::$staticfunction()));

        if (!$found) {
            return null;
        }
        $title_lan = $extra_title . '_' . $lan;
        return $extra_title != null ? self::$staticfunction()[$index][$title_lan] : self::$staticfunction()[$index][$lan];
    }

    public static function get_other_data_by_index($staticfunction, $index, $lan, $extra_titles = [])
    {
        $data = [];

        if (empty($extra_titles)) {
            return $data;
        }

        foreach ($extra_titles as $key => $extra_title) {
            $title_value = self::get_data_by_index($staticfunction, $index, $lan, $extra_title);

            $data[$key] = $title_value;
        }

        return $data;
    }

    public static function check_keys_exists($staticfunctions = [], $indices = [])
    {
        $fields = [];
        if (empty($staticfunctions) || empty($indices)) {
            return false;
        }

        if (is_array($staticfunctions)) {

            foreach ($staticfunctions as $key => $fnc) {

                $get_field = self::check_key_exists($fnc, $indices[$key]);

                if ($get_field != "") {
                    $fields[$get_field] = $get_field;
                }
            }
        }

        return $fields;
    }

    public static function check_key_exists($staticfunction, $index)
    {
        $key_exists = array_key_exists(request()->$index, self::$staticfunction());
        $field      = "";

        if (!$key_exists) {
            $field = $index;
        }

        return $field;
    }

    public static function get_array_that_return_only_key($staticfunction, $index = 'key')
    {

        $out_array = [];
        foreach (self::$staticfunction() as $key => $array) {
            array_push($out_array, $array[$index]);
        }
        return $out_array;
    }

    // Array Search With Specific Cloumn Value
    public static function searchWithColumn($staticfunction, $coloumn, $value)
    {
        $data = self::$staticfunction();

        $key = array_search($value, array_column($data, $coloumn));
        return $data[$key + 1];
    }

    //change text from get_grade_point_data to get_grade_point_index
    public static function get_grade_point_data($gp)
    {
        // switch($gp):
        if ($gp >= 5) {
            $gp_data = 5;
        } elseif ($gp >= 4 && $gp < 5) {
            $gp_data = 4;
        } elseif ($gp >= 3.5 && $gp < 4) {
            $gp_data = 3;
        } elseif ($gp >= 3 && $gp < 3.5) {
            $gp_data = 2;
        } elseif ($gp >= 2 && $gp < 3) {
            $gp_data = 1;
        } else {
            $gp_data = 0;
        }

        return $gp_data;
    }

    //change text from get_grade_point_data to get_grade_point_index (This is used for me_evaluation avg. grade and center_grade)
    public static function get_grade_data($gp)
    {
        // switch($gp):
        if ($gp >= 5) {
            $gp_data = 'A';
        } elseif ($gp >= 3 && $gp < 5) {
            $gp_data = 'B';
        } elseif ($gp < 3) {
            $gp_data = 'C';
        }

        return $gp_data;
    }

    //change text from get_grade_point_data for mgml
    public static function get_mgml_grade_data($gp)
    {
        // switch($gp):
        if ($gp >= 5) {
            $gp_data = 'A+';
        } elseif ($gp >= 4 && $gp < 5) {
            $gp_data = 'A';
        } elseif ($gp >= 3.5 && $gp < 4) {
            $gp_data = 'A-';
        } elseif ($gp >= 3 && $gp < 3.5) {
            $gp_data = 'B';
        } elseif ($gp >= 2 && $gp < 3) {
            $gp_data = 'C';
        } elseif ($gp >= 0 && $gp < 2) {
            $gp_data = 'F';
        }

        return $gp_data;
    }

    //change text from get_grade_point_data for ppe
    public static function get_ppe_grade_data($gp)
    {
        if ($gp >= 5) {
            $gp_data = 'A';
        } elseif ($gp >= 3 && $gp < 5) {
            $gp_data = 'B';
        } elseif ($gp < 3) {
            $gp_data = 'C';
        }

        return $gp_data;
    }

    //change text from get_grade_point_index for ppe
    public static function get_ppe_grade_point_index($gp)
    {
        if ($gp >= 5) {
            $gp_data = 5;
        } elseif ($gp >= 3 && $gp < 5) {
            $gp_data = 3;
        } elseif ($gp < 3) {
            $gp_data = 1;
        }

        return $gp_data;
    }

    public static function getPath()
    {
        return request()->is('*admin/*') ? 'admin' : (request()->is('*teacher/*') ? 'teacher' : (request()->is('*staff/*') ? 'staff' : ''));
    }
}
