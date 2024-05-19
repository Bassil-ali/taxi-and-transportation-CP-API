<?php

/**
 * Updated by VS Code.
 * User: MomenALagha
 * Date: 2022-11-16
 * Time: 22:44
 */

namespace App\Helpers;

class Messages
{
    private static $arMessages = [
        //AUTH
        'REGISTERED_SUCCESSFULLY' => 'تم إنشاء الحساب ينجاح',
        'REGISTER_FAILED' => 'فشلت عملية إنشاء حساب جديد, حاول من جديد',
        'REGISTRATION_FAILED' => 'فشلت عملية إنشاء الحساب!',
        'BLOCKED_DEVICE' => 'تم حظر الحساب!',
        'REGISTRATION_CLOSED' => 'تم إغلاق التسجيل من قبل الإدارة',
        'AUTH_CODE_ERROR' => 'رمز التفعيل غير صحيح, حاول مرة أخرى',
        'AUTH_CODE_SENT_BEFORE' => 'تم إرسال رمز التفعيل مسبقا, الرجاء مراجعة الرسائل الواردة من فُل',
        'NO_AUTH_CODE' => 'العملية غير صحيحة!',
        'UNAUTHORISED' => 'لا يوجد لديك صلاحيات',
        'IN_ACTIVE_ACCOUNT' => 'يحب تفعيل الحساب لتمكين تسجيل الدخول!',
        'ERROR_CREDENTIALS' => 'بيانات تسجيل الدخول غير صحيحة!, تأكد و حاول مرة أخرى',
        'LOGGED_OUT_SUCCESSFULLY' => 'تم تسجيل الخروج بنجاح',
        'LOGGED_OUT_FAILED' => 'فشل تسجيل الخروج, حاول مرة ثانية',
        'LOGGED_IN_SUCCESSFULLY' => 'تم تسجيل الدخول بنجاح',
        'LOGIN_IN_FAILED' => 'تعذر تسجيل الدخول, حاول مرة أخرى',
        'NO_ACCOUNT' => 'رقم الموظف المدخل غير مسجل!',
        'ACCOUNT_EXIST' => 'البريد الإلكتروني المدخل مسجل مسبقا!',
        'MOBILE_EXIST' => 'الجوال المدخل المدخل مسجل مسبقا!',
        'AUTH_CODE_SENT' => 'تم إرسال رمز التفعيل بنجاح',
        'SUCCESS_AUTH' => 'تم تفعيل الحساب بنجاح',
        'FAILED_AUTH' => 'فشل تفعيل الحساب, حاول مجدداً',
        'VERIFIED_BOFORE' => 'تم تفعيل الحساب مسبقاً, العملية مرفوضة',
        'NOT_VERIFIED' => 'يجب تفعيل الحساب لتتمكن من تنفيذ اي عملية عليه.',
        'NO_VERIFIED_CODE' => 'لا يوجد رمز تفعيل , يرجى ارسال رمز جديد',
        'VERIFIED_CODE_ERROR' => 'رمز التفعيل غير صحيح, حاول مرة أخرى',
        'SUSPEND_ACCOUT' => ' حسابك موقوف او لم يتم تفعيله بعد , سيتم مراجعة طلبك والتواصل معك في اقرب وقت ',

        //PASSWORD
        'FORGET_PASSWORD_SUCCESS' => 'تم إرسال رمز الإستعادة بنجاح',
        'FORGET_PASSWORD_FAILED' => 'فشل في إرسال رمز الإستعادة!',
        'PASSWORD_RESET_CODE_CORRECT' => 'رمز الإستعادة صحيح, قم بتعين كلمة مرور جديدة',
        'PASSWORD_RESET_CODE_ERROR' => 'رمز الإستعادة غير صحيح, حاول مرة أخرى',
        'NO_PASSWORD_RESET_CODE' => 'لا يوجد طلب إستعادة لكلمة المرور, العملية مرفوضة',
        'PASS_RESET_CODE_SENT_BEFORE' => 'تم إرسال رمز إستعادة كلمة المرور مسبقا, الرجاء مراجعة الرسائل الواردة',
        'PASS_RESET_CODE_DONE_BEFORE' => 'تم فحص رمز استعادة كلمة المرور مسبقا , يرجى التوجه لشاشة تعيين كلمة المرور الجديدة',

        'RESET_PASSWORD_SUCCESS' => 'تم إستعادة كلمة المورو بنجاح',
        'RESET_PASSWORD_FAILED' => 'فشلت إستعادة كلمة المرور!',

        'CHANGE_PASSWORD_SUCCESS' => 'تم تعديل كلمة المورو بنجاح',
        'CHANGE_PASSWORD_FAILED' => 'فشل تعديل كلمة المرور!',
        'CHANGE_CURRENT_PASSWORD_FAILED' => 'فشل تعديل كلمة المرور! يرجى التحقق من كلمة المرور الحالية',

        'CONTACT_US_REQUEST_SUCCESS' => 'تم إرسال طلبك بنجاح, شكرا لك',
        'CONTACT_US_REQUEST_FAILED' => 'فشل في إرسال الطلب, حاول مرة أخرى',

        'USER_UPDATED_SUCCESS' => 'تم تعديل الحساب بنجاح',
        'USER_UPDATED_FAILED' => 'فشل تعديل الحساب!, حاول مرة اخرى',

        'PASSWORD_SENT' => 'تم إرسال كلمة المرور بنجاح, إستخدمها لتسجيل الدخول الى حسابك',
        'PASSWORD_SEND_FAILED' => 'فشل في إرسال كلمة المرور, حاول مرة أٌخرى',
        'PASSWORD_ALREADY_SET' => 'لقد تم تعيين كلمة المرور مسبقاً!',
        'PASSWORD_NOT_SET' => 'قم بطلب كلمة المرور لحسابك!',

        'MULTI_ACCESS_ERROR' => 'لا يمكن تسجيل الدخول إلى نفس الحساب من جهازين في نفس الوقت',
        'SECURITY_CHECK_SUCCESS' => 'تم إرسال حالتك بنجاح ، حافظ على سلامتك',
        'SECURITY_CHECK_DUPLICATE' => 'لقد قمت بإرسال حالتك سابقاً ، حافظ على سلامتك',
        'SECURITY_CHECK_FAILED' => 'حصل خلل في إرسال حالتك ،رجاءاً حاول مرة أُخرى',

        'CREATE_SUCCESS' => 'تم الإنشاء بنجاح',
        'CREATE_FAILED' => 'فشلت عملية الإنشاء, حاول مرة أُخرى',

        'DELETE_SUCCESS' => 'تم الحذف بنجاح',
        'DELETE_FAILED' => 'فشلت عملية الحذف, حاول مرة أُخرى',

        'UPDATE_SUCCESS' => 'تم التعديل بنجاح',
        'UPDATE_FAILED' => 'فشلت عملية التعديل, حاول مرة أُخرى',

        'NO_ACCESS_PERMISSION' => 'ليس لديك صلاحية وصول لهذا العنصر',
        'UN_AUTHORIZED_ACTION' => 'ليس لديك صلاحية لتنفيذ هذه العملية',
        'NOT_FOUND' => 'العنصر غير موجود',

        'FAVORITE_ADD' => 'تم اضافة المنتج للمفضلة بنجاح',
        'FAVORITE_REMOVED' => 'تم حذف المنتج من المفضلة بنجاح',
        'FAVORITE_FAILED' => 'فشلت العملية, حاول مجدداً',

        'RATE_ADD' => 'تم تقييم المنتج بنجاح',
        'RATE_UPDATED' => 'تم تعديل تقييم المنتج بنجاح',
        'RATE_FAILED' => 'فشلت العملية, حاول مجدداً',

        'ORDER_CREATED' => 'تم ارسال طلبك بنجاح، سيتم تنبيهك في كل تجديد في الحالة الخاصة به',
        'ORDER_FAILED' => 'حصل خلل في إنشاء الطلب، حاول مرة ثانية',
        'PROPOSAL_AD_ERROR' => 'عملية خاطئة , المقترح غير تابع لنفس الاعلان',
        'PROPOSAL_AD_Exist_ERROR' => 'عملية خاطئة , الاعلان منتهي حاليا',
        'ACCEPET_AD_ERROR' => 'عملية خاطئة , الاعلان غير تابع لنفس المستخدم الحالي',
        'BALANCE_NOT_ENOUGH' => 'ليس لديك رصيد كافي للإكمال العملية',
        'AD_PROPOSAL_FAILED' => 'لا يمكنك اضافة مقترح لهذا الاعلان',
        'HAVE_PREVIOUS_PROPOSAL' => 'لديك مقترح مسبق لهذا الاعلان',
        'UPDATE_AD_ERROR' => 'عملية خاطئة , لا يمكنك التعديل على الاعلان المنتهي ',
        'TRIP_DONE_ERROR' => 'عملية خاطئة , لا يمكنك التعديل على الرحلة المنتهية',


        'SUCCESS' => 'نجاح',
        'FAILED' => 'فشل',
    ];

    private static $enMessages = [
        //AUTH
        'REGISTERED_SUCCESSFULLY' => 'Account created successfully',
        'REGISTER_FAILED' => 'Failed to create new account, try again',
        'BLOCKED_DEVICE' => 'Account is blocked',
        'REGISTRATION_CLOSED' => 'Registration closed by system admin',
        'AUTH_CODE_ERROR' => 'Activation code error, try again',
        'AUTH_CODE_SENT_BEFORE' => 'Auth code sent before, please check ful messages in inbox!',
        'NO_AUTH_CODE' => 'Process denied, incorrect',
        'UNAUTHORISED' => 'This action is unauthorized',
        'IN_ACTIVE_ACCOUNT' => 'Account must be activated to enable login!',
        'ERROR_CREDENTIALS' => 'Error login credentials, check and try again',
        'LOGGED_OUT_SUCCESSFULLY' => 'Logged out successfully',
        'LOGGED_OUT_FAILED' => 'Logout failed, please try again',
        'LOGGED_IN_SUCCESSFULLY' => 'Great, Logged in successfully',
        'LOGIN_IN_FAILED' => 'Login failed, try again!',
        'NO_ACCOUNT' => 'Employee ID not registered!',
        'AUTH_CODE_SENT' => 'Auth code sent successfully',
        'ACCOUNT_EXIST' => 'Email registered before!',
        'MOBILE_EXIST' => 'Mobile registered before!',
        'SUCCESS_AUTH' => 'Account activated successfully',
        'FAILED_AUTH' => 'Account activation failed, try again',
        'VERIFIED_BOFORE' => 'Account has been verified before, rejected action!',
        'AUTH_CODE_RESENT' => 'Account has been verified before, rejected action!',
        'NOT_VERIFIED' => 'Account must verified to enable any action on it.',
        'NO_VERIFIED_CODE' => 'There is no activation code, please send a new code',
        'VERIFIED_CODE_ERROR' => 'The activation code is incorrect, try again',
        'SUSPEND_ACCOUT' => ' Your account has been suspended or has not been activated yet. Your request will be reviewed and we will contact you as soon as possible',


        //PASSWORD
        'FORGET_PASSWORD_SUCCESS' => 'Password reset code sent successfully',
        'FORGET_PASSWORD_FAILED' => 'Failed to sent password reset code!',
        'PASSWORD_RESET_CODE_CORRECT' => 'Correct password reset code, set new password',
        'PASSWORD_RESET_CODE_ERROR' => 'Password reset code error, try again',
        'NO_PASSWORD_RESET_CODE' => 'No forget password request exist, process denied!',
        'PASS_RESET_CODE_SENT_BEFORE' => 'Password reset code sent before, please check ful messages in inbox!',
        'PASS_RESET_CODE_DONE_BEFORE' => 'The password recovery code has already been checked!, please go to the set new password screen',

        'RESET_PASSWORD_SUCCESS' => 'Reset password success',
        'RESET_PASSWORD_FAILED' => 'Failed to reset password!',

        'CHANGE_PASSWORD_SUCCESS' => 'Password changed successfully',
        'CHANGE_PASSWORD_FAILED' => 'Change password failed, try again!',
        'CHANGE_CURRENT_PASSWORD_FAILED' => ' Change password failed, try again! Please check your current password',

        'CONTACT_US_REQUEST_SUCCESS' => 'Contact request sent successfully, thanks',
        'CONTACT_US_REQUEST_FAILED' => 'Failed to send contact request, try again',

        'USER_UPDATED_SUCCESS' => 'Profile updated successfully',
        'USER_UPDATED_FAILED' => 'Profile update failed!, try again',

        'PASSWORD_SENT' => 'Password sent successfully, use it to login to your account',
        'PASSWORD_SEND_FAILED' => 'Failed to sent password, please try again',
        'PASSWORD_ALREADY_SET' => 'Password has been set before!',
        "PASSWORD_NOT_SET" => 'Please request your account password!',

        'MULTI_ACCESS_ERROR' => 'It is not possible to log in to the same account from two devices at once!',
        'SECURITY_CHECK_SUCCESS' => 'Your status has been sent successfully, keep safe',
        'SECURITY_CHECK_DUPLICATE' => 'Your status has been sent before, keep safe',
        'SECURITY_CHECK_FAILED' => 'There was a malfunction in submitting your case, please try again',

        'CREATE_SUCCESS' => 'Created successfully',
        'CREATE_FAILED' => 'Create failed, please try again',

        'DELETE_SUCCESS' => 'Deleted successfully',
        'DELETE_FAILED' => 'Delete failed, please try again',

        'UPDATE_SUCCESS' => 'Updated successfully',
        'UPDATE_FAILED' => 'Delete failed, please try again',

        'NO_ACCESS_PERMISSION' => 'You dont have access permission to this component',
        'UN_AUTHORIZED_ACTION' => 'You are not authorized to perform this action',
        'NOT_FOUND' => 'Object not fount',

        'FAVORITE_ADD' => 'Product has been added to your favorites successfully',
        'FAVORITE_REMOVED' => 'Product has been removed from your favorites successfully',
        'FAVORITE_FAILED' => 'Favorite process failed, try again',

        'RATE_ADD' => 'Product has been rated successfully',
        'RATE_UPDATED' => 'Product rate has been updated successfully',
        'RATE_FAILED' => 'Product rating failed, try again',

        'ORDER_CREATED' => 'Your request has been sent successfully, and you will be notified in every renewal in its own status',
        'ORDER_FAILED' => 'There was an error creating the request, try again',
        'PROPOSAL_AD_ERROR' => 'process failed, the proposal is not affiliated with the same ad',
        'ACCEPET_AD_ERROR' => 'Wrong operation, the ad is not affiliated with the same current user',
        'PROPOSAL_AD_Exist_ERROR' => 'Wrong operation, the ad is already finished',
        'BALANCE_NOT_ENOUGH' => 'You do not have enough balance to complete the process',

        'AD_PROPOSAL_FAILED' => 'You cannot add an proposal to this ad',
        'HAVE_PREVIOUS_PROPOSAL' => 'You already have a proposal for this ad',

        'UPDATE_AD_ERROR' => 'Wrong operation, you can not modify the finished Ad',
        'TRIP_DONE_ERROR' =>'Wrong operation, you can not modify the finished Trip',

        'SUCCESS' => 'Success',
        'FAILED' => 'Failed',
    ];

    public static function getMessage($code)
    {
        return request()->header('lang')
            == 'en' ? self::$enMessages[$code] : self::$arMessages[$code];
    }
}
