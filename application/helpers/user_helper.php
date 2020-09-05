<?php
/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 09/02/2017
 * Time: 1:57 AM
 */


function getMembers()
{
    $ci = &get_instance();
    $ci->load->database();
    $data = $ci->db->select('user_id,full_name,reference_id')->from('tbl_users')->where("is_active", 1)->where("role", 0)->get()->result();
    echo '<option value="">-- Select a member  --</option>';
    foreach ($data as $dd) {
        echo '<option value="' . $dd->user_id . '" >  ' . $dd->full_name . '</option><br />';
    }
}

function getMembersForBalanceReq()
{
    $ci = &get_instance();
    $ci->load->database();
    $data = $ci->db->select('user_id,full_name,reference_id')->from('tbl_users')->where("is_active", 1)->where("role", 0)->get()->result();
    return $data;

}


function getAllInactiveUserList()
{
    $ci = &get_instance();
    $ci->load->database();
    return $ci->db->where('is_active', 0)->get('tbl_users')->result();
}

function getMembersByParentUser($parent_user_ref_id)
{
    $ci = &get_instance();
    $ci->load->database();
    $data = $ci->db->select('user_id,full_name,reference_id')->from('tbl_users')->where("parent_user_ref_id", $parent_user_ref_id)->where('is_active', 1)->get()->result();
    echo '<option value="">-- Select a member  --</option>';
    foreach ($data as $dd) {
        echo '<option value="' . $dd->user_id . '" >  ' . $dd->full_name . '</option><br />';
    }
}

function getAllCountryList()
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('countries')->get()->result();

    foreach ($data as $d) {
        echo '<option value="' . $d->id . '" />  ' . $d->con_name . '<br />';
    }


}

function getAllStatesByCountryId($country_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('states')->where('country_id', $country_id)->get()->result();
    $out = '';
    foreach ($data as $dd) {
        $out .= '<option value="' . $dd->id . '" >  ' . $dd->st_name . '</option><br />';
    }
    echo empty($out) ? 'Not Set' : $out;
}

function generateReligionView($religion_value)
{
    switch ($religion_value) {
        case 1:
            echo "Islam";
            break;
        case 2:
            echo "Hindu";
            break;
        case 3:
            echo "Christian";
            break;
        case 4:
            echo "Buddho";
            break;
        default:
            echo "";
    }
}

function generateBloodGroup($bg_val)
{
    switch ($bg_val) {
        case 1:
            echo "A+";
            break;
        case 2:
            echo "B+";
            break;
        case 3:
            echo "O+";
            break;
        case 4:
            echo "AB+";
            break;
        case 5:
            echo "A-";
            break;
        case 6:
            echo "B-";
            break;
        case 7:
            echo "O-";
            break;
        case 8:
            echo "AB-";
            break;
        default:
            echo "";
    }
    function generateSex($val)
    {
        switch ($val) {
            case 1:
                echo "Male";
                break;
            case 2:
                echo "Female";
                break;
            default:
                echo "";
        }
    }
}
