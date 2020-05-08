<?php
class Item extends CI_Controller
{
    public function Index()
    {
        redirect('Item/Order');
    }
    public function Order()
    {
        $this->form_validation->set_rules('ItemName', 'Item Name', 'required');
        $this->form_validation->set_rules('PPrice', 'Price', 'required');
        $this->form_validation->set_rules('Quantity', 'Quantity', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['Items'] = $this->Item_Model->GetItems();
            $this->load->view('ManageItem', $data);
        } else {
            $name = $this->input->post('ItemName');
            $price = $this->input->post('PPrice');
            $qty = $this->input->post('Quantity');
            $desc = $this->input->post('Desc');

            if ($this->Item_Model->AddItem($name, $price, $qty, $desc)) {
                $this->session->set_flashdata('padded', 'Item has been added!');
                redirect('Item/Order');
            }
        }
    }
    public function DeleteItem($id = null)
    {
        if ($id == null) {
            redirect('Item/Order');
        } else if (!$this->Item_Model->ItemExists($id)) {
            redirect('Item/Order');
        } else {
            $this->Item_Model->DeleteItem($id);
            redirect('Item/Order');
        }
    }
    public function EditItem($id = null)
    {
        if ($id == null) {
            redirect('Item/Order');
        } else if (!$this->Item_Model->ItemExists($id)) {
            redirect('Item/Order');
        } else {
            $this->form_validation->set_rules('ItemName', 'Item Name', 'required|trim|min_length[3]');
            $this->form_validation->set_rules('PPrice', 'Price', 'required');
            $this->form_validation->set_rules('Quantity', 'Quantity', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['Item'] = $this->Item_Model->GetSpecificItem($id);
                $this->load->view('EditItem', $data);
            } else {
                $name = $this->input->post('ItemName');
                $price = $this->input->post('PPrice');
                $qty = $this->input->post('Quantity');
                $desc = $this->input->post('Desc');

                if ($this->Item_Model->UpdateItem($id, $name, $price, $qty, $desc)) {
                    $this->session->set_flashdata('padded', 'Item has been updated!');
                    redirect('Item/Order');
                }
            }
        }
    }
}
