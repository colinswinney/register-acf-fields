<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$example = new StoutLogic\AcfBuilder\FieldsBuilder('example', ['style' => 'seamless']);

$example
    ->addText('text', [
        'label' => 'Text',
    ])
    ->setLocation('post_type', '==', 'post');

return $example;