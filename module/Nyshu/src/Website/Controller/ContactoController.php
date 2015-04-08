<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Website\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Captcha\Dumb;
use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;

// Form //
use Website\Forms\ContactoForm;

// Filter //
use Website\Filters\ContactoFilter;

// Propel //
use BasePeer;
use Contact;

class ContactoController extends AbstractActionController
{

    private function sendMail($sMail,$sName,$sText){
        $mail=new Message();
        $mail->setEncoding("UTF-8");
        $mail->setFrom($sMail, $sName);
        $mail->setBody($sText);
        $mail->setSubject("Contacto desde formulario de sitio Nyshu.com");
        $mail->setTo("carlos.esparza.i@hotmail.com");

        $sender=new Sendmail();
        $sender->send($mail);

    }

    public function indexAction()
    {
        $send = false;
        $cpch=new Dumb();
        $cpch->setLabel('Ingresa la siguiente cadena de forma inversa:');
        $cpch->setWordlen(5);
        $cpch->setMessage('Ingresa el dato correcto de cadena mostrada de forma inversa, ej: cadena mostrada "h85d" dato correcto "d58h"');
        $contactForm = new ContactoForm($cpch);

        $request = $this->getRequest();
        if ($request->isPost()) {

            $contactForm = new ContactoForm($cpch);
            $contactFilter = new ContactoFilter();
            $contactForm->setInputFilter($contactFilter->getInputFilter());
            $contactForm->setData($request->getPost());

            if ($contactForm->isValid()) {

                $contactObject = new Contact();
                foreach($contactForm->getData() as $contactKey => $contactValue){
                    if($contactKey != 'idcontact' && $contactKey != 'validator' && $contactKey != 'submit'){
                        $contactObject->setByName($contactKey, $contactValue, BasePeer::TYPE_FIELDNAME);
                    }
                }
                $contactObject->save();

                $this->sendMail($contactForm->getInputFilter()->getValue('contact_email'), $contactForm->getInputFilter()->getValue('contact_name'), $contactForm->getInputFilter()->getValue('contact_message'));
                $contactForm->setData(array(
                    'contact_email'=>'',
                    'contact_name'=>'',
                    'contact_message'=>'',
                ));
                $send = true;
            }
        }

        return array(
            'contactForm' => $contactForm,
            'send' => $send,
        );
    }
}
