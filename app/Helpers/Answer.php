<?php

namespace App\Helpers;
/**
 *
 */
class Answer
{
    /**
     * @var integer $code
     */
    private $code       = 200;

    /**
     * @var string $message
     */
    private $message    = '';

    /**
     * @var $entity
     */
    private $entity     = null;

    /**
     * @param \Exception $exception
     */
    public function setError(\Exception $exception)
    {
        $this->code     = $exception->getCode();
        $this->message  = $exception->getMessage();
    }

    /**
     * @param $entity
     */
    public function setSuccess($entity)
    {
        $this->entity   = $entity;
        $this->code     = 200;
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        return [
            'code'      => $this->code;
            'message'   => $this->message;
            'entity'    => $this->entity;
        ];
    }
}
