<?php
function getAllIncomingPointType()
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('tbl_incoming_point_type')->where('has_default_value', 1)->order_by('point_type_key', "ASC")->get()->result();
    foreach ($data as $d) {
        echo "<option value='" . $d->point_type_id . "'>" . $d->point_type_name . "</option>";
    }
}

function getPointType()
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('tbl_incoming_point_type')->where('has_default_value', 0)->order_by('point_type_key', "ASC")->get()->result();
    return $data;
}

/*
 * return all incoming point type from tbl_incoming_point_type_table table for get the point type....
 */
function getAllActivePoint()
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')
        ->from('tbl_incoming_point_type as ipt')
        ->join('tbl_point as p', 'ipt.incoming_point_type_id=p.incoming_point_type_id', 'left')
        ->where('p.active', 1)->get()->result();
    return $data;
}

function getAllInPointType()
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')
        ->from('tbl_incoming_point_type as ipt')
        ->join('tbl_point as p', 'ipt.incoming_point_type_id=p.incoming_point_type_id', 'left')
        ->where('p.active', 1)->get()->result();
    return $data;
}

function reAsembleIncomePointType($incomePointType)
{

}

function printAddPointType()
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('tbl_incoming_point_type')->where('point_add_deduct', 1)->order_by('point_type_key', "ASC")->get()->result();
    foreach ($data as $d) {
        echo "<option value='" . $d->point_type_key . "'>" . $d->point_type_name . "</option>";
    }
}

function printDeductPointType()
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('tbl_incoming_point_type')->where('point_add_deduct', 0)->order_by('point_type_key', "ASC")->get()->result();
    foreach ($data as $d) {
        echo "<option value='" . $d->point_type_key . "'>" . $d->point_type_name . "</option>";
    }
}

function numFormat($n)
{
    $formatted = '';
    if ($n >= 1000 && $n < 1000000) {
        if ($n % 1000 === 0) {
            $formatted = ($n / 1000);
        } else {
            $formatted = substr($n, 0, -3) . '.' . substr($n, -3, -2);

            if (substr($formatted, -1, 1) === '0') {
                $formatted = substr($formatted, 0, -2);
            }
        }
        $formatted .= ' kp';
    } else {

        $formatted .= $n;
    }
    echo $formatted;

}
