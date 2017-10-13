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
    
    
    /**
     *
     * Подготавляаем запрос
     *
     */
    function mod_message_confirm_response($question, $title = null, $yes = null, $no = null)
    {
        
        return Response::JSON()
            // отправляем 
            -> protocol('Message', 'Confirm')
            -> data([
                'question' => $question,
                'header' => $this-> mod_message_confirm_header,
                'hash' => $this-> mod_message_confirm_hash,
                'title' => isset($title) ? $title : 'Подтвердите действие',
                'yes' => isset($title) ? $title : 'Да',
                'no' => isset($title) ? $title : 'Нет',
            ]);
        
    }
 
    /**
     *
     * Выводим данные для подтверждения
     *
     */
    function mod_message_confirm($question, $title = null, $yes = null, $no = null)
    {

        // выводим подготовленный запрос
        $this-> mod_message_confirm_response($question, $title, $yes, $no)
            -> respond();
        
    }    
}
