<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
/*
 * User constants
 */
define('USER', '0');
define('Admin', '1');
/*
 * end user constant
 */
/*
 * point constants
 */
define('Point_Transfer', '1');
define('Point_Purchased', '2');
define('News_Post_Deduct_kp', '3');
define('News_Like_Add_Kp_To_Post_Person', '4');
define('News_Like_Add_Kp_To_Liked_Person', '5');
define('News_Read_Deduct_Kp_From_Read_Person', '6');
define('News_Read_Add_kp_to_post_Person', '7');
define('News_Unlike_Deduct_kp_From_Unliked_Person', '8');
define('News_unlike_Add_kp_to_post_Person', '9');
define('News_comment_add_kp_to_comment_Person', '10');
define('News_comment_add_kp_to_post_person', '11');
define('Commission', '12');
define('Direct_Sponsor', '13');
define('Reference_Sponsor', '14');
define('Income_Ref_Post', '15');
define('Income_Ref_Kp', '16');
define('New_Member', '17');
define('Deduct_From_User_For_Add_New_Member', '18');
define('Referrer_Add_New_Member', '19');


define('POINT_IN', 1);
define('POINT_OUT', 0);


define("USER_DEDUCT_POINT_FOR_ADD_NEW_MEMBER", 11000);
define("USER_ADD_POINT_FOR_CREATE_ACCOUNT", 1000);
define("REFERRER_ADD_POINT_FOR_ADD_USER", 1000);
define("COMPANY_POINT_ADD_WHICH_DEDUCT_FROM_USER_IN_ADD_NEW_MEMBER", 9000);

define("Company_point_in_from_user", 0);
define("Company_point_in_from_super_admin", 1);

//point exchange key
define("Point_To_Money", 1);
define("Money_To_Point", 2);

/*
 * point constant end
 */
/*
 * balance type
 */
define("Deposit", 1);
define("Withdraw", 0);
define("Debit", 1);
define("Credit", 0);

//balance source key
define('Transaction', 1);
define('Point_Exchange', 2);
define('Transfer', 3);
define('Balance_Commission', 4);
define('Vat', 5);
define('Company_Commission', 6);
/*
 *
 *
 */
define("Min_Point_For_Withdraw", 100);
define("Per_Point_Rate", 0.01);
/*
 * end
 */
/*
 * balance request
 */
define("Balance_Request_To_Admin", -1);
define("Balance_Request_To_Parent", 1);
define("Balance_Request_To_Any_Member", 0);
define("Pending", 0);
define("Approved", 1);
define("Canceled", 5);
define("Lock_by_Pin", 6);
/*
 *
 */
/*
 * company balance type
 */
define("Company_Vat", 1);
define("Com_Commission", 2);

/*
 * end
 */
define("Vat_Percentage", 20);
define("Com_Commission_Percentage", 2);
/*
 * transfer
 */
define("Point", 1);
define("Money", 2);
/*
 * end
 */

//news

define("LIKE", 1);
define("UNLIKE", 2);
//end

defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
