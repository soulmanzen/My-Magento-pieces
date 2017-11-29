<?php

class  Stas_Facebookcomment_Model_System_Config_Orderby
{
    public function toOptionArray()
    {
        return [
            ['value' => 'social', 'label' => 'social'],
            ['value' => 'reverse_time', 'label' => 'reverse_time'],
            ['value' => 'time', 'label' => 'time'],
        ];
    }
}