<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order_manager {

    private $CI;
    private $orders;
    private $auth;
    public $status = array(
        1 => 'Pending',
        2 => 'Completed',
        3 => 'Rejected',
        4 => 'Draft'
    );

    public function __construct() {
        $this->CI = & get_instance();
        $this->orders = $this->CI->session->userdata('orders');
        $this->auth = $this->CI->session->userdata('auth');
    }

    public function addOrder($status) {
        $this->CI->load->model('order_model');
        $this->CI->load->model('product_model');
        $this->CI->load->model('supplier_model');
        $this->CI->load->model('order_details_model');

        $totalOrder = $this->totalOrder();
        $dataOrder['user_id'] = $this->auth['id'];

        $dataOrder['total'] = $totalOrder['total'];
        if ($this->checkRedirectSubmitOrder($status)) {
            $dataOrder['status'] = 2;
        }
        $orderId = $this->CI->order_model->insert($dataOrder);

        $dataProducts = 'products.user_id = ' . $this->auth['parent_id'];
        $isList = array_keys($this->orders);
        $dataProducts .= ' AND products.id in (' . implode(', ', $isList) . ')';
        $products = $this->CI->product_model->listProductOrders($dataProducts);
        $supplierProducts = array();
        foreach ($products as $product) {
            $dataOrderDetails['product_id'] = $product['id'];
            $dataOrderDetails['order_id'] = $orderId;
            $dataOrderDetails['product_price'] = $product['cost'];
            $dataOrderDetails['qty'] = $this->orders[$product['id']];
            $dataOrderDetails['sub_total'] = $dataOrderDetails['product_price'] * $dataOrderDetails['qty'];
            $supplierProducts[$product['supplier_id']][] = array('name' => $product['name'], 'qty' => $dataOrderDetails['qty']);

            $this->CI->order_details_model->insert($dataOrderDetails);
        }
        if ($this->checkRedirectSubmitOrder($status)) {
            $this->sentToSuppliers($supplierProducts);
        } else {
            $this->sentToOwner($supplierProducts, $orderId);
        }
    }

    public function sentToOwner($supplierProducts, $orderId) {
        $this->CI->load->model('supplier_model');
        $this->CI->load->model('user_model');
        $this->CI->load->library('mail');

        if ($this->auth['parent_id'] == 0)
            $resUid = $this->auth['id'];
        else
            $resUid = $this->auth['parent_id'];
        $retaurant = $this->CI->user_model->getUser(array('id' => $resUid));
        $dataEmail['order_details'] = '';
        if (!empty($supplierProducts)) {
            $suppliers = $this->CI->supplier_model->listSuppliers(array(), array('id' => array_keys($supplierProducts)));

            foreach ($suppliers as $supplier) {
                $dataEmail['order_details'] .= '#' . $supplier['name'];
                $dataEmail['order_details'] .= '<table>
                                        <tbody>
                                        <tr><th>Name</th><th>Qty</th></tr>';
                foreach ($supplierProducts[$supplier['id']] as $product) {
                    $dataEmail['order_details'] .= '<tr>';
                    $dataEmail['order_details'] .= '<td>' . $product['name'] . '</td>';
                    $dataEmail['order_details'] .= '<td>' . $product['qty'] . '</td>';
                    $dataEmail['order_details'] .= '</tr>';
                }
                $dataEmail['order_details'] .= '</tbody>
                                    </table>';
            }
            $dataEmail['owner_name'] = $retaurant['firstname'] . ' ' . $retaurant['lastname'];
            $dataEmail['accept_link'] = site_url('order/accept/' . $orderId);
            $dataEmail['edit_link'] = site_url('order/update_orders/' . $orderId);
            $dataEmail['reject_link'] = site_url('order/reject/' . $orderId);
            $mailTo['name'] = $retaurant['firstname'] . ' ' . $retaurant['lastname'];
            $mailTo['email'] = $retaurant['email'];
            sentMailTemp($mailTo, 'owner_order', $dataEmail);
        }
    }

    public function sentToSuppliers($supplierProducts) {
        $this->CI->load->model('supplier_model');
        $this->CI->load->model('restaurant_model');
        $this->CI->load->library('mail');

        if ($this->auth['parent_id'] == 0)
            $resUid = $this->auth['id'];
        else
            $resUid = $this->auth['parent_id'];
        $retaurant = $this->CI->restaurant_model->getRetaurant(array('user_id' => $resUid));

        if (!empty($supplierProducts)) {
            $suppliers = $this->CI->supplier_model->listSuppliers(array(), array('id' => array_keys($supplierProducts)));
            foreach ($suppliers as $supplier) {
                if ($supplier['order_submission_method'] == 0) {

                    $mailTo['name'] = $supplier['name'];
                    $mailTo['email'] = $supplier['email'];

                    $dataEmail['supplier_name'] = $supplier['name'];
                    $dataEmail['retaurant_name'] = $supplier['name'];
                    $dataEmail['address'] = $supplier['name'];
                    $dataEmail['phone'] = $supplier['name'];
                    $dataEmail['product_details'] = '';

                    $dataEmail['product_details'] = '<table>
                                        <tbody>
                                        <tr><th>Name</th><th>Qty</th></tr>';
                    foreach ($supplierProducts[$supplier['id']] as $product) {
                        $dataEmail['product_details'] .= '<tr>';
                        $dataEmail['product_details'] .= '<td>' . $product['name'] . '</td>';
                        $dataEmail['product_details'] .= '<td>' . $product['qty'] . '</td>';
                        $dataEmail['product_details'] .= '</tr>';
                    }
                    $dataEmail['product_details'] .= '</tbody>
                                    </table>';
                    sentMailTemp($mailTo, 'supplier_order_checkout', $dataEmail);
                } else {
                    $mailTo['name'] = $supplier['name'];
                    $mailTo['email'] = $supplier['fax'] . '@icommo.com';

                    $dataEmail['supplier_name'] = $supplier['name'];
                    $dataEmail['retaurant_name'] = $supplier['name'];
                    $dataEmail['address'] = $supplier['name'];
                    $dataEmail['phone'] = $supplier['name'];
                    $dataEmail['product_details'] = '';

                    $dataEmail['product_details'] = '<table>
                                        <tbody>
                                        <tr><th>Name</th><th>Qty</th></tr>';
                    foreach ($supplierProducts[$supplier['id']] as $product) {
                        $dataEmail['product_details'] .= '<tr>';
                        $dataEmail['product_details'] .= '<td>' . $product['name'] . '</td>';
                        $dataEmail['product_details'] .= '<td>' . $product['qty'] . '</td>';
                        $dataEmail['product_details'] .= '</tr>';
                    }
                    $dataEmail['product_details'] .= '</tbody>
                                    </table>';
                    sentMailTemp($mailTo, 'fax_supplier_order_checkout', $dataEmail);
                }
            }
        }
    }

    public function checkRedirectSubmitOrder($status) {
        if (($this->auth['redirect_submit_order'] == 1 || $this->auth['parent_id'] == 0) && $status != 4) {
            return true;
        }
        return FALSE;
    }

    public function totalOrder() {
        $this->CI->load->model('order_model');
        $this->CI->load->model('product_model');
        $this->CI->load->model('order_details_model');

        $dataProducts = 'products.user_id = ' . $this->auth['id'];
        if (!empty($this->orders))
            $dataProducts .= ' AND products.id in(' . implode(', ', array_keys($this->orders)) . ')';
        else
            $dataProducts .= ' AND products.id in (0)';
        $products = $this->CI->product_model->listProductOrders($dataProducts);
        $total = 0;
        $orderDetail['total'] = 0;
        foreach ($products as $product) {
            $subTotal = $product['cost'] * $this->orders[$product['id']];
            $orderDetail['subtotal'][$product['id']] = $subTotal;
            $total += $subTotal;
        }
        $orderDetail['total'] = $total;
        return $orderDetail;
    }

    public function modifyOrder($orderid, $list_product_ids, $qty_products, $prices) {
        $this->CI->load->model('order_details_model');
        $this->CI->load->model('order_model');
        $delete = $this->deleteOrder($orderid);
        $data = array();
        foreach ($list_product_ids as $k => $v) {
            $data[$k]['product_id'] = $v;
        }
        foreach ($qty_products as $k => $v) {
            $data[$k]['qty_products'] = $v;
        }
        foreach ($prices as $k => $v) {
            $data[$k]['prices'] = $v;
        }
        foreach ($data as $k => $v) {
            $dataOrderDetails['product_id'] = $v['product_id'];
            $dataOrderDetails['order_id'] = $orderid;
            $dataOrderDetails['product_price'] = $v['prices'];
            $dataOrderDetails['qty'] = $v['qty_products'];
            $dataOrderDetails['sub_total'] = $v['prices'] * $v['qty_products'];
            $this->CI->order_details_model->insert($dataOrderDetails);
        }
        $total_price = $this->calculatorPrice($data);
        $updateOrder = array(
            'total' => $total_price,
        );
        $this->CI->order_model->update($updateOrder, $orderid);
    }

    public function calculatorPrice($data) {
        $tmp = 0;
        foreach ($data as $k => $v) {
            $tmp +=$v['prices'] * $v['qty_products'];
        }
        return $tmp;
    }

    public function deleteOrder($orderid) {
        $this->CI->load->model('order_details_model');
        $orderid = (int) $orderid;
        $dataDelete = array(
            'order_id' => $orderid
        );
        $this->CI->order_details_model->delete($dataDelete);
    }

}
