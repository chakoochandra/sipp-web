<?php
if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

class Nativesession{
    public function __construct(){
        session_start();
    }

    public function set( $key, $value )
    {
        $_SESSION[$key] = $value;
    }

    public function get( $key )
    {
        return isset( $_SESSION[$key] ) ? $_SESSION[$key] : null;
    }

    public function regenerateId( $delOld = false )
    {
        session_regenerate_id( $delOld );
    }

    public function delete( $key )
    {
        unset( $_SESSION[$key] );
    }

    public function freeSession(){
        try {
            session_unset();
            session_destroy();
            session_write_close();
            setcookie(session_name(),'',0,'/');
            session_regenerate_id(true);
        } catch (Exception $e) {
            
        }
        
    }

    public function set_flash_session( $key, $value )
    {
        $_SESSION[$key] = $value;
    }

    public function is_flash_session( $key )
    {
        $result = isset( $_SESSION[$key] ) ? TRUE : FALSE;
        return $result;
    }

    public function get_flash_session( $key )
    {
        $result = isset( $_SESSION[$key] ) ? $_SESSION[$key] : null;
        $this->delete($key);
        return $result;
    }

    public function isStatusPihak(){
        return isset( $_SESSION['is_status_pihak'] ) ? $_SESSION['is_status_pihak'] : FALSE;
    }

    public function getStatusPihak($idtahapan,$idalurperkara,$pihakke){
        $status = isset( $_SESSION['var_'.$idtahapan] ) ? $_SESSION['var_'.$idtahapan] : null;
        if(isset($status[$idalurperkara][$pihakke])){
            return $status[$idalurperkara][$pihakke];
        }else{
            return '<font color="red">Error, Pihak Not Found!!!</font>';
        }
    }
}
?>