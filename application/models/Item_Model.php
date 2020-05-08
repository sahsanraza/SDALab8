<?php
class Item_Model extends CI_Model{

    public function GetItems(){
        $data= $this->db->get('Items');
        if($data->num_rows()>0){
            return $data->result_array();
        }
    }
    public function GetSpecificItem($id){
      $this->db->where("ItemID",$id);
        $data= $this->db->get('Items');
        if($data->num_rows()>0){
            return $data->first_row('array');
        }
    }
    public function ItemExists($id){
        $this->db->where('ItemID',$id);
        $q=$this->db->get('Items');
        if($q->num_rows()>0){
            return true;
        }
    }
    public function AddItem($name,$price,$qty,$des){
        $data=array(
            'ItemName'=>$name,
            'Price' => $price,
            'Quantity' => $qty,
            'ItemDescription' =>$des
        );
       $q= $this->db->insert('Items',$data);
    return $q;
    }
    public function UpdateItem($id,$name,$price,$qty,$des){
        $this->db->set('ItemName',$name);
        $this->db->set('Price',$price);
        $this->db->set('Quantity',$qty);
        $this->db->set('ItemDescription',$des);
        $this->db->where('ItemID',$id);
       $q= $this->db->update('Items');
    return $q;
    }
    public function DeleteItem($id){
        $this->db->where('ItemID',$id);
        $q=$this->db->delete('Items');
        return $q;
    }

}
