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

        Response::JSON()
            -> protocol('Message', 'Error')
            -> data([
                'error' => $error,
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
        
        Response::JSON()
            -> protocol('Message', 'Success')
            -> data([
                'message' => $message
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
        
        Response::JSON()
            -> protocol('Message', 'Notice')
            -> data([
                'notice' => $notice
            ])
            -> respond();
                
    }
    
}
