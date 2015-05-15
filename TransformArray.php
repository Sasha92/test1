<?php


class TransformArray
{

    public $arr;
    public $result = [];

    public function __construct($arr)
    {
        if (!is_array($arr)) {
            throw new \Exception ("Value isn't array");
        }
        $this->arr = $arr;
    }

    public function transform()
    {
        foreach ($this->arr as $val) {
            $keys = array_keys($val);
            foreach ($keys as $valueKey) {
                if (!in_array($valueKey, array_keys($this->result))) {
                    $this->result[$valueKey] = [];
                }
                array_push($this->result[$valueKey], $val[$valueKey]);
            }

        }
        ksort($this->result);
        return $this->result;
    }
}
