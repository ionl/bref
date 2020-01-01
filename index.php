<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';


/** Bref lambda function contains all context */
lambda(function (array $event, Context $context): string {
    $stderr = fopen('php://stderr', 'w');
    $write = json_encode([basename(__FILE__), '$event' => $event, '$context' => $context]) . "\n";
    fwrite($stderr, $write);
    return 'Hello ' . ($event['name'] ?? 'world');
});

/*
$callable = function ($event) {
    $stderr = fopen('php://stderr', 'w');
    fwrite($stderr, json_encode(['ionl'=> __FILE__,'$event'=>$event]));
    
    return 'Hello ' . ($event['name'] ?? 'world');
};

function lambda2 (callable $callable) {
    echo $callable(['name'=>'ionl', 'test']);
}

lambda2($callable);
 */