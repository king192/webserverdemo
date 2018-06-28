<?php
//ini_set("soap.wsdl_cache_enabled", "0");
include_once '../../config.inc.php';
include_once 'commonWebServer.php';

class webServerInterface extends commonWebServer {
	
	
function setClass($data) {
		$json_data = $this->decode($data,$this->sKey);
		$result = json_decode($json_data,true);
		//ksort($result);
		//echo '<pre>';
		//print_r($result);
		$FItemID_OK =array();
		$FItemID_ERROR =array();
		$FMSG='';
		if ($result) {
			
			$this->writeLog(date('Y-m-d'), "webserverClass.txt", $data);
			foreach($result as $k=>$v){
				$class_data=array();
				$oid=$v['FClassID'];
				$class_data['FClassNumber']=$v['FClassNumber'];
				$class_data['FClassName']=$v['FClassName'];
				$class_data['FCorpList']=$v['FCorpList']?$v['FCorpList']:'';
				
				$class_data['FClassParentID']=$v['FClassParentID']!=''?$v['FClassParentID']:0;
				if ($class_data['FClassParentID']==0) {
					$class_data['f_lever']=1;
				}else{
					//$this->sqlshow=2;
					$f_flord_info=$this->getInfo($class_data['FClassParentID'], 'pro_class','id');
					if (empty($f_flord_info)){
						$FItemID_ERROR[]=$oid;
						$FMSG.=$oid.'父id不存在';
						continue;
					}
					$class_data ['f_lever']=$f_flord_info['f_lever']+1;
					//$class_data['f_lever']=2;
				}
				
				
				if ($this->getCheckIsExist ( $oid, 'pro_class', 'id' ) == 4) {
					if ($this->updateData("pro_class", $oid, $class_data,'id')) {
						$FItemID_OK[]=$oid;
					}else{
						$FItemID_ERROR[]=$oid;
					}
					
				}else{
					$class_data['id']=$v['FClassID'];
					if ($this->insertData("pro_class", $class_data)) {
						$FItemID_OK[]=$oid;
					}else{
						$FItemID_ERROR[]=$oid;
					}
					
				}
			}
		}
		if (count($FItemID_OK)>0 || count($FItemID_ERROR)>0) {
			$out_date ['status'] = '1';
			$FItemID_OK_str=implode(',', $FItemID_OK);
			$FItemID_ERROR_str=implode(',', $FItemID_ERROR);
			
			//$out_date ['FItemID_OK'] = $FItemID_OK_str;
			$out_date ['FClassID_ERROR'] =$FItemID_ERROR_str ;
			if ($out_date ['FClassID_ERROR']) {
				$out_date ['info'] = '部分成功';
			}else{
				$out_date ['info'] = '操作成功';
			}
			
			return json_encode ( $out_date );
		}else{
			$out_date ['status'] = '2';
			$out_date ['FItemID'] ='' ;
			$out_date ['info'] = '操作失败';
			return json_encode ( $out_date );
		}
		
	}
	
	
	
function setMember($data) {
		$json_data = $this->decode($data,$this->sKey);
		$result = json_decode($json_data,true);
		$FItemID_OK =array();
		$FItemID_ERROR =array();
		if ($result) {
			
			$this->writeLog(date('Y-m-d'), "webserverMember.txt", $json_data);
			foreach($result as $k=>$v){
				$member_data=array();
				$oid=$v['FItemID'];
				$member_data['UserName']=$v['UserName'];
				$member_data['Email']=$v['Email'];
				$member_data['Password']=$v['Password'];
				$member_data['Updata_Je']=$v['Updata_Je']!=''?$v['Updata_Je']:0;
				$member_data['CardNo']=$v['CardNo'];
				$member_data['Telephone']=$v['Telephone'];
				$member_data['Birthday']=$v['Birthday'];
				$member_data['FDeleteFlag']=$v['FDeleteFlag']!=''?$v['FDeleteFlag']:0;
				$member_data['FPapers']=$v['FPapers'];
				$member_data['FStockID']=$v['FStockID'];
				$member_data['Address']=$v['Address'];
				//$this->sqlshow=2;
				if ($this->getCheckIsExist ( $oid, 'member', 'oid' ) == 4) {
					if ($this->updateData("member", $oid, $member_data,'oid')) {
						$FItemID_OK[]=$oid;
					}else{
						$FItemID_ERROR[]=$oid;
					}
					
				}else{
					$member_data['oid']=$v['FItemID'];
					if ($this->insertData("member", $member_data)) {
						$FItemID_OK[]=$oid;
					}else{
						$FItemID_ERROR[]=$oid;
					}
					
				}
			}
		}
		if (count($FItemID_OK)>0 || count($FItemID_ERROR)>0) {
			$out_date ['status'] = '1';
			$FItemID_OK_str=implode(',', $FItemID_OK);
			$FItemID_ERROR_str=implode(',', $FItemID_ERROR);
			
			//$out_date ['FItemID_OK'] = $FItemID_OK_str;
			$out_date ['FItemID_ERROR'] =$FItemID_ERROR_str ;
			
		    if ($out_date ['FItemID_ERROR']) {
				$out_date ['info'] = '部分成功';
			}else{
				$out_date ['info'] = '操作成功';
			}
			
			//$out_date ['info'] = '操作成功';
			return json_encode ( $out_date );
		}else{
			$out_date ['status'] = '2';
			$out_date ['FItemID'] ='' ;
			$out_date ['info'] = '操作失败';
			return json_encode ( $out_date );
		}
		
	}
	
	function setShop($data) {
		$json_data = $this->decode($data,$this->sKey);
		$result = json_decode($json_data,true);
		$FItemID_OK =array();
		$FItemID_ERROR =array();
		if ($result) {
			
			$this->writeLog(date('Y-m-d'), "webserverShop.txt", $data);
			foreach($result as $k=>$v){
				$shop_data=array();
				$oid=$v['FItemID'];
				$shop_data['FNumber']=$v['FNumber'];
				$shop_data['FName']=$v['FName'];
				//$shop_data['FClass']=$v['FClass'];
				
				//$shop_data['add_date']=date('Y-m-d');
				
				
				if ($this->getCheckIsExist ( $oid, 'shop', 'oid' ) == 4) {
					
					if ($this->updateData("shop", $oid, $shop_data,'oid')) {
						$FItemID_OK[]=$oid;
					}else{
						$FItemID_ERROR[]=$oid;
					}
					
				}else{
					$shop_data['oid']=$v['FItemID'];
					//$shop_data['shop_pwd']=$this->GetRandStr(6);
					if ($this->insertData("shop", $shop_data)) {
						$FItemID_OK[]=$oid;
					}else{
						$FItemID_ERROR[]=$oid;
					}
					
				}
			}
		}
		if (count($FItemID_OK)>0 || count($FItemID_ERROR)>0) {
			$out_date ['status'] = '1';
			$FItemID_OK_str=implode(',', $FItemID_OK);
			$FItemID_ERROR_str=implode(',', $FItemID_ERROR);
			
			//$out_date ['FItemID_OK'] = $FItemID_OK_str;
			$out_date ['FItemID_ERROR'] =$FItemID_ERROR_str ;
			if ($out_date ['FItemID_ERROR']) {
				$out_date ['info'] = '部分成功';
			}else{
				$out_date ['info'] = '操作成功';
			}
			return json_encode ( $out_date );
		}else{
			$out_date ['status'] = '2';
			$out_date ['FItemID'] ='' ;
			$out_date ['info'] = '操作失败';
			return json_encode ( $out_date );
		}
		
		
		//return $data;
		
	}
	
	function setProduct($data) {
		$json_data = $this->decode($data,$this->sKey);
		$result = json_decode($json_data,true);
		$FItemID_OK =array();
		$FItemID_ERROR =array();
		if ($result) {
			
			$this->writeLog(date('Y-m-d'), "webserverProduct.txt", $data);
			foreach($result as $k=>$v){
			$shop_data=array();
				$oid=$v['FItemID'];
				
				
				$product_data['product_number']=$v['FNumber'];
				$product_data['product_name']=$v['FName'];
				//$product_data['price0']=$v['FPrice']?$v['FVipPrice']:0;
				$product_data['FPrice']=$v['FPrice']?$v['FPrice']:0;
				$product_data['FPrice1']=($v['FPrice1']>0)?$v['FPrice1']:1;
				
				$product_data['price0']=$v['FPosPrice']?$v['FPosPrice']:0;
				
				$product_data['product_unit']=$v['FUnitName'];
				$product_data['FClassID']=($v['FClassID']>0)?$v['FClassID']:0;
				
				$product_data['FClassNumber']=$v['FClassNumber'];
				$product_data['FClassName']=$v['FClassName'];
				$product_data['FPrBName']=$v['FPrBName'];
				
				//$product_data['FPosPrice']=$v['FPosPrice']?$v['FPosPrice']:0;
				
				$product_data['FIntegral']=$v['FIntegral']?$v['FIntegral']:0;
				$product_data['Fconvert']=$v['Fconvert']?$v['Fconvert']:1;
				$product_data['FUnitPackName']=$v['FUnitPackName'];
				
				$product_data['FDeleteFlag']=$v['FDeleteFlag']?$v['FDeleteFlag']:0;
				$product_data['update_date']=date ( "Y-m-d H:i:s" );
				
				
				$product_data['FRemark']=$v['FRemark'];
				
				
				//$this->sqlshow=2;
				if ($this->getCheckIsExist ( $oid, 'product', 'oid' ) == 4) {
					
					if ($this->updateData("product", $oid, $product_data,'oid')) {
						$FItemID_OK[]=$oid;
					}else{
						 $FItemID_ERROR[]=$oid;
					}
					
				}else{
					$product_data['oid']=$v['FItemID'];
					$product_data['senddate']=date('Y-m-d');
					if ($this->insertData("product", $product_data)) {
						$FItemID_OK[]=$oid;
					}else{
						$FItemID_ERROR[]=$oid;
					}
					
				}
				
			}
			
		}
		
		if (count($FItemID_OK)>0 || count($FItemID_ERROR)>0) {
			$out_date ['status'] = '1';
			$FItemID_OK_str=implode(',', $FItemID_OK);
			$FItemID_ERROR_str=implode(',', $FItemID_ERROR);
			
			//$out_date ['FItemID_OK'] = $FItemID_OK_str;
			$out_date ['FItemID_ERROR'] =$FItemID_ERROR_str ;
			if ($out_date ['FItemID_ERROR']) {
				$out_date ['info'] = '部分成功';
			}else{
				$out_date ['info'] = '操作成功';
			}
			return json_encode ( $out_date );
		}else{
			$out_date ['status'] = '2';
			$out_date ['FItemID'] ='' ;
			$out_date ['info'] = '操作失败';
			return json_encode ( $out_date );
		}
		
		//return "test";
	}
	
	
	
	function GetRandStr($len) {
		// "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
		$chars = array ("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9" );
		$charsLen = count ( $chars ) - 1;
		shuffle ( $chars );
		$output = "";
		for($i = 0; $i < $len; $i ++) {
			$output .= $chars [mt_rand ( 0, $charsLen )];
		}
		return $output;
	}
	function getlist($date) {
		$result = array (array ('name' => '张三', 'age' => 18 ), array ('name' => '李四', 'age' => 20 ), array ('name' => 'jms', 'age' => 10 ), array ('name' => 'jk陈', 'age' => 8 ) );
		$result = json_encode ( $result );
		return $result;
	}
	
	function writeLog($attachDir, $file_name, $action_bz) {
		$attachDir=$_SERVER['DOCUMENT_ROOT']."/api/webserver_log/".$attachDir;
		try {
			if (! is_dir ( $attachDir )) {
			@mkdir ( $attachDir, 0777 ,true);
			@fclose ( fopen ( $attachDir . '/index.htm', 'w' ) );
		}
		$num_file = $attachDir . "/" . $file_name;
		
		$fp = fopen ( $num_file, "a" );
		
		$txt=date ( 'Y-m-d H:i:s', time ())."  ".$action_bz."  ";
		
		fwrite ( $fp, $txt . "\r\n" );
		fclose ( $fp );
		} catch (Exception $e) {
			echo $e;
		}
	}
}