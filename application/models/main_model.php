<?php
class main_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_users()
    {
        $query = $this->db->get('usuario', 100);
        return $query->result();
    }

    function get_user($id) 
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

    public function get_email($id)
    {
        $query = $this->db->get_where('email', 
            array('id' => $id));
        return $query->result();
    }

   function insert($subject, $address, $content, $sender) 
   {
    $data = array(
        'id' => '' ,
        'asunto' => $subject,
        'destinatario' => $address,
        'remintente' => $sender,
        'contenido' => $content,
        'enviado' => false
        );

    $this->db->insert('email', $data); 
}

}