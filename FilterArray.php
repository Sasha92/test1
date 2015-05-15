<?php

class FilterArray
{

    public $arr;
    public $result = [];
    private $compare = [];
    private $data = '';

    public function __construct($arr)
    {
        if (!is_array($arr)) {
            throw new \Exception ("Value isn't array");
        }
        $this->arr = $arr;
    }

    public function filter()
    {
        foreach ($this->arr as $val) {
            foreach ($val as $key => $val2) {
                $this->data .= $val[$key];
            }
            if (!in_array($this->data, $this->compare)) {
                array_push($this->compare, $this->data);
                array_push($this->result, $val);
            }
            $this->data = '';
        }
        return $this->result;

    }

}
