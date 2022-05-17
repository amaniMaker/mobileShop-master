<?php
include_once("connection.php");
if(!empty($_POST))
{
	$billing_first_nm=($_POST['billing_first_nm']!='')?$_POST['billing_first_nm']:"";
    $billing_last_nm=($_POST['billing_last_nm']!='')?$_POST['billing_last_nm']:"";
    $billing_company=($_POST['billing_company']!='')?$_POST['billing_company']:"";
    $billing_email=($_POST['billing_email']!='')?$_POST['billing_email']:"";
    $billing_phone=($_POST['billing_phone']!='')?$_POST['billing_phone']:"";
    $billing_address=($_POST['billing_address']!='')?$_POST['billing_address']:"";
    $billing_postal=($_POST['billing_postal']!='')?$_POST['billing_postal']:"";
    $billing_ville=($_POST['billing_ville']!='')?$_POST['billing_ville']:"";
    $shipping_first_nm=($_POST['shipping_first_nm']!='')?$_POST['shipping_first_nm']:"";
    $shipping_last_nm=($_POST['shipping_last_nm']!='')?$_POST['shipping_last_nm']:"";
    $shipping_company=($_POST['shipping_company']!='')?$_POST['shipping_company']:"";
    $shipping_address=($_POST['shipping_address']!='')?$_POST['shipping_address']:"";
    $shipping_postal=($_POST['shipping_postal']!='')?$_POST['shipping_postal']:"";
    $shipping_ville=($_POST['shipping_ville']!='')?$_POST['shipping_ville']:"";
    $shipping_notes=($_POST['shipping_notes']!='')?$_POST['shipping_notes']:"";

     $insert ="insert into order_details(billing_first_nm,billing_last_nm,billing_company,email_id,billing_phone,billing_address,
      billing_postal,billing_ville  ,shipping_first_nm,shipping_last_nm,shipping_company,shipping_address,shipping_postal,shipping_ville,shipping_notes
      ) values ('$billing_first_nm','$billing_last_nm','$billing_company','$billing_email','$billing_phone','$billing_address','$billing_postal'
      ,'$billing_ville','$shipping_first_nm','$shipping_last_nm','$shipping_company','$shipping_address','$shipping_postal','$shipping_ville','$shipping_notes')";
if (mysql_query($insert) or die(mysql_error()))
   {
   }
}
?>