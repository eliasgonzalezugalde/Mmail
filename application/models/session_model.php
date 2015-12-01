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
            array('email' => $name, 'contrasena' => md5($password), 'activo' => true));
        return $query->result();
    }

    function insert($name, $password, $alternative) 
    {
        $data = array(
            'id' => '' ,
            'contrasena' => md5($password) ,
            'email_alterno' => $alternative ,
            'email' => $name ,
            'activo' => false
            );
        $this->db->insert('usuario', $data); 
    }

    function activate($id_encriptado) 
    {
        $query = $this->db->get('usuario', 100);

        foreach($query->result_array() as $row) {
            if ($id_encriptado == md5($row['id'])) {
                $data = array(
                    'activo' => true
                    );
                $this->db->where('id', $row['id']);
                $this->db->update('usuario',$data);
            }
        }

    }
}