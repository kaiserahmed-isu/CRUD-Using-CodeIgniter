<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Projects extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Projects_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $projects = $this->Projects_model->get_all();
        $data = array(
            'projects_data' => $projects,
        );
        $this->load->view('projects/projects_list', $data);
    }


    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('projects/create_action'),
      	    'id' => set_value('id'),
      	    'name' => set_value('name'),
      	    'description' => set_value('description'),
	      );
        $this->load->view('projects/projects_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            		'name' => $this->input->post('name',TRUE),
            		'description' => $this->input->post('description',TRUE),
            	    );

            $this->Projects_model->insert($data);
            $this->session->set_flashdata('message', 'Project added Successfully!');
            redirect(site_url('projects'));
        }
    }

    public function update($id)
    {
        $row = $this->Projects_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('projects/update_action'),
            		'id' => set_value('id', $row->id),
            		'name' => set_value('name', $row->name),
            		'description' => set_value('description', $row->description),
            	    );
            $this->load->view('projects/projects_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Project was not found!');
            redirect(site_url('projects'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
            		'name' => $this->input->post('name',TRUE),
            		'description' => $this->input->post('description',TRUE),
            	    );

            $this->Projects_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Project updated successfully!');
            redirect(site_url('projects'));
        }
    }

    public function read($id)
    {
        $row = $this->Projects_model->get_by_id($id);
        if ($row) {
            $data = array(
            		'id' => $row->id,
            		'name' => $row->name,
            		'description' => $row->description,
            	    );
            $this->load->view('projects/projects_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Project was not Found!');
            redirect(site_url('projects'));
        }
    }

    public function delete($id)
    {
        $row = $this->Projects_model->get_by_id($id);

        if ($row) {
            $this->Projects_model->delete($id);
            $this->session->set_flashdata('message', 'Project deleted successfully!');
            redirect(site_url('projects'));
        } else {
            $this->session->set_flashdata('message', 'Project was not found!');
            redirect(site_url('projects'));
        }
    }

    public function _rules()
    {
      	$this->form_validation->set_rules('name', 'name', 'trim|required');
      	$this->form_validation->set_rules('description', 'description', 'trim|required');

      	$this->form_validation->set_rules('id', 'id', 'trim');
      	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
