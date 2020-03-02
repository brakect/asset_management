<?php
session_start();
require('Database.php');
class Controller extends Database
{
	public function login($data)
	{
		$result=$this->db->query('select * from admin where email="'.$data['email'].'" and password="'.$data['password'].'"');
		$d= $result->fetch(PDO::FETCH_ASSOC);
		if($d){
			$_SESSION['adminID']=$d['id'];
			$_SESSION['name']=$d['name'];
			$_SESSION['photo']=$d['photo'];
			header('Location: dashboard.php');
		}else{
			$_SESSION['msg']='Wrong email or password';
			header('Location: index.php');
		}
	}
	public function logout()
	{
		session_destroy();
		header('Location: index.php');
	}
	public function is_logged_in()
	{
		if(!isset($_SESSION['adminID'])){
			header('Location: index.php');
		}
	}
	
	public function new_admin_photos($data)
	{
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
		$data['photo']=$_FILES["photo"]["name"];
		$this->insert('admin',$data);
		header('Location: user.php');
	}
	public function new_admin($data)
	{
		$this->insert('admin',$data);
		header('Location: user.php');
	}
	public function get_admin(){
		$admins=$this->getData('admin','1');
		return $admins;
	}
	public function del_admin($id)
	{
		$this->delete('admin',' id= '.$id);	
	}
	public function get_admin_update($id){
		$d=$this->getData('admin','id='.$id);
		return $d->fetch(PDO::FETCH_ASSOC);

	}
	public function update_admin_photos($data)
	{
		if($_FILES["photo"]["name"]!=""){
			$target_dir = "images/";
			$target_file = $target_dir . basename($_FILES["photo"]["name"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
			$data['photo']=$_FILES["photo"]["name"];
		}else{
			unset($data['photo']);
		}
		$this->update('admin',$data,'id='.$data['id']);
		header('Location: user.php');
	}
	public function edit_admin($data)
	{
		$this->update('admin',$data,'id='.$data['id']);
		header("Location: user.php"); 
	}
	// public function get_admin_update($id)
	// {
	// 	$d=$this->getData('admin','id='.$id);
	// 	return $d->fetch(PDO::FETCH_ASSOC);
	// }
	public function new_product($data)
	{
		$target_dir = "product_pic/";
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
		$data['photo']=$_FILES["photo"]["name"];
		$this->insert('product',$data);
		header('Location: product_list.php');
	}
	public function get_product()
	{
		$result=$this->getData('product','1 order by id desc');
		return $result;
	}
	public function del_product($id)
	{
		$this->delete('product',' id= '.$id);
	} 
	public function edit_product($data)
	{
		$this->update('product',$data,'id='.$data['id']);
		header('Location: product_list.php');
	}
	public function update_product_photos($data)
	{
		if($_FILES["photo"]["name"]!=""){
			$target_dir = "product_pic/";
			$target_file = $target_dir . basename($_FILES["photo"]["name"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
			$data['photo']=$_FILES["photo"]["name"];
		}else{
			unset($data['photo']);
		}
		$this->update('product',$data,'id='.$data['id']);
		header('Location: product_list.php');
	}
	public function get_product_update($id)
	{
		$d=$this->getData('product','id='.$id);
		return $d->fetch(PDO::FETCH_ASSOC);
	}
	public function del_stock_in($id)
	{
		$this->delete('stock_in',' id= '.$id);	
	} 
	public function edit_stock_in($data)
	{
		$this->update('stock_in',$data,'id='.$data['id']);
		header("Location: stock_in_list.php"); 
	}
	public function get_stock_in_update($id)
	{
		$d=$this->getData('stock_in','id='.$id);
		return $d->fetch(PDO::FETCH_ASSOC);
	}
	public function del_stock_out($id)
	{
		$this->delete('stock_out',' id= '.$id);	
	} 
	public function edit_stock_out($data)
	{
		$this->update('stock_out',$data,'id='.$data['id']);
		header("Location: stock_out_list.php"); 
	}
	public function get_stock_out_update($id)
	{
		$d=$this->getData('stock_out','id='.$id);
		return $d->fetch(PDO::FETCH_ASSOC); 
	} 
	public function del_wastage($id)
	{
		$this->delete('wastage',' id= '.$id);
	}
	public function edit_wastage($data)
	{
		$this->update('wastage',$data,'id='.$data['id']);
		header('Location: wastage_list.php');
	}
	public function get_wastage_update($id)
	{
		$d=$this->getData('wastage','id='.$id);
		return $d->fetch(PDO::FETCH_ASSOC);
	}
	public function del_returns($id)
	{
		$this->delete('returns','id='.$id);	
	} 
	public function edit_returns($data)
	{
		$this->update('returns',$data,'id='.$data['id']);
		header("Location: returns_list.php"); 
	}
	public function get_returns_update($id)
	{
		$d=$this->getData('returns','id='.$id);
		return $d->fetch(PDO::FETCH_ASSOC);
	}
	public function get_supplier(){
		$supplier=$this->getData('supplier','1');
		return $supplier;
	}
	public function del_supplier($id)
	{
		$this->delete('supplier',' id= '.$id);	
	} 
	public function edit_supplier($data)
	{
		$this->update('supplier',$data,'id='.$data['id']);
		header("Location: supplier_list.php"); 
	}
	public function get_supplier_update($id)
	{
		$d=$this->getData('supplier','id='.$id);
		return $d->fetch(PDO::FETCH_ASSOC);
	}
	


}


