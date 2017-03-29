<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/', function () use ($app) {
    $players = [
        ['pseudo' => 'Joe',   'fullname' => 'Joe la frite',             'gender' => 'M', 'points' => 2500],
        ['pseudo' => 'Moe',   'fullname' => 'Moe, from the bar!',       'gender' => 'M', 'points' => 1230],
        ['pseudo' => 'Alice', 'fullname' => 'Alice, from... you know.', 'gender' => 'F', 'points' => 9001],
    ];

    var_dump('All players: ');
    var_dump($players);

    var_dump('All female players: ');
    $femalePlayers = $app['rulerz']->filter($players, 'gender = "F"');
    var_dump(iterator_to_array($femalePlayers));

    return '';
})
->bind('homepage');
