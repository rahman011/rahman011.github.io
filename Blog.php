<?php

Class Blog extends CI_Controller
{
    public function index()
    {
        $this->load->database();
        $query=$this->db->get('blog');
        $data['blog']=$query->result_array();
        $this->load->view('blog',$data);
    }
    
    public function detail($url)
    {

        $data['blog']=$this->Blog_model->getSingelblog($url);
        $this->load->view('detail', $data);
    }

    public function add()
    {
        if($this->input->post())
        {
            $data['tittle']=$this->input->post('tittle');
            $data['content']=$this->input->post('content');
            $data['url']=$this->input->post('url');
           $id=$this->Blog_model->insertBlog($data);
           if($id)
           echo "Data Berhasil Disimpan";
           else
           echo "Data Gagal Disimpan";
        }
        $this->load->view('form_add');
    }

    public function edit($id)
    {
        $data['blog']= $this->Blog_model->getSingleBlog('id',$id);
        if($this->input->post())
        {
            $post['tittle']=$this->input->post('tittle');
            $post['content']=$this->input->post('content');
            $post['url']=$this->input->post('url');
            $id =$this->Blog_model->updateBlog($id,$post);
            if($id)
                echo "Data berhasil disimpan";
            else
                echo "Data gagal dsimpan";
        }
        $this->load->view('form_edit', $data);
    }

} 
?>   