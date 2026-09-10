<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->call->database();
        $this->call->model('ProductModel');
    }

    public function before_action()
    {
        if (!$this->session->has_userdata('user_id')) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->call->view('products/index', [
            'products' => $this->ProductModel->all_products(),
            'username' => $this->session->userdata('username'),
            'success' => $this->session->flashdata('success'),
        ]);
    }

    public function create()
    {
        if ($this->request->post('product_name') !== NULL) {
            $data = $this->product_data();
            if ($data['error'] !== NULL) {
                $this->call->view('products/form', ['product' => $data['values'], 'error' => $data['error'], 'heading' => 'Add Product']);
                return;
            }
            $this->ProductModel->create_product($data['values']);
            $this->session->set_flashdata('success', 'Product added successfully.');
            redirect('products');
        }

        $this->call->view('products/form', ['product' => [], 'error' => NULL, 'heading' => 'Add Product']);
    }

    public function edit($id)
    {
        $product = $this->ProductModel->find_product((int) $id);
        if (!$product) {
            show_404();
            return;
        }

        if ($this->request->post('product_name') !== NULL) {
            $data = $this->product_data();
            if ($data['error'] !== NULL) {
                $data['values']['id'] = $product['id'];
                $this->call->view('products/form', ['product' => $data['values'], 'error' => $data['error'], 'heading' => 'Edit Product']);
                return;
            }
            $this->ProductModel->update_product((int) $id, $data['values']);
            $this->session->set_flashdata('success', 'Product updated successfully.');
            redirect('products');
        }

        $this->call->view('products/form', ['product' => $product, 'error' => NULL, 'heading' => 'Edit Product']);
    }

    public function delete($id)
    {
        $this->ProductModel->delete_product((int) $id);
        $this->session->set_flashdata('success', 'Product deleted successfully.');
        redirect('products');
    }

    private function product_data()
    {
        $name = trim((string) $this->request->post('product_name'));
        $description = trim((string) $this->request->post('description'));
        $price = $this->request->post('price');
        $quantity = $this->request->post('quantity');

        if ($name === '' || !is_numeric($price) || (float) $price < 0 || filter_var($quantity, FILTER_VALIDATE_INT) === false || (int) $quantity < 0) {
            return [
                'values' => [
                    'product_name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'quantity' => $quantity,
                ],
                'error' => 'Enter a product name, non-negative price, and non-negative whole-number quantity.',
            ];
        }

        return [
            'values' => [
                'product_name' => $name,
                'description' => $description,
                'price' => number_format((float) $price, 2, '.', ''),
                'quantity' => (int) $quantity,
            ],
            'error' => NULL,
        ];
    }
}
