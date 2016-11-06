<?php
namespace Reqres\Module\Messages;

use Reqres\Response;

trait View  {
    
    /**
     *
     * Выводим ошибку
     *
     */
    function mod_message_error($error)
    {

        Response::json()
            -> protocol('message')
            -> data([
                'error' => $error,
                'status' => 'error'
            ])
            -> respond();

    }
    
    
    /**
     *
     * Выводим сообщение
     *
     */
    function mod_message_success($message)
    {
        
        Response::json()
            -> protocol('message')
            -> data([
                'message' => $message,
                'status' => 'success'
            ])
            -> respond();
                
    }

    
    /**
     *
     * Выводим заметку
     *
     */
    function mod_message_notice($notice)
    {
        
        Response::json()
            -> protocol('message')
            -> data([
                'notice' => $notice,
                'status' => 'notice'
            ])
            -> respond();
                
    }
    
}
