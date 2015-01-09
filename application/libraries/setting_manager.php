<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_manager {

    private $CI;

    public function __construct() {
        $this->CI = & get_instance();
    }
    
    public function emailTmpValidate($data, $id = 0) {
        
        $error = array();

        if (empty($data['key'])) {

            $error['key'] = 'Please input key';
        }

        $this->CI->load->model('email_templates_model');

        $sqlCheckKey['key'] = $data['key'];

        if (!empty($id)) {

            $sqlCheckKey['id !='] = $id;
        }

        $email = $this->CI->email_templates_model->getTemplate($sqlCheckKey);

        if (!empty($email)) {

            $error['key'] = 'key already exists';
        }



        if (empty($data['subject'])) {

            $error['subject'] = 'Please input subject';
        }

        return $error;
    }

    public function supplierValidate($dataSupplier, $id = NULL) {
        $error = array();
        if (empty($dataSupplier['name']) || strlen($dataSupplier['name']) < 3) {
            $error['name'] = 'Minimum of 3 characters';
        }
        $auth = $this->CI->session->userdata('auth');
        $sqlWhere = array(
            'name' => $dataSupplier['name'],
            'user_id' => $auth['id']
        );
        if (!empty($id)) {
            $sqlWhere['id !='] = $id;
        }

        $checkSupplier = $this->CI->supplier->getSupplier($sqlWhere);
        if (!empty($checkSupplier)) {
            $error['name'] = 'Supplier name already exists';
        }

        if (empty($dataSupplier['email']) || !valid_email($dataSupplier['email'])) {
            $error['email'] = 'Email invalid';
        }

        return $error;
    }

    public function locationValidate($dataLocation) {
        $error = array();
        if (empty($dataLocation['name'])) {
            $error['name'] = 'Please enter location';
        }

        return $error;
    }

    public function productTypeValidate($dataProductType) {
        $error = array();
        if (empty($dataProductType['name'])) {
            $error['name'] = 'Please enter product type';
        }

        return $error;
    }

    public function productValidate($product, $file, $id = NULL) {
        $error = array();
        if (empty($product['name'])) {
            $error['name'] = 'Please enter product';
        }

        $sqlNameWhere['name'] = $product['name'];

        $sqlNameWhere['supplier_id'] = $product['supplier_id'];
        if (!empty($id))
            $sqlNameWhere['id !='] = $id;
        $this->CI->load->model('product_model', 'product');
        $validProduct = $this->CI->product->getProduct($sqlNameWhere);
        if (!empty($validProduct)) {
            $error['name'] = 'Product name already exists';
        }

        if (empty($product['unit'])) {
            $error['unit'] = 'Please enter unit';
        }
        if (empty($product['supplier_id'])) {
            $error['supplier_id'] = 'Please select supplier';
        }
        if (empty($product['product_location'])) {
            $error['product_location'] = 'Please choice location';
        }
        if (empty($product['product_type'])) {
            $error['product_type'] = 'Please choice type';
        }
        if (empty($product['product_type'])) {
            $error['product_type'] = 'Please choice type';
        }
        if (empty($product['qty'])) {
            $error['qty'] = 'Please enter qty';
        }

        if (!is_numeric($product['qty'])) {
            $error['qty'] = 'Qty invalid';
        }
        if (!empty($file['tmp_name']))
            if (!getimagesize($file['tmp_name'])) {
                $error['image'] = 'Please upload image type';
            }
        return $error;
    }
    public function contactPageValidate($contact) {
        $error = array();
        if (empty($contact['content'])) {
            $error['content'] = 'Please enter content';
        }
        if (empty($contact['title'])) {
            $error['title'] = 'Please enter title';
        }
        return $error;
    }
    public function featuresValidate($features, $file, $id = NULL) {
        $error = array();
        if (empty($features['content'])) {
            $error['content'] = 'Please enter content';
        }
        if (empty($features['order'])) {
            $error['order'] = 'Please enter order';
        }
        if (empty($features['title'])) {
            $error['title'] = 'Please enter title';
        }
        if (!is_numeric($features['order'])) {
            $error['order'] = 'Order invalid';
        }
        if (!empty($file['tmp_name']))
            if (!getimagesize($file['tmp_name'])) {
                $error['image'] = 'Please upload image type';
            }
        return $error;
    }

     public function contactValidate($dataContact) {
        $data_error = array();
        if (empty($dataContact['content'])) {
            $data_error['content'] = 'Please enter Message';
        }
        if (empty($dataContact['name'])) {
            $data_error['name'] = 'Please enter your name';
        }
        if (empty($dataContact['email']) || !valid_email($dataContact['email'])) {
            $data_error['email'] = 'Email invalid';
        }
        if (empty($dataContact['phone'])) {
            $data_error['phone'] = 'Please enter phone number';
        }
        if (!is_numeric($dataContact['phone'])) {
            $data_error['phone'] = 'Please enter valid phone number';
        }
        return $data_error;
    }
    public function validateRetaurant($data) {
        $error = array();
        if (empty($data['firstname'])) {
            $error['firstname'] = 'Please enter your firstname';
        }

        if (empty($data['lastname'])) {
            $error['lastname'] = 'Please enter your lastname';
        }
        if (empty($data['email']) || !valid_email($data['email'])) {
            $error['email'] = 'Email invalid';
        }

        $auth = $this->CI->session->userdata('auth');

        $emailExistsWhere['email'] = $data['email'];
        $emailExistsWhere['id !='] = $auth['id'];
        $checkEmailExists = $this->CI->user->getUser($emailExistsWhere);
        if (!empty($checkEmailExists))
            $error['email'] = 'Email already exists';


        $phone_validate = preg_match('/^0\d{10}$/', $data['phone']);
        if (empty($data['phone']) || !is_numeric($data['phone'])) {
            $error['phone'] = 'Please enter numeric characers only';
        }
        if (!empty($data['password'])) {
            if ($data['password'] != $data['re_password']) {
                $error['re_password'] = 'Passwords do not match. Please re-enter your password';
            }
            $containsLetter = preg_match('/[a-zA-Z]/', $data['password']);
            $containsDigit = preg_match('/\d/', $data['password']);
            if (empty($data['password']) || strlen($data['password']) < 7) {
                $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
            }
            if (!$containsLetter || !$containsDigit) {
                $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
            }
        }
        if (empty($data['name']) || strlen($data['name']) < 3) {
            $error['name'] = 'Please enter name of restaurant and Minimum of 3 characters';
        }
        if (empty($data['suburb'])) {
            $error['suburb'] = 'Please enter your suburb';
        }
        if (empty($data['postcode'])) {
            $error['postcode'] = 'Please enter your postcode';
        }

        if (!is_numeric($data['postcode'])) {
            $error['postcode'] = 'Postcode invalid';
        }

        if (empty($data['state'])) {
            $error['state'] = 'Please enter your state';
        }
        return $error;
    }

    public function validateProductCsv($file, $posts) {
        $error = array();
        if (empty($posts['supplier_id'])) {
            $error['supplier_id'] = 'Please select supplier';
        }

        if (empty($file['tmp_name'])) {
            $error['csv'] = 'Please upload csv file';
        } else {

            $handle = fopen($file['tmp_name'], "r");
            if (!$handle) {
                $error['csv'] = 'Corrupted file - can\'t be processed';
            } else {
                $header = fgetcsv($handle, 1000, ",");
                if (!$header) {
                    $error['csv'] = 'Corrupted file - can\'t be processed';
                } else {
                    foreach ($header as $val) {
                        $headerCheck[] = trim(strtolower($val));
                    }

                    $validheader = array('product name', 'image', 'uom', 'price', 'quantity', 'categories', 'locations');
                    if (implode(',', $headerCheck) != implode(',', $validheader)) {
                        $error['csv'] = 'invalid csv file';
                    }
                }
            }
        }
        return $error;
    }

    public function validateSupplierCsv($file) {
        $error = array();
        if (empty($file['tmp_name'])) {
            $error['csv'] = 'Please upload csv file';
        } else {

            $handle = fopen($file['tmp_name'], "r");
            if (!$handle) {
                $error['csv'] = 'Corrupted file - can\'t be processed';
            } else {
                $header = fgetcsv($handle, 1000, ",");
                if (!$header) {
                    $error['csv'] = 'Corrupted file - can\'t be processed';
                } else {
                    foreach ($header as $val) {
                        $headerCheck[] = trim(strtolower($val));
                    }

                    $validheader = array('name', 'phone', 'fax', 'email', 'order submission method');
                    if (implode(',', $headerCheck) != implode(',', $validheader)) {
                        $error['csv'] = 'invalid csv file';
                    }
                }
            }
        }
        return $error;
    }

    public function uploadSupplier($file) {
        $this->CI->load->model('supplier_model', 'supplier');
        $handle = fopen($file['tmp_name'], "r");
        $header = fgetcsv($handle, 1000, ",");
        $auth = $this->CI->session->userdata('auth');
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $dataSupplier = array(
                'name' => trim(str_replace('"', '', $data[0])),
                'phone' => trim($data[1]),
                'fax' => trim($data[2]),
                'email' => trim($data[3]),
                'order_submission_method' => (trim($data[4]) == 'fax') ? 1 : 0,
            );

            $checkSupplier = $this->CI->supplier->getSupplier(array('name' => $dataSupplier['name'], 'user_id' => $auth['id']));
            if (!empty($checkSupplier)) {
                $id = $checkSupplier['id'];
                $validate = $this->supplierValidate($dataSupplier, $id);
                if (empty($validate))
                    $this->CI->supplier->update($dataSupplier, $id);
            } else {
                $validate = $this->supplierValidate($dataSupplier);
                $dataSupplier['user_id'] = $auth['id'];
                if (empty($validate))
                    $this->CI->supplier->insert($dataSupplier);
            }
        }
    }

    public function uploadProduct($file, $supplier_id) {
        $this->CI->load->model('product_model', 'product');
        $this->CI->load->model('product_type_model', 'product_type');
        $this->CI->load->model('supplier_model', 'supplier');
        $this->CI->load->model('location_model', 'location');
        $this->CI->load->model('product_location_model', 'product_location');
        $this->CI->load->model('product_product_type_model', 'product_product_type');

        $auth = $this->CI->session->userdata('auth');

        $handle = fopen($file['tmp_name'], "r");
        $header = fgetcsv($handle, 1000, ",");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $imageLink = $data[1];
            $dir = PUBLICPATH . '/upload/';

            $productTypes = !empty($data[5]) ? explode('|', $data[5]) : array();
            $productlocations = !empty($data[6]) ? explode('|', $data[6]) : array();
            $product_type_ids = array();
            $product_location_ids = array();
            if (!empty($productTypes)) {
                foreach ($productTypes as $name) {
                    $name = trim(str_replace('"', '', $name));
                    $productType = $this->CI->product_type->getProductType("LOWER(name) = LOWER('{$name}')");
                    if (!empty($productType) && !in_array($productType['id'], $product_location_ids)) {
                        $product_type_ids[] = $productType['id'];
                    } else {
                        $product_type_ids[] = $this->CI->product_type->insert(array('name' => $name, 'user_id' => $auth['id']));
                    }
                }
            }
            if (!empty($productlocations)) {
                foreach ($productlocations as $name) {
                    $name = trim(str_replace('"', '', $name));
                    $location = $this->CI->location->getLocation("LOWER(name) = LOWER('{$name}')");
                    if (!empty($location) && !in_array($location['id'], $product_location_ids)) {
                        $product_location_ids[] = $location['id'];
                    } else {
                        $product_location_ids[] = $this->CI->location->insert(array('name' => $name, 'user_id' => $auth['id']));
                    }
                }
            }
            $product = array(
                'name' => trim($data[0]),
                'supplier_id' => $supplier_id,
                'unit' => trim($data[2]),
                'cost' => trim(trim(str_replace('"', '', $data[3]))),
                'qty' => trim($data[4]),
                'product_type' => $product_type_ids,
                'product_location' => $product_location_ids,
            );


            $sqlNameWhere['name'] = $product['name'];
            $sqlNameWhere['supplier_id'] = $product['supplier_id'];
            $validProduct = $this->CI->product->getProduct($sqlNameWhere);

            if (empty($validProduct)) {
                $validate = $this->productValidate($product, array());
                if (!empty($validate)) {
                    $product['status'] = 0;
                } else {
                    $product['status'] = 1;
                }
                $id = $this->insertProduct($product);
            } else {
                $id = $validProduct['id'];
                $validate = $this->productValidate($product, array(), $id);
                if (!empty($validate)) {
                    $product['status'] = 0;
                } else {
                    $product['status'] = 1;
                }
                $this->updateProduct($product, $id);
            }
            if (!empty($imageLink)) {
                $path_parts = pathinfo($imageLink);
                $image = $id . '.' . $path_parts['basename'];
                if (@copy($imageLink, $dir . '/' . $image)) {
                    $this->CI->product->update(array('image' => $image), $id);
                }
            }
        }
    }

    public function insertProduct($dataProduct) {
        $this->CI->load->model('product_model', 'product');
        $this->CI->load->model('product_type_model', 'product_type');
        $this->CI->load->model('supplier_model', 'supplier');
        $this->CI->load->model('location_model', 'location');
        $this->CI->load->model('product_location_model', 'product_location');
        $this->CI->load->model('product_product_type_model', 'product_product_type');
        $auth = $this->CI->session->userdata('auth');
        $dataProductInsert['user_id'] = $auth['id'];
        $dataProductInsert['supplier_id'] = $dataProduct['supplier_id'];
        $dataProductInsert['name'] = $dataProduct['name'];
        $dataProductInsert['unit'] = $dataProduct['unit'];
        $dataProductInsert['cost'] = $dataProduct['cost'];
        $dataProductInsert['qty'] = $dataProduct['qty'];
        $dataProductInsert['status'] = $dataProduct['status'];
        $id = $this->CI->product->insert($dataProductInsert);

        foreach ($dataProduct['product_location'] as $productLocationId) {
            $this->CI->product_location->insert(array('product_id' => $id, 'location_id' => $productLocationId));
        }

        foreach ($dataProduct['product_type'] as $productTypeId) {
            $this->CI->product_product_type->insert(array('product_id' => $id, 'product_type_id' => $productTypeId));
        }

        return $id;
    }

    public function updateProduct($dataProduct, $id) {
        $this->CI->load->model('product_model', 'product');
        $this->CI->load->model('product_type_model', 'product_type');
        $this->CI->load->model('supplier_model', 'supplier');
        $this->CI->load->model('location_model', 'location');
        $this->CI->load->model('product_location_model', 'product_location');
        $this->CI->load->model('product_product_type_model', 'product_product_type');
        $auth = $this->CI->session->userdata('auth');

        $this->CI->product_location->delete(array('product_id' => $id));
        $this->CI->product_product_type->delete(array('product_id' => $id));
        $dataProductInsert['user_id'] = $auth['id'];
        $dataProductUpdate['supplier_id'] = $dataProduct['supplier_id'];
        $dataProductUpdate['name'] = $dataProduct['name'];
        $dataProductUpdate['unit'] = $dataProduct['unit'];
        $dataProductUpdate['cost'] = $dataProduct['cost'];
        $dataProductUpdate['qty'] = $dataProduct['qty'];
        $dataProductUpdate['status'] = $dataProduct['status'];

        $this->CI->product->update($dataProductUpdate, $id);
        foreach ($dataProduct['product_location'] as $productLocationId) {
            $this->CI->product_location->insert(array('product_id' => $id, 'location_id' => $productLocationId));
        }
        foreach ($dataProduct['product_type'] as $productTypeId) {
            $this->CI->product_product_type->insert(array('product_id' => $id, 'product_type_id' => $productTypeId));
        }
    }

}
