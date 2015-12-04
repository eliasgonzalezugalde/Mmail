<?php
class main_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_users()
    {
        $query = $this->db->get('usuario', 100);
        return $query->result();
    }

    public function get_user($id) 
    {
        $query = $this->db->get_where('usuario', 
            array('id' => $id));
        return $query->result();
    }

    public function get_emails($usuario)
    {
        $query = $this->db->get_where('email', 
            array('remitente' => $usuario[0]->email));
        return $query->result();
    }

    public function get_emails_pending()
    {
        $query = $this->db->get_where('email', 
            array('enviado' => false));
        return $query->result();
    }

    public function get_email($id)
    {
        $query = $this->db->get_where('email', 
            array('id' => $id));
        return $query->result();
    }

    public function get_user_by_name($name) 
    {
        $query = $this->db->get_where('usuario', 
            array('email' => $name));
        return $query->result();
    }

    public function edit_email($id, $destinatario, $contenido, $asunto) 
    {
        $data = array(
            'destinatario' => $destinatario , 
            'asunto' => $asunto , 
            'contenido' => $contenido
            );
        $this->db->where('id', $id);
        $this->db->update('email',$data);
    }

    public function set_email_sent($id) 
    {
        $data = array(
            'enviado' => true
            );
        $this->db->where('id', $id);
        $this->db->update('email',$data);
    }

    public function delete_email($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('email');
    }

    public function insert($subject, $address, $content, $sender) 
    {
        $data = array(
            'id' => '' ,
            'asunto' => $subject,
            'destinatario' => $address,
            'remitente' => $sender,
            'contenido' => $content,
            'enviado' => false
            );

        $this->db->insert('email', $data); 
    }

}