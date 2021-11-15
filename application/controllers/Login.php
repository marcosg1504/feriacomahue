<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->helper("cookie");
		$this->load->model("CookieModel", "cookie");
		$this->load->model("ProductModel", "product");
    }

	public function index()
	{
        $this->load->view("layout/header");
        $this->load->view("login");
		$this->load->view("layout/footer");
    }
    public function reestablecer()
	{
        $this->load->view("layout/header");
        $this->load->view("reestablecer");
		$this->load->view("layout/footer");
    }
    public function mailreset()
	{
        $correo = $this->input->post("correo");
        $this->cookie->setCookie("para", $correo);
        //$this->load->view("layout/header");
        $this->load->view("mailreset");
        //redirect(base_url("login?status=failed"));
		//$this->load->view("layout/footer");
    }
    public function nuevaclave()
	{
        $this->load->view("layout/header");
        //$correo = $this->input->post("correo");
        //$this->cookie->setCookie("para", $correo);
        //$this->load->view("layout/header");
        $this->load->view("nuevaclave");
        $this->load->view("layout/footer");
        
    }

    
    public function checklogin()
    {
        $correo = $this->input->post("correo");
        $contrasena = $this->input->post("contrasena");

        $this->db->where("correo", $correo);
        $this->db->where("contrasena", $contrasena);
        $result = $this->db->get("t_usuarios");
        if($result->num_rows() == 0){
            redirect(base_url("login?status=failed"));
        }
        else{
            $row = $result->row();
            $this->cookie->setCookie("userid", $row->id);
            $this->cookie->setCookie("usertype", "user");
            $from = $this->input->post("from");
            if($from == "checkout")
            {
                redirect(base_url("checkout"));
            }
            else{
                redirect(base_url("user"));
            }
        }
    }

    public function registro()
    {
        $nombre = $this->input->post("nombre");
        $telefono = $this->input->post("telefono");
        $correo = $this->input->post("correo");
        $contrasena = $this->input->post("contrasena");
		
        $this->db->where("correo", $correo);
        $result = $this->db->get("t_usuarios");
        if($result->num_rows() > 0){
            redirect(base_url("login?status=exist"));
        }

        $field=array(
            "nombre"=>$nombre,
            "telefono"=>$telefono,
            "correo"=>$correo,
            "contrasena"=>$contrasena,
			"id_rol"=>"3",
        );
        $this->db->insert("t_usuarios", $field);
        $id = $this->db->insert_id();
        $_COOKIE["userid"] = $id;
        $_COOKIE["usertype"] = "user";
        $from = $this->input->post("from");
        if($from == "checkout")
        {
            redirect(base_url("checkout"));
        }
        else{
            redirect(base_url("user"));
        }
    }

	public function registro_feriante()
    {
        $nombre = $this->input->post("nombre");
        $telefono = $this->input->post("telefono");
        $correo = $this->input->post("correo");
        $contrasena = $this->input->post("contrasena");
        $this->db->where("correo", $correo);
        $result = $this->db->get("t_usuarios");
        if($result->num_rows() > 0){
            redirect(base_url("login?status=exist"));
        }

        $field=array(
            "nombre"=>$nombre,
            "telefono"=>$telefono,
            "correo"=>$correo,
            "contrasena"=>$contrasena,
			"id_rol"=>"2",
        );
        $this->db->insert("t_usuarios", $field);
        $id = $this->db->insert_id();
        $_COOKIE["userid"] = $id;
        $_COOKIE["usertype"] = "admin";
        $from = $this->input->post("from");
        if($from == "checkout")
        {
            redirect(base_url("checkout"));
        }
        else{
            redirect(base_url("user"));
        }
    }


    public function cambioClave()
    {
        $correo = $this->input->post("correo");
        $contrasena = $this->input->post("contrasena");
        $codigorecibido = $this->input->post("codigoRecibido");
		$codigoGenerado=$this->cookie->getCookie("codigo");
        //echo "codigo recibido: ".$codigorecibido;
        //echo "codigo generado: ".$codigoGenerado;
        if($codigoGenerado==$codigorecibido){
            $query  = $this->db->select('id')
            ->from('t_usuarios')
            ->where('correo', $correo) // Condition 
            ->get();
           $resultado= $query->result();
           //print_r($resultado[0]->id) ;
           //echo "la ide es:".$resultado[0]=>'id';

                $id = $resultado[0]->id;
                $this->db->set('contrasena',$contrasena);
                $this->db->where('id', $id);
                $this->db->update('t_usuarios');
                redirect(base_url("login"));
        }else{
            echo "el codigo no es correcto";
            redirect(base_url("login"));
        }
      
        
       
    }

    public function recupera(){

        $para = $this->input->post("correo");
        
            $título = 'Recuperar contraseña';
            $codigo= rand(1000,9999);
            
            $this->cookie->setCookie("codigo", $codigo);
            $mensaje="su codigo de cambio de contraseña es ".$codigo." "; 
            $micorreo="From: feriacomahue4@gmail.com";
            
            $headers = "MIME-Version: 1.0\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";
            $headers .= "From: <".$para.">\n";
            $headers .= "X-Priority: 1\n";
            
            
            
            if(mail($para, $título,$mensaje,$micorreo)){
                
               echo "Se envio el codigo para recuperar su contraseña";
               sleep(5);
                redirect(base_url("login/nuevaclave"));
                
                
            }else{
                echo "erorr";
            }
        



    } 
}
