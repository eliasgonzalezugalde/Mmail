<?php
class Session_model extends CI_Model {

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

    function authenticate($name, $password) 
    {
        $query = $this->db->get_where('usuario', 
            array('email' => $name, 'contrasena' => md5($password)));
        return $query->result();
   }

   function insert($name, $password) 
   {
    $data = array(
        'id' => '' ,
        'contrasena' => md5($password) ,
        'email_alterno' => 'eliasgonzalezugalde@gmail.com' ,
        'email' => $name ,
        'activo' => false
        );

    $this->db->insert('usuario', $data); 
}

}