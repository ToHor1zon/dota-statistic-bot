<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <title>MatchInfo</title>
    @extends('style.main-style')
    @extends('style.game-style')
    @extends('style.player-style')
</head>

<div class="content__wrapper">
    @include('game-image', ['match' => $match, 'players' => $players])
    @include('players-image', ['players' => $players['detailPlayers']])
</div>

</body>
</html>
