<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 18:39
 */

namespace ErrorReporter\Reporter;


use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;

class DbReporter implements ReporterInterface
{

    /**
     * @var TableGateway
     */
    private $table;

    /**
     * @param TableGateway $table
     */
    public function __construct(TableGateway $table)
    {
        $this->table = $table;
    }

    /**
     * @param \Exception[] $errors
     */
    public function report(array $errors)
    {
        $inserts = array();
        foreach ($errors as $error) {
            $inserts = array_merge($inserts, $this->getExceptionDataArrayRec($error));
        }
        foreach ($inserts as $insert) {
            $this->table->insert($insert);
        }
    }

    public function getExceptionDataArrayRec(\Exception $e)
    {
        $data = array($this->getExceptionDataArray($e));;
        if ($e->getPrevious()) {
            $data = array_merge($data, $this->getExceptionDataArrayRec($e->getPrevious()));
        }
        return $data;
    }

    public function getExceptionDataArray(\Exception $e)
    {
        return array(
            'datetime' => date('Y-m-d H:i:s'),
            'class' => get_class($e),
            'message' => $e->getMessage(),
            'code' => $e->getCode(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString(),
        );
    }
}