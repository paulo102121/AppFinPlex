<?php
namespace app\utils;
  
class Crypt_Random {
private $key = 'CUSTOM_NOPLEX_SALT_KEY'; 
private $plaintext = "String_to_be_encrypted"; 
  
  public function __construct($key, $plaintext) {
    $this->key = $key;
    $this->plaintext = $plaintext;
  }

public function key_to_be_crypted(){
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC"); 
$iv = openssl_random_pseudo_bytes($ivlen); 
$ciphertext_raw = openssl_encrypt($this->plaintext, $cipher, $this->key, $options=OPENSSL_RAW_DATA, $iv); 
$hmac = hash_hmac('sha256', $ciphertext_raw, $this->key, $as_binary=true); 
return base64_encode($iv.$hmac.$ciphertext_raw);
}

 
public function key_to_be_decrypted($ciphertext){
$c = base64_decode($ciphertext); 
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC"); 
$iv = substr($c, 0, $ivlen); 
$hmac = substr($c, $ivlen, $sha2len=32); 
$ciphertext_raw = substr($c, $ivlen+$sha2len); 
$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $this->key, $options=OPENSSL_RAW_DATA, $iv); 
$calcmac = hash_hmac('sha256', $ciphertext_raw, $this->key, $as_binary=true); 
 
if(hash_equals($hmac, $calcmac)){
  //echo 'Original String: '.$original_plaintext; 
   return $original_plaintext; 
}else{ 
  return 'Chave incorreta!'; 
}
}





  
}