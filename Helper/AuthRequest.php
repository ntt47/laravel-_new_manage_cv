<?php 

require_once('Helper/BaseRequest.php');

class AuthRequest 
{   
    public function validateRegister($data)
    {
        if(empty($data['email'])){
            $errors['email']= "Email không được để trống";
        }

        if(empty($data['password'])){
            $errors['password']= "Password không được để trống";
        }

        if(empty($data['password_confirmation'])){
            $errors['password_confirmation']= "Password nhập lại không được để trống";
        }

        if ( strcmp($data['password'],$data['password_confirmation'] ) == 0 ) {
        }else{
            $errors['password_confirmation']="Mật khẩu nhập lại không giống nhau";
        }
        
        return $errors= isset($errors) ? $errors : "" ;
    }

    public function validateLogin($data)
    {
        if(empty($data['email'])){
            $errors['email']= "Email không được để trống";
        }

        if(empty($data['password'])){
            $errors['password']= "Password không được để trống";
        }
        
        return $errors= isset($errors) ? $errors : "" ;
    }

    public function validateLoginAdmin($data)
    {
        if(empty($data['email'])){
            $this->errors['email']= "Email không được để trống";
        }

        if(empty($data['password'])){
            $this->errors['password']= "Password không được để trống";
        }
        
        return $this->errors;
    }

    public function validatePost($data)
    {
        if(empty($data['title'])){
            $errors['title']= "Tất cả các trường bắt buộc phải nhập";
        }

        if(empty($data['company'])){
            $errors['company']= "Tất cả các trường bắt buộc phải nhập";
        }

        if(empty($data['location'])){
            $errors['location']= "Tất cả các trường bắt buộc phải nhập";
        }

        if(empty($data['description'])){
            $errors['description']= "Tất cả các trường bắt buộc phải nhập";
        }

        if(empty($data['status'])){
            $errors['status']= "Tất cả các trường bắt buộc phải nhập";
        }
        
        return $errors= isset($errors) ? $errors : "" ;
    }


}


