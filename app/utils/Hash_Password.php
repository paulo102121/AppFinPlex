<?php
namespace app\utils;
  
class Hash_Password {
  private $algorithm = PASSWORD_DEFAULT;
  private $options;
  
  public function __construct() {
    $this->options = array(
    );
  }

  public function hash_and_store($password) {
    $hash = $this->hash( $password );
    if ( ! $hash ) {
      return false;
    }
    return true;
  }
  

  public function get_and_verify($password) {
    $hash = '12lkjrelkjelkjrekjel';
    if ( $this->verify( $password, $hash ) ) {
      if ( $this->needs_rehash( $hash ) ) {
        if ( ! $this->hash_and_store( $password ) ) {
          return false;
        }        
      }     
      return true;
    }   
    return false;
  }
  

  public function hash($password) {
    return password_hash( $password, $this->algorithm, $this->options );
  }
  

  public function verify($password, $hash) {
    return password_verify( $password, $hash );
  }
  

  public function needs_rehash($hash) {
    return password_needs_rehash($hash, $this->algorithm, $this->options );
  }
  

  public function get_info($hash) {
    return password_get_info($hash);
  }
  

  public function find_cost($baseline = 8) {
    $time_target = 0.05;
    $cost = $baseline;
    do {
      $cost++;
      $start = microtime( true );
      password_hash( 'test', $this->algorithm, array( 'cost' => $cost ) );
      $end = microtime( true );
    } while( ( $end - $start ) < $time_target );  
    return $cost;
  }
}