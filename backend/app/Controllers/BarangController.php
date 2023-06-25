<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class BarangController extends ResourceController
{
    protected $modelName = 'App\Models\BarangModel';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        // $data = [
        //     'Message' => 'Sukses',
        //     'data_barang' => $this->model->findAll()
        // ];
        // return $this->respond($data, 200);
        $data = $this->model->findAll();
        if (!$data) return $this->failNotFound('Data Tidak Ditemukan');
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find(['id' => $id]);
        if (!$data) return $this->failNotFound('Data Tidak Ditemukan');
        return $this->respond($data[0]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = $this->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
        ]);
        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors(),
            ];
            return $this->failValidationErrors($response);
        }
        $this->model->insert([
            'id_barang' => esc($this->request->getVar('id_barang')),
            'nama_barang' => esc($this->request->getVar('nama_barang')),
        ]);

        $response = [
            'messages' => 'Data barang telah ditambahkan'
        ];

        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = $this->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
        ]);
        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors(),
            ];
            return $this->failValidationErrors($response);
        }
        $this->model->update($id, [
            'id_barang' => esc($this->request->getVar('id_barang')),
            'nama_barang' => esc($this->request->getVar('nama_barang')),
        ]);

        $response = [
            'messages' => 'Data barang berhasil diubah'
        ];

        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
        $response = [
            'messages' => 'Data barang berhasil dihapus'
        ];

        return $this->respondDeleted($response);
    }
}