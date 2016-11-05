<?php
namespace Reqres\Module\Messages;

Class View  {
    
    /**
     *
     * Выводим ошибку
     *
     */
    function message_error($error)
    {

        $this-> protocol_messages()
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
    function message_success($message)
    {
        
        $this-> protocol_messages()
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
    function message_notice($notice)
    {
        
        $this-> protocol_messages()
            -> data([
                'notice' => $notice,
                'status' => 'notice'
            ])
            -> respond();
                
    }
    
}