<?php
/**
 * Created by PhpStorm.
 * User: luojinbo
 * Date: 16-7-30
 * Time: 下午4:45
 */
namespace Lib\Payment\WxPayAPI;
use \Lib\Payment\WxPayAPI\Lib\WxPayData\WxPayOrderQuery;
use \Lib\Payment\WxPayAPI\Lib\WxPayApi;
use \Lib\Payment\WxPayAPI\Lib\WxPayNotify;
use Lib\Payment\OrderCheck;
use \Lib\Model\Setting\StoreModel;

class PayNotifyCallBack extends WxPayNotify
{
    //查询订单
    public function queryOrder($appid, $store_id, $transaction_id)
    {
        $storeModel = new StoreModel();
        $config = $storeModel->getStoreConfig($appid, $store_id);
        $storeInfoConfig = [];
        array_map(function($row) use(&$storeInfoConfig){
            $storeInfoConfig[$row['code']][$row['key']] = $row['value'];
        }, $config);
        $input = new WxPayOrderQuery();
        $input->SetTransaction_id($transaction_id);
        $result = WxPayApi::orderQuery($input, $storeInfoConfig['wechat']);
        if(array_key_exists("return_code", $result)
            && array_key_exists("result_code", $result)
            && $result["return_code"] == "SUCCESS"
            && $result["result_code"] == "SUCCESS") {
            return true;
        }
        return false;
    }

    //重写回调处理函数
    public function NotifyProcess($data, &$msg)
    {
        if(!array_key_exists("transaction_id", $data)) {
            $msg = "输入参数不正确";
            return false;
        }
        //查询订单，判断订单真实性
        if(!$this->queryOrder($data['appid'], $data['store_id'], $data["transaction_id"])) {
            $msg = "订单查询失败";
            return false;
        }
        $orderCheck = new OrderCheck();
        $checkStatus = $orderCheck->checkOrder($data['appid'], $data['out_trade_no'], $data["transaction_id"], 'wxpay');
        if(!$checkStatus) {
            return false;
        }
        return true;
    }
} 