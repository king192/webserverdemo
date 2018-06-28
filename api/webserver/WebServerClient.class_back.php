<?php

ini_set('soap.wsdl_cache', 0);
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);
exit();
class Client  {

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
     * 用户登录-注册
     * @param type $data
     * @return type
     */
    public function SetMemberInfo($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetMemberInfo($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetMemberInfoResult, true);
    }

    /**
     * 获取店铺信息
     * @param type $data
     * @return type
     */
    public function GetStoreInfo($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetStoreInfo($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetStoreInfoResult, true);
    }

    /**
     * 获取首页数据
     * @param type $data
     * @return type
     */
    public function GetAdvertiseInfo($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetAdvertiseInfo($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetAdvertiseInfoResult, true);
    }

    /**
     * 获取商品分类左侧导航栏
     * @param type $data
     * @return type
     */
    public function GetGoodsClassTree($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetGoodsClassTree($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetGoodsClassTreeResult, true);
    }

    /**
     * 获取商品分类
     * @param type $data
     * @return type
     */
    public function GetGoodsClassList($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetGoodsClassList($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetGoodsClassListResult, true);
    }

    /**
     * 获取商品列表
     * @param type $data
     * @return type
     */
    public function GetGoodsList($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetGoodsList($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetGoodsListResult, true);
    }

    /**
     * 获取商品详细
     * @param type $data
     * @return type
     */
    public function GetGoodsInfo($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetGoodsInfo($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetGoodsInfoResult, true);
    }

    /**
     * 获取商品库存
     * @param type $data
     * @return type
     */
    public function GetGoodsInventory($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetGoodsInventory($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetGoodsInventoryResult, true);
    }

    /**
     * 添加购物车
     * @param type $data
     * @return type
     */
    public function SetShoppingData($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetShoppingData($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetShoppingDataResult, true);
    }

    /**
     * 购物车详细
     * @param type $data
     * @return type
     */
    public function GetShoppingData($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetShoppingData($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetShoppingDataResult, true);
    }

    /**
     * 修改购物车商品数量
     * @param type $data
     * @return type
     */
    public function SetShoppingDataQty($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetShoppingDataQty($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetShoppingDataQtyResult, true);
    }

    /**
     * 删除购物车商品
     * @param type $data
     * @return type
     */
    public function SetShoppingRemoveRow($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetShoppingRemoveRow($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetShoppingRemoveRowResult, true);
    }

    /**
     * 商品评论接口
     * @param type $data
     * @return type
     */
    public function SetShoppingReview($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetShoppingReview($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetShoppingReviewResult, true);
    }

    /**
     * 购物车待结算接口
     * @param type $data
     * @return type
     */
    public function GetShoppingPayInfo($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetShoppingPayInfo($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetShoppingPayInfoResult, true);
    }

    /**
     * 购物车结算付款接口
     * @param type $data
     * @return type
     */
    public function SetShoppingPayMent($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetShoppingPayMent($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }
//        var_dump($result);exit;
        return json_decode($result->SetShoppingPayMentResult, true);
    }

    /**
     * 清空购物车接口
     * @param type $data
     * @return type
     */
    public function SetShoppingDataClear($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetShoppingDataClear($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetShoppingDataClearResult, true);
    }

    /**
     * 获取我的订单详情接口
     * @param type $data
     * @return type
     */
    public function GetOrderDetails($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetOrderDetails($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetOrderDetailsResult, true);
    }

    /**
     * 获取单页内容接口
     * @param type $data
     * @return type
     */
    public function GetSinglePage($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetSinglePage($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetSinglePageResult, true);
    }

    /**
     * 获取我的优惠券接口
     * @param type $data
     * @return type
     */
    public function GetMyCoupon($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetMyCoupon($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetMyCouponResult, true);
    }

    /**
     * 收藏商品接口
     * @param type $data
     * @return type
     */
    public function SetUserFavorites($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetUserFavorites($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetUserFavoritesResult, true);
    }

    /**
     * 获取我的收藏接口
     * @param type $data
     * @return type
     */
    public function GetUserFavorites($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetUserFavorites($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetUserFavoritesResult, true);
    }

    /**
     * 新增地址接口
     * @param type $data
     * @return type
     */
    public function SetUserAddress($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetUserAddress($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetUserAddressResult, true);
    }

    /**
     * 地址管理接口
     * @param type $data
     * @return type
     */
    public function GetUserAddress($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetUserAddress($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetUserAddressResult, true);
    }

    /**
     * 删除地址接口
     * @param type $data
     * @return type
     */
    public function SetUserAddRemove($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetUserAddRemove($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetUserAddRemoveResult, true);
    }

    /**
     * 查看地址接口
     * @param type $data
     * @return type
     */
    public function GetUserAddressInfo($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetUserAddressInfo($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetUserAddressInfoResult, true);
    }

    /**
     * 查看商品评论接口
     * @param type $data
     * @return type
     */
    public function GetShoppingReview($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetShoppingReview($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetShoppingReviewResult, true);
    }

    /**
     * 更改手机号码接口
     * @param type $data
     * @return type
     */
    public function SetUserTelephone($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetUserTelephone($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetUserTelephoneResult, true);
    }

    /**
     * 会员分享连接接口
     * @param type $data
     * @return type
     */
    public function SetUserShareLink($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetUserShareLink($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetUserShareLinkResult, true);
    }

    /**
     * 我的订单接口
     * @param type $data
     * @return type
     */
    public function GetOrderList($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetOrderList($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetOrderListResult, true);
    }

    /**
     * 我的分销接口
     * @param type $data
     * @return type
     */
    public function GetUserShare($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetUserShare($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetUserShareResult, true);
    }

    /**
     * 累计收益接口
     * @param type $data
     * @return type
     */
    public function GetUserShareProfit($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetUserShareProfit($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetUserShareProfitResult, true);
    }

    /**
     * 客户清单接口
     * @param type $data
     * @return type
     */
    public function GetUserShareList($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetUserShareList($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetUserShareListResult, true);
    }

    /**
     * 我的会员卡接口
     * @param type $data
     * @return type
     */
    public function GetMemberInfo($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetMemberInfo($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetMemberInfoResult, true);
    }

    /**
     * 绑定实体会员卡接口
     * @param type $data
     * @return type
     */
    public function SetMemberCard($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetMemberCard($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetMemberCardResult, true);
    }

    /**
     * 会员卡在线充值接口
     * @param type $data
     * @return type
     */
    public function SetMemberAddAmount($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetMemberAddAmount($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetMemberAddAmountResult, true);
    }

    /**
     * 充值卡充值接口
     * @param type $data
     * @return type
     */
    public function SetUserRechargeCard($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetUserRechargeCard($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetUserRechargeCardResult, true);
    }

    /**
     * 资金明细接口
     * @param type $data
     * @return type
     */
    public function GetUserAmtDetails($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetUserAmtDetails($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetUserAmtDetailsResult, true);
    }

    /**
     * 我的帐户接口
     * @param type $data
     * @return type
     */
    public function SetMemberBasicData($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetMemberBasicData($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetMemberBasicDataResult, true);
    }

    /**
     * 查看配送方式接口
     * @param type $data
     * @return type
     */
    public function GetShippingInfo($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetShippingInfo($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetShippingInfoResult, true);
    }

    /**
     * 修改地址接口
     * @param type $data
     * @return type
     */
    public function SetUserAddModify($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetUserAddModify($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetUserAddModifyResult, true);
    }

    /**
     * 订单付款接口
     * @param type $data
     * @return type
     */
    public function SetOrderPayment($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetOrderPayment($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetOrderPaymentResult, true);
    }

    /**
     * 删除收藏商品接口
     * @param type $data
     * @return type
     */
    public function SetFavoritesRemove($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetFavoritesRemove($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetFavoritesRemoveResult, true);
    }

    /**
     * 我的积分接口
     * @param type $data
     * @return type
     */
    public function GetUserIntegral($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetUserIntegral($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetUserIntegralResult, true);
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
     * 提现申请接口
     * @param type $data
     * @return type
     */
    public function SetUserWithdraw($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetUserWithdraw($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetUserWithdrawResult, true);
    }
    
   /**
     * 会员卡在线充值退款接口
     * @param type $data
     * @return type
     */
    public function SetMemberRefund($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetMemberRefund($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetMemberRefundResult, true);
    }
    
    
      /**
     * 会员卡在线充值订单接口
     * @param type $data
     * @return type
     */
    public function SetMemberRechargeOrder($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetMemberRechargeOrder($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetMemberRechargeOrderResult, true);
    }
    
     /**
     * 会员卡在线充值查看接口
     * @param type $data
     * @return type
     */
    public function SetMemberRechargeConfirm($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetMemberRechargeConfirm($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetMemberRechargeConfirmResult, true);
    }
    
   /**
     * 会员卡在线充值确认接口
     * @param type $data
     * @return type
     */
    public function GetMemberRechargeInfo($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetMemberRechargeInfo($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetMemberRechargeInfoResult, true);
    }
    
     /**
     * 购物车更改选择行接口
     * @param type $data
     * @return type
     */
    public function SetShoppingGoodsSel($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->SetShoppingGoodsSel($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->SetShoppingGoodsSelResult, true);
    }
    
    
      /**
     * 获取购物车商品合计
     * @param type $data
     * @return type
     */
    public function GetShoppingGoodsSel($data = array()) {
        $arr[] = $data;
        $str = json_encode($arr);
        //数据加密

        $_arr['json'] = $this->encode($str, $this->sKey);
//        var_dump($_arr);exit;
        try {
            $result = $this->client->GetShoppingGoodsSel($_arr);
        } catch (SoapFault $fault) {
            die($fault->faultstring);
        }

        return json_decode($result->GetShoppingGoodsSelResult, true);
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
