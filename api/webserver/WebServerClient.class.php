<?php
ini_set('soap.wsdl_cache', 0);
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);

class Client  {
	//8809
	//8088
    private $url = "http://121.40.197.117:8088/Interfaces/QxtInterfaceService.asmx?WSDL";
    private $client;
    private $sKey = "wx@)!%06";

    public function __construct() {
        $this->client = new SoapClient($this->url);
        $this->client->soap_defencoding = 'utf-8';
        $this->client->decode_utf8 = false;
        $this->client->xml_encoding = 'utf-8';
    }

    

    /**
     * 获取我的优惠券接口
     * @param type $data
     * @return type
     */
    public function GetMyCoupon($data = array()) {
    	//echo "345345345";
        $arr[] = $data;
         $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
       // print_r($_arr['json']);exit;
        try {
            $result = $this->client->GetMyCoupon($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetMyCouponResult, true);
    }
    
    
	/**
     * 使用购物券我的优惠券接口
     * @param type $data
     * @return type
     */
    public function SetCouponApply($data = array()) {
    	
        $arr[] = $data;
         $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
       // print_r($_arr['json']);exit;
        try {
            $result = $this->client->SetCouponApply($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetCouponApplyResult, true);
    }
    
/**
     * 退回购物券我的优惠券接口
     * @param type $data
     * @return type
     */
    public function SetCouponRefund($data = array()) {
    	
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
        //print_r($_arr['json']);exit;
        try {
            $result = $this->client->SetCouponRefund($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetCouponRefundResult, true);
    }
    
    
	/**
     * 修改密码接口
     * @param type $data
     * @return type
     */
    public function SetMemberPassword($data = array()) {
    	
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
       //print_r($_arr['json']);exit;
        try {
            $result = $this->client->SetMemberPassword($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetMemberPasswordResult, true);
    }
    
	/**
     * 订单接口
     * @param type $data
     * @return type
     * SetMallApplyBill
     */
   /* public function SetMallOrderBill($data = array()) {
    	
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密
		//exit();
        $_arr['json'] = $this->encode($str, $this->sKey);
       // print_r($_arr['json']);exit;
        try {
            $result = $this->client->SetMallOrderBill($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetMallOrderBillResult, true);
    }*/
    
	public function SetMallOrderBill($data = array()) {
    	
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密
		//exit();
        $_arr['json'] = $this->encode($str, $this->sKey);
       // print_r($_arr['json']);exit;
        try {
            $result = $this->client->SetMallApplyBill($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetMallApplyBillResult, true);
    }

    

    /**
     * 订单确认收货接口
     * @param type $data
     * @return type
     */
    public function SetOrderConfirm($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetOrderConfirm($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetOrderConfirmResult, true);
    }
 
    
    
    
    
    /**
     * 加密
     * @param string $str 要处理的字符串
     * @param string $key 加密Key，为8个字节长度
     * @return string
     */
    private function encode($str, $key) {
        $size = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_CBC);
        $str = $this->pkcs5Pad($str, $size);
        $aaa = mcrypt_cbc(MCRYPT_DES, $key, $str, MCRYPT_ENCRYPT, $key);
        $ret = base64_encode($aaa);
        return $ret;
    }

    /**
     * 解密
     * @param string $str 要处理的字符串
     * @param string $key 解密Key，为8个字节长度
     * @return string
     */
    private function decode($str, $key) {
        $strBin = base64_decode($str);
        $str = mcrypt_cbc(MCRYPT_DES, $key, $strBin, MCRYPT_DECRYPT, $key);
        $str = $this->pkcs5Unpad($str);
        return $str;
    }

    private function hex2bin($hexData) {
        $binData = "";
        for ($i = 0; $i < strlen($hexData); $i += 2) {
            $binData .= chr(hexdec(substr($hexData, $i, 2)));
        }
        return $binData;
    }

    private function pkcs5Pad($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    private function pkcs5Unpad($text) {
        $pad = ord($text {strlen($text) - 1});
        if ($pad > strlen($text))
            return false;

        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad)
            return false;

        return substr($text, 0, - 1 * $pad);
    }

}