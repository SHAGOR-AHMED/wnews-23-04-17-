<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 19.4.17
 * Time: 09:55 PM
 */
class News extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->model('point_model');
        if (!$this->isAuth()) {
            redirect("home");
        }
    }


    public function index()
    {

        $this->load->view('frontend/np/index');
    }

    public function gallery()
    {
        $data['images'] = $this->news_model->get_gallery();
        //print_r($data);exit;
        $this->load->view('frontend/np/page/gallery', $data);
    }

    public function news_details($news_id)
    {
        $this->read($news_id);


        $data['news_comments'] = $this->news_model->getAllCommentsByNewsId($news_id);
        $data['news_react'] = $this->news_model->checkNewsReactByUser($news_id, $this->user_id);
        $data['likes'] = $this->news_model->countAllReactsByNewsId($news_id, LIKE);
        $data['un_likes'] = $this->news_model->countAllReactsByNewsId($news_id, UNLIKE);
        $data['news_details_info'] = $this->news_model->select_news_details($news_id);
        $this->db->set('news_read_count', $data['news_details_info']->news_read_count + 1)->where('news_id', $news_id)->update('kha_news_info');
        //  $this->debug($data);
        $this->load->view('frontend/np/news_details', $data);
    }

    public function category_news($catid)
    {
        $cat_id = $catid;
        $data['news_by_category'] = $this->news_model->select_news_by_category($cat_id);
        //print_r($data);exit;
        $this->load->view('frontend/np/pages', $data);
    }

    public function onusandhan()
    {

        $this->load->view('frontend/np/onusandhan');

    }

    //comment section
    public function saveComment()
    {

        $data['user_id'] = $this->user_id;
        $data['news_id'] = $this->input->post('news_id', true);
        $data['comment'] = $this->input->post('comment', true);
        $newsDet = $this->news_model->select_news_details($data['news_id']);
        if (is_null($data['comment'])) {
            redirect("news/news_details/" . $data['news_id']);
        }
        $this->db->insert("tbl_news_comment", $data);
        $this->comment($newsDet->user_id, $this->user_id);
        redirect("news/news_details/" . $data['news_id']);
    }

    public function likeNews($newsId)
    {

        $userId = $this->user_id;
        $newsDet = $this->news_model->select_news_details($newsId);
        $check = $this->news_model->checkNewsReactByUser($newsId, $userId);
        if ($check == null) {
            $like['react_type'] = LIKE;
            $like['user_id'] = $userId;
            $like['news_id'] = $newsId;
            $this->db->insert('tbl_news_react', $like);
        }
        $this->like($newsDet->user_id, $userId);
        redirect('news/news_details/' . $newsId);
    }

    public function unlikeNews($newsId)
    {
        $userId = $this->user_id;
        $newsDet = $this->news_model->select_news_details($newsId);
        $check = $this->news_model->checkNewsReactByUser($newsId, $userId);
        if ($check == null) {
            $like['react_type'] = UNLIKE;
            $like['user_id'] = $userId;
            $like['news_id'] = $newsId;
            $this->db->insert('tbl_news_react', $like);
        }
        $this->unlike($newsDet->user_id, $userId);
        redirect('news/news_details/' . $newsId);
    }

    //news point calculation section

    public function read($post_user_id)
    {
        $point = $this->point_model->get_point_value();

        //deduct point to the user who read the news
        foreach ($point as $item) {
            if ($item->point_type_key == News_Read_Deduct_Kp_From_Read_Person && $item->active == 1) {
                $read_deduct_point['point_value'] = $item->point_value;
                $read_deduct_point['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }
        $read_deduct_point['user_id'] = $this->user_id;
        $read_deduct_point['io_status'] = POINT_OUT;
        //end
        //add point to post user
        foreach ($point as $item) {
            if ($item->point_type_key == News_Read_Add_kp_to_post_Person && $item->active == 1) {
                $read_add_point['point_value'] = $item->point_value;
                $read_add_point['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }
        $read_add_point['user_id'] = $post_user_id;
        $read_add_point['io_status'] = POINT_IN;
        $this->db->trans_start();
        $this->db->insert('tbl_user_point', $read_deduct_point);
        $this->db->insert('tbl_user_point', $read_add_point);
        $this->db->trans_complete();
        if ($this->db->trans_status() == false) {
            echo "Failed";
        } else {
            echo "Success";
        }

    }

    public function like($npPostUserId, $npLikeUserId)
    {
        $point = $this->point_model->get_point_value();

        //add point to post user
        foreach ($point as $item) {
            if ($item->point_type_key == News_Like_Add_Kp_To_Post_Person && $item->active == 1) {
                $add_point_to_post_person['point_value'] = $item->point_value;
                $add_point_to_post_person['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }
        $add_point_to_post_person['user_id'] = $npPostUserId;
        $add_point_to_post_person['io_status'] = POINT_IN;

        foreach ($point as $item) {
            if ($item->point_type_key == News_Like_Add_Kp_To_Liked_Person && $item->active == 1) {
                $add_point_like_person['point_value'] = $item->point_value;
                $add_point_like_person['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }

        $add_point_like_person['user_id'] = $npLikeUserId;
        $add_point_like_person['io_status'] = POINT_IN;

        $this->db->trans_start();
        $this->db->insert('tbl_user_point', $add_point_to_post_person);
        $this->db->insert('tbl_user_point', $add_point_like_person);
        $this->db->trans_complete();
        if ($this->db->trans_status() == false) {
            echo "Failed";
        } else {
            echo "Success";
        }

    }

    public function unlike($npPostUserId, $npUnLikeUserId)
    {
        $point = $this->point_model->get_point_value();

        //add point to post user
        foreach ($point as $item) {
            if ($item->point_type_key == News_unlike_Add_kp_to_post_Person && $item->active == 1) {
                $add_point_to_post_person['point_value'] = $item->point_value;
                $add_point_to_post_person['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }
        $add_point_to_post_person['user_id'] = $npPostUserId;
        $add_point_to_post_person['io_status'] = POINT_IN;

        foreach ($point as $item) {
            if ($item->point_type_key == News_Unlike_Deduct_kp_From_Unliked_Person && $item->active == 1) {
                $deduct_point_like_person['point_value'] = $item->point_value;
                $deduct_point_like_person['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }

        $deduct_point_like_person['user_id'] = $npUnLikeUserId;
        $deduct_point_like_person['io_status'] = POINT_OUT;
        $this->db->trans_start();
        $this->db->insert('tbl_user_point', $add_point_to_post_person);
        $this->db->insert('tbl_user_point', $deduct_point_like_person);
        $this->db->trans_complete();
        if ($this->db->trans_status() == false) {
            echo "Failed";
        } else {
            echo "Success";
        }
    }

    public function comment($postUserId, $commentUserId)
    {
        $point = $this->point_model->get_point_value();

        //add point to post user
        foreach ($point as $item) {
            if ($item->point_type_key == News_comment_add_kp_to_post_person && $item->active == 1) {
                $add_point_to_post_person['point_value'] = $item->point_value;
                $add_point_to_post_person['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }
        $add_point_to_post_person['user_id'] = $postUserId;
        $add_point_to_post_person['io_status'] = POINT_IN;

        foreach ($point as $item) {
            if ($item->point_type_key == News_comment_add_kp_to_comment_Person && $item->active == 1) {
                $add_point_comment_person['point_value'] = $item->point_value;
                $add_point_comment_person['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }

        $add_point_comment_person['user_id'] = $commentUserId;
        $add_point_comment_person['io_status'] = POINT_IN;

        $this->db->trans_start();
        $this->db->insert('tbl_user_point', $add_point_to_post_person);
        $this->db->insert('tbl_user_point', $add_point_comment_person);
        $this->db->trans_complete();
        if ($this->db->trans_status() == false) {
            echo "Failed";
        } else {
            echo "Success";
        }

    }


}