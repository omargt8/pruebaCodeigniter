<?php

class Mproducto extends CI_Model
{
    public function guardarProducto($param)
    {
        $campos = array(
            'id_producto' => $param['id_producto'],
            'nombre' => $param['nombre'],
            'cantidad' => $param['cantidad'],
            'descripcion' => $param['descripcion']
        );

        $this->db->insert('producto', $campos);
    }

    public function getProductos()
    {
        $this->db->select('id_producto, nombre, cantidad, descripcion');
        $this->db->from('producto');

        $r = $this->db->get();

        return $r->result();
    }

    public function actProducto($param, $id)
    {
        $campos = array(
            'id_producto' => $param['id_producto'],
            'nombre' => $param['nombre'],
            'cantidad' => $param['cantidad'],
            'descripcion' => $param['descripcion']
        );

        $this->db->where('id_producto', $id);
        $this->db->update('producto', $campos);

        return 1;
    }

    public function borrarProducto($id)
    {
        $this->db->where('id_producto', $id);
        $this->db->delete('producto');

        return 1;
    }

    public function getProducto()
    {
        $this->db->select('nombre, cantidad, descripcion');
        $this->db->from('producto');
        $query = $this->db->get();

        return $query;
    }

    function select()
    {
        $this->db->order_by('id_producto', 'DESC');
        $query = $this->db->get('producto');
        return $query;
    }

    function insert($data)
    {
        $data = array(
            'id_producto' => $data['id_producto'],
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'cantidad' => $data['cantidad']
        );

        $this->db->insert_batch('producto', $data);
    }

    public function llenarCombo()
    {
        $s = $this->db->get('producto');
        return $s->result();
    }

    public function complementoCombo($s)
    {
        $s = $this->db->get_where('producto', array('id_producto' => $s));
        return $s->result();
    }
}