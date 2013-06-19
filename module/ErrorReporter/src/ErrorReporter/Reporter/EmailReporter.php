<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 17:51
 */

namespace ErrorReporter\Reporter;


use Zend\Mail\Message;
use Zend\Mail\Transport\TransportInterface;
use Zend\Mime\Mime;
use Zend\View\Renderer\PhpRenderer;

class EmailReporter implements ReporterInterface
{

    /**
     * @var array
     */
    private $from;
    /**
     * @var array
     */
    private $to = array();
    /**
     * @var string
     */
    private $subject;
    /**
     * @var string
     */
    private $template;
    /**
     * @var TransportInterface
     */
    private $transport;
    /**
     * @var PhpRenderer
     */
    private $renderer;

    /**
     * @param TransportInterface $transport
     * @param PhpRenderer $renderer
     * @param string $template
     */
    public function __construct(TransportInterface $transport, PhpRenderer $renderer, $template)
    {
        $this->transport = $transport;
        $this->renderer = $renderer;
        $this->template = $template;
    }

    /**
     * @param array $config
     */
    public function initFromConfig(array $config)
    {
        if (isset($config['from'])) {
            $this->setFrom($config['from']['email'], $config['from']['name']);
        }

        if (isset($config['to'])) {
            foreach ($config['to'] as $to) {
                $this->addTo($to['email'], $to['name']);
            }
        }

        if (isset($config['subject'])) {
            $this->setSubject($config['subject']);
        }
    }

    /**
     * @param string $email
     * @param string $name
     */
    public function addTo($email, $name)
    {
        $this->to[] = array('email' => $email, 'name' => $name);
    }

    /**
     * @return array
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $email
     * @param string $name
     */
    public function setFrom($email, $name)
    {
        $this->from = array('email' => $email, 'name' => $name);
    }

    /**
     * @return array
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param \Exception[] $errors
     */
    public function report(array $errors)
    {
        $message = $this->getMessage($errors);
        $this->transport->send($message);
    }

    /**
     * @param array $errors
     * @return Message
     */
    public function getMessage(array $errors)
    {

        $message = $this->getNewMessage();
        $message->setSubject($this->subject);

        if (isset($this->from)) {
            $message->setFrom($this->from['email'], $this->from['name']);
        }

        foreach ($this->to as $to) {
            $message->addTo($to['email'], $to['name']);
        }
        $message->setBody($this->getMessageBody($errors));
        $message->setEncoding("UTF-8");

        return $message;
    }

    /**
     * @return Message
     */
    public function getNewMessage()
    {
        return new Message();
    }

    public function getMessageBody(array $errors)
    {
        $variables = $this->getMessageVariables($errors);
        $html = $this->getEmailBodyHtml($variables);
        $body = $this->getMimeMessage($html);
        return $body;
    }

    public function getMessageVariables(array $errors)
    {
        /*
        $serverUrlHelper = $this->serviceLocator->get('ViewHelperManager')->get('ServerUrl');

        $variables = array(
            'errors' => $errors,
            'meta' => new Parameters(array(
                    'ip' => $this->getClientIp(),
                    'userAgent' => (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : null,
                    'url' => $serverUrlHelper(true), //$_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . $_SERVER['PHP_SELF'],
                    'postData' => $_POST,
                    'getData' => $_GET,
                    'sessionData' => isset($_SESSION) ? $_SESSION : array(),
                    'referer' => (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : null,
                    'requestTime' => new \DateTime(),
                    'requestDuration' => microtime(true) - REQUEST_MICROTIME,
                )
            )
        );

        return $variables;*/
        return array();
    }

    public function getEmailBodyHtml(array $variables)
    {
        /* @var PhpRenderer $phpRenderer */
        /*$phpRenderer = $this->serviceLocator->get('Zend\View\Renderer\PhpRenderer');

        $mailView = new ViewModel();
        $mailView->setTemplate($this->config['template']);
        $mailView->setVariables($variables);
        return $phpRenderer->render($mailView);*/
        return '';
    }

    public function getMimeMessage($html)
    {
        /*$html = new Part($html);
        $html->type = Mime::TYPE_HTML;
        $html->charset = 'utf-8';
        $parts[] = $html;

        $body = new MimeMessage();
        $body->setParts($parts);

        return $body;*/
        return null;
    }

    public function getClientIp()
    {
        /*if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = 'unknown';
        }
        return $ip;*/
        return '';
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

}