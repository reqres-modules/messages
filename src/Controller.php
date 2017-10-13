<?php
namespace Reqres\Module\Messages;

use Reqres\User;
use Reqres\Request;
use Reqres\Form;
use Reqres\Error;

/**
 *
 *
 *
 */
trait Controller
{
    
    protected $mod_message_confirm_header = 'MY-CONFIRM-HEADER';
    protected $mod_message_confirm_salt = 'secret';
    
    /**
     *
     * Протокол подтверждения действия
     *
     * если написать так, то на экран выведется сообщение о поддверждении действия
     *
     *   if(!$this-> mod_message_confirm()) $this-> view()-> mod_message_confirm('Точно?');
     *   
     *
     */
    protected function mod_message_confirm($unique_str = '')
    {

        // сначала проверяем что мы находимся внутри аякса
        if(!Request::get()-> ajax()) new Error('Запрещено использовать протокол подтверждения действия вне AJAX');

        // высчитываем подтверждение
        $this-> mod_message_confirm_hash = md5($unique_str.Request::get()-> uri().$this-> mod_message_confirm_salt.'?');
        
        // потом смотрим пришел ли нам указанный заголовок
        if(!$hash = Request::get()-> headers($this-> mod_message_confirm_header)) return false;
        
        // если соль совпала возвращаем true
		return $hash === $this-> mod_message_confirm_hash;
        
    }

    
}