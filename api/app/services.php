<?php

$app['game_repository'] = function () {
    return new \Application\Repository\FileBasedGameRepository(
        realpath(__DIR__ . '/../var/storage')
    );
};
