<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
protected $table = 't_usuarios';
protected $primaryKey = 'id';

protected $returnType = 'array';
protected $allowedFields = ['id_rol','nombre','apellido'.'correo','telefono'];

protected $useTimestamps = true;
protected $createField = 'created_at';
protected $updateField = 'update_at';

protected $validationRules = [
	'nombre' => 'required|alpha_space|min_lengt|[3]|max_length[75]',
	'apellido' => 'required|al'];

function update_api($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('t_usuarios', $data);
	}


    

}
?>