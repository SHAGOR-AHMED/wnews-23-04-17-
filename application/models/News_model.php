<?php

class News_model extends CI_Model
{


//---------------------- Top News panel ----------------------//

    public function select_top_news_info($perPage, $offset, $userId = null)
    {
        if ($offset == null) {
            $offset = 0;
        }
        $this->db->select('*');
        $this->db->from('tbl_top_news');
        if ($userId != null) {

            $this->db->where('user_id', $userId);
        }

        $this->db->limit($perPage, $offset);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;

    }

    public function save_top_news_info($data)
    {
        $this->db->set('topnews_status', 1);
        $this->db->insert('tbl_top_news', $data);
    }

    public function countScrollNewsByUser($userId = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_top_news');
        if ($userId != null) {
            $this->db->where('user_id', $userId);
        }
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

    public function select_top_news_by_id($top_news_id)
    {

        $this->db->select('*');
        $this->db->from('tbl_top_news');
        $this->db->where('top_news_id', $top_news_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_top_news_info($data, $top_news_id)
    {

        $this->db->where('top_news_id', $top_news_id);
        $this->db->update('tbl_top_news', $data);

    }

    public function delete_top_news_info($top_news_id)
    {

        $this->db->where('top_news_id', $top_news_id);
        $this->db->delete('tbl_top_news');

    }
//---------------------- End Top News panel ----------------------//
//----------------------- News panel -----------------------------//

    public function select_news_info($perPage, $offset, $userId = null)
    {
        if ($offset == null) {
            $offset = 0;
        }
        $this->db->select('*');
        $this->db->from('kha_news_info');
        if ($userId != null)
            $this->db->where('user_id', $userId);
        $this->db->limit($perPage, $offset);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;

    }

    public function get_all_news_id()
    {
        $this->db->select('*');
        $this->db->from('kha_news_info');
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

    public function countNewsByUser($userId = null)
    {
        $this->db->select('*');
        $this->db->from('kha_news_info');
        if ($userId != null)
            $this->db->where('user_id', $userId);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }


    public function select_news_info_by_id($news_id)
    {
        $this->db->select('*');
        $this->db->from('kha_news_info');
        $this->db->where('news_id', $news_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function save_news_info($data)
    {
        $this->db->set('news_status', 1);
        $this->db->insert('kha_news_info', $data);
        $this->load->model('point_model');
        $point = $this->point_model->get_point_value();

        //deduct point to the user who read the news
        foreach ($point as $item) {
            if ($item->point_type_key == News_Post_Deduct_kp && $item->active == 1) {
                $read_deduct_point['point_value'] = $item->point_value;
                $read_deduct_point['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }
        $read_deduct_point['user_id'] = $data['user_id'];
        $read_deduct_point['io_status'] = POINT_OUT;
        $this->db->insert('tbl_user_point', $read_deduct_point);


    }

    public function update_news_info($data, $news_id)
    {

        $this->db->where('news_id', $news_id);
        $this->db->update('kha_news_info', $data);

    }
//----------------------- End News panel -----------------------------//
//----------------------- Gallery panel -----------------------------//

    public function select_gallery_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;

    }

    public function save_gallery_info($photo, $gallery_title)
    {

        $this->db->set('img_name', $photo);
        $this->db->set('gallery_title', $gallery_title);
        $this->db->insert('tbl_gallery');

    }

    public function select_gallery_info_by_id($gallery_id)
    {

        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where('gallery_id', $gallery_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_gallery($gallery_id, $gallery_title)
    {

        if (isset($gallery_id) && $gallery_id != '') {

            $data = array('gallery_id' => $gallery_id);
            $prev_info = $this->db->get_where("tbl_gallery", $data)->row();
            //echo $prev_info->img_name;exit();
            //delete previous image history

            if (isset($_FILES['img_name']['name']) && ($_FILES['img_name']['name'] != '')) {
                unlink('img/gallery/' . $prev_info->img_name);
            }
        }

        if (isset($_FILES['img_name']['name']) && ($_FILES['img_name']['name'] != '')) {

            $photo = $_FILES['img_name']['name'];

            $this->db->set('img_name', $photo);

            $config['upload_path'] = 'img/gallery';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|bmp';
            $config['max_size'] = 1024;
            $config['max_width'] = 2000;
            $config['max_height'] = 900;
            $config['file_name'] = $photo;
            $config['overwrite'] = TRUE;

            //print_r($config);exit();

            $this->load->library('upload', $config);
            // getting image name
            $path = $photo;
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            if (empty($path) && empty($ext)) {
                //$photo = e(post('photo'));
            } else {
                if (!$this->upload->do_upload('img_name')) {
                    $status = str_replace(array("<p>", "</p>"), "", $this->upload->display_errors());
                }
            }
        }

        $this->db->set('gallery_title', $gallery_title);
        $this->db->where('gallery_id', $gallery_id);
        $this->db->update('tbl_gallery');

    }

    public function delete_gallery($gallery_id)
    {
        $data = array('gallery_id' => $gallery_id);
        $old_photo = $this->db->get_where('tbl_gallery', $data)->row();
        unlink('img/gallery/' . $old_photo->img_name);
        $this->db->where('gallery_id', $gallery_id);
        $this->db->delete('tbl_gallery');
    }

//----------------------- End Gallery panel -----------------------------//
//------------------------- Video panel --------------------------------//

    public function select_video_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_video');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;

    }

    public function save_video_info($data)
    {
        $this->db->set('video_status', 1);
        $this->db->insert('tbl_video', $data);
    }

    public function select_video_info_by_id($video_id)
    {

        $this->db->select('*');
        $this->db->from('tbl_video');
        $this->db->where('video_id', $video_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_video($data, $video_id)
    {

        $this->db->where('video_id', $video_id);
        $this->db->update('tbl_video', $data);

    }

    public function delete_video_info($video_id)
    {

        $this->db->where('video_id', $video_id);
        $this->db->delete('tbl_video');
    }

//----------------------- Vote panel -----------------------------//

    public function select_vote_message_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_vote_msg');
        $this->db->order_by('vote_msg_id', 'DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function save_vote_msg_info($data)
    {
        $this->db->set('vote_status', 1);
        $this->db->insert('tbl_vote_msg', $data);
    }

    public function select_vote_msg_by_id($vote_msg_id)
    {

        $this->db->select('*');
        $this->db->from('tbl_vote_msg');
        $this->db->where('vote_msg_id', $vote_msg_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_vote_msg_info($data, $vote_msg_id)
    {

        $this->db->where('vote_msg_id', $vote_msg_id);
        $this->db->update('tbl_vote_msg', $data);

    }

    public function delete_vote_msg_info($vote_msg_id)
    {

        $this->db->where('vote_msg_id', $vote_msg_id);
        $this->db->delete('tbl_vote_msg');

    }
//----------------------- End Vote panel -----------------------------//
//------------------------- Ads panel ---------------------------------//

    public function select_ads_info()
    {
        $this->db->select('*');
        $this->db->from('kha_ads_info');
        $this->db->order_by('id', 'DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_ads_info_by_id($id)
    {

        $this->db->select('*');
        $this->db->from('kha_ads_info');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_ads($site_link, $id)
    {

        if (isset($id) && $id != '') {

            $data = array('id' => $id);
            $prev_info = $this->db->get_where("kha_ads_info", $data)->row();
            //echo $prev_info->img_name;exit();
            //delete previous image history

            if (isset($_FILES['img_name']['name']) && ($_FILES['img_name']['name'] != '')) {
                unlink('adsimage/' . $prev_info->img_name);
            }
        }

        if (isset($_FILES['img_name']['name']) && ($_FILES['img_name']['name'] != '')) {

            $photo = $_FILES['img_name']['name'];

            $this->db->set('img_name', $photo);

            $config['upload_path'] = 'adsimage';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|bmp';
            // $config['max_size']	= 1024;
            // $config['max_width'] = 2000;
            // $config['max_height'] = 900;
            $config['file_name'] = $photo;
            $config['overwrite'] = TRUE;

            //print_r($config);exit();

            $this->load->library('upload', $config);
            // getting image name
            $path = $photo;
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            if (empty($path) && empty($ext)) {
                //$photo = e(post('photo'));
            } else {
                if (!$this->upload->do_upload('img_name')) {
                    $status = str_replace(array("<p>", "</p>"), "", $this->upload->display_errors());
                }
            }
        }

        $this->db->set('site_link', $site_link);
        $this->db->where('id', $id);
        $this->db->update('kha_ads_info', $data);

    }
//------------------------- End Ads panel ---------------------------------//
//------------------------- Onusandhan panel ---------------------------------//

    public function save_onusandhan_info($data)
    {

        $this->db->insert('tbl_onusandhan', $data);

    }

    public function select_onusandhan_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_onusandhan');
        $this->db->order_by('onusandhan_id', 'DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function save_type_kp_info($data)
    {

        $this->db->insert('tbl_type_kp', $data);

    }

    public function select_type_kp_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_type_kp');
        $this->db->order_by('id', 'DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

//------------------------- End Onusandhan panel ---------------------------------//
    public function get_gallery()
    {

        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;

    }

    public function getAllCommentsByNewsId($newsId)
    {
        $this->db->select('nc.*,u.full_name,u.u_image');
        $this->db->from('tbl_news_comment as nc');
        $this->db->JOIN('tbl_users as u', 'nc.user_id=u.user_id', 'left');
        $this->db->where('nc.news_id', $newsId);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function checkNewsReactByUser($newsId, $userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_news_react');
        $this->db->where('news_id', $newsId);
        $this->db->where('user_id', $userId);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function countAllReactsByNewsId($newsId, $rectType)
    {

        $sql = "SELECT *,COUNT(react_type) as likes From tbl_news_react WHERE news_id = $newsId and react_type = $rectType";
        $query_result = $this->db->query($sql);
//
//
//        $this->db->select('*');
//        $this->db->from('tbl_news_react');
//        $this->db->where('news_id', $newsId);
//        $this->db->where('react_type', LIKE);
//        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_news_details($news_id)
    {

        $this->db->select('*');
        $this->db->from('kha_news_info');
        $this->db->where('news_id', $news_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_news_by_category($cat_id)
    {

        $this->db->select('*');
        $this->db->from('kha_news_info');
        $this->db->where('news_cat_id', $cat_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

}//Backend_Model
