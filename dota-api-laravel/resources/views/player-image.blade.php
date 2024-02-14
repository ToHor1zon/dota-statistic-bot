<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      font-size: 20px;
      width: 915px;
      margin: 0;
      background-color: transparent;
      color: #f2f2f2;
    }

    .page__wrapper {
      padding: 10px;
      row-gap: 8px;
      background-color: #202225;
      border-radius: 8px;
      display: flex;
      column-gap: 12px;
    }

    .body {
      display: flex;
      column-gap: 12px;
    }

    .main {
      flex-grow: 1;
    }

    .section {
      border-radius: 8px;
      background-color: #202225;
      padding: 20px;
    }

    .match__hero {
      height: 120px;
      border-radius: 8px;
    }

    .hero-img {
      position: relative;
      margin-bottom: 7px;
    }

    .hero-img__item {
      border-radius: 8px;
      height: 152px;
    }

    .hero-info {
      position: absolute;
      width: 100.1%;
      bottom: -7px;
      left: 0;
      padding: 6px;
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      box-sizing: border-box;
      background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #202225 70%);
      border-radius: 0 0 6px 6px;
      height: 60px;
    }

    .hero-info__level {
      border: 2px solid #ffffff;
      border-radius: 50%;
      padding: 5px;
      width: 22px;
      height: 22px;
      display: flex;
      justify-content: center;
      font-weight: 800;
      padding-right: 6px;
    }

    .hero-main {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      column-gap: 5px;
    }

    .hero-main__name {
      font-weight: 500;
    }

    .hero-main__position {
      font-size: 12px;
    }

    .header {
      display: flex;
      align-items: center;
      column-gap: 12px;
      margin-bottom: 6px;
    }

    .header__account-name {
      margin: 0;
      font-weight: 500;
      font-size: 24px;
    }

    .header-rank {
      width: 40px;
      height: 40px;
      position: relative;
    }

    .header-rank__medal,
    .header-rank__stars {
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
    }

    .header-result {
      margin-left: auto;
      display: flex;
      align-items: center;
      column-gap: 12px;
    }

    .header-result-item {
      font-weight: 500;
      letter-spacing: 0.03em;
    }

    .header-result-item--win {
      color: rgb(58, 182, 107);
    }

    .header-result-item--lose {
      color: rgb(214, 91, 46);
    }

    .header-result-team-icon {
      width: 34px;
      border-radius: 4px;
    }

    .hero-main {
      display: flex;
      column-gap: 12px;
    }

    .hero-stats {
      display: grid;
      grid-template-columns: 120px 130px 120px;
      grid-template-rows: 1fr 1fr;
      justify-content: space-between;
      flex-grow: 1;
      gap: 10px;
    }

    .hero-stats-item {
      display: grid;
      grid-template-columns: 1fr;
      grid-template-rows: 26px;
      flex-grow: 1;
    }

    .hero-stats-item--hero-damage {
      width: 130px
    }

    .hero-stats-item--2-columns {
      display: grid;
      grid-template-columns: 40px 16px 40px;
      grid-template-rows: repeat(2, 1fr);
    }

    .hero-stats-item--3-columns {
      display: grid;
      grid-template-columns: 25px 16px 25px 16px 25px;
      grid-template-rows: repeat(2, 1fr);
    }

    .hero-lane-result--win {
      color: rgb(58, 182, 107);
    }

    .hero-lane-result--lose {
      color: rgb(214, 91, 46);
    }

    .hero-stats-item>span {
      text-align: center;
    }

    .hero-stats-item--net-worth>.networth-gold-image {
      display: flex;
      justify-content: center;
      column-gap: 6px;
      align-items: center;
    }

    .hero-stats-item--lh-dh {
      grid-template-columns: 40px 16px 30px;
      justify-content: center;
    }

    .hero-stats-item--gpm-xpm {
      justify-content: flex-end;
      grid-template-columns: 50px 16px 50px;
    }

    .hero-stats-item--net-worth>.hero-stats-item--value {
      justify-content: center;
      display: flex;
      column-gap: 5px;
    }

    .hero-stats-item--alias {
      color: #ffffff70;
    }

    .items-normal {
      display: grid;
      grid-template-columns: 54px 54px 54px;
      grid-template-rows: 38px 38px;
      gap: 6px;
    }

    .items-normal__elem {
      width: 100%;
      height: 100%;
      background-size: cover;
      border-radius: 4px;
    }

    .item--empty {
      background-color: #36393F;
      box-shadow: 0px 0px 10px 3px rgb(0 0 0 / 60%) inset;
      border-radius: 4px;
    }

    .items-footer {
      display: flex;
      align-items: center;
    }

    .items-backpack {
      display: flex;
      column-gap: 6px;
    }

    .items-backpack__elem {
      width: 42px;
      height: 30px;
      background-size: cover;
      border-radius: 4px;
    }

    .items-neutral {
      width: 30px;
      height: 30px;
      border-radius: 4px;
      background-size: cover;
      background-position: center;
    }

    .items-footer {
      column-gap: 6px;
      margin-top: 6px;
    }

    .networth-gold-image {
      width: 15px;
      height: 24px;
    }

    .networth-value {
      color: rgb(203, 176, 42);
      line-height: 24px;
    }

    .hero-stats-item--value {
      font-weight: 500;
      letter-spacing: 0.042em;
    }
  </style>
  <title>{{ $player->hero_display_name }}</title>
</head>

<body>
  <div class="page__wrapper">
    <div class="hero">
      <div class="hero-img">
        <img class="hero-img__item"
          src="https://cdn.dota2.com/apps/dota2/images/heroes/{{ $player->hero_short_name }}_full.png"
          alt="{{ $player->hero_display_name }}"
        >
        <div class="hero-info">
          <div class="hero-main">
            <span class="hero-main__name">{{ $player->hero_display_name }}</span>
            <span class="hero-main__position">{{ $player->position_name }}</span>
          </div>
          <span class="hero-info__level">{{ $player->level }}</span>
        </div>
      </div>
    </div>
    <main class="main">
      <header class="header">
        {{-- <div class="header-rank">
          <img class="header-rank__medal"
            src="https://cdn.stratz.com/images/dota2/seasonal_rank/medal_{{ substr($player->steamAccount->rank, 0, 1) }}.png" alt="">
          <img class="header-rank__stars"
            src="https://cdn.stratz.com/images/dota2/seasonal_rank/star_{{ substr($player->steamAccount->rank, 1, 2) }}.png" alt="">
        </div> --}}
        <h1 class="header__account-name">
          {{ $player->steamAccount->name }}
        </h1>

        <div class="header-result">
          <span class="header-result-item @if($player->is_victory) header-result-item--win @else header-result-item--lose @endif">
            @if($player->is_victory) Win @else Lost @endif
          </span>
          <img class="header-result-team-icon"
            @if($player->is_radiant)
            src="https://cdn.stratz.com/images/dota2/radiant_square.png"
            @else
            src="https://cdn.stratz.com/images/dota2/dire_square.png"
            @endif
            alt="radiant">
        </div>
      </header>

      <div class="body">
        <div class="hero-stats">
          <div class="hero-stats-item hero-stats-item--3-columns">
            <span class="hero-stats-item--alias">K</span>
            <span class="hero-stats-item--divider hero-stats-item--alias">/</span>
            <span class="hero-stats-item--alias">D</span>
            <span class="hero-stats-item--divider hero-stats-item--alias">/</span>
            <span class="hero-stats-item--alias">A</span>
            <span class="hero-stats-item--value">{{ $player->kills }}</span>
            <span class="hero-stats-item--divider hero-stats-item--alias">/</span>
            <span class="hero-stats-item--value">{{ $player->deaths }}</span>
            <span class="hero-stats-item--divider hero-stats-item--alias">/</span>
            <span class="hero-stats-item--value">{{ $player->assists }}</span>
          </div>
          <div class="hero-stats-item hero-stats-item--lh-dh hero-stats-item--2-columns">
            <span class="hero-stats-item--alias">LH</span>
            <span class="hero-stats-item--divider hero-stats-item--alias">/</span>
            <span class="hero-stats-item--alias">DH</span>
            <span class="hero-stats-item--value">{{ $player->num_last_hits }}</span>
            <span class="hero-stats-item--divider hero-stats-item--alias">/</span>
            <span class="hero-stats-item--value">{{ $player->num_denies }}</span>
          </div>
          <div class="hero-stats-item hero-stats-item--gpm-xpm hero-stats-item--2-columns">
            <span class="hero-stats-item--alias">GPM</span>
            <span class="hero-stats-item--divider hero-stats-item--alias">/</span>
            <span class="hero-stats-item--alias">XPM</span>
            <span class="hero-stats-item--value">{{ $player->gold_per_minute }}</span>
            <span class="hero-stats-item--divider hero-stats-item--alias">/</span>
            <span class="hero-stats-item--value">{{ $player->experience_per_minute }}</span>
          </div>
          {{-- <div class="hero-stats-item hero-stats-item--lane-result">
            <span class="hero-stats-item--alias">{{ $player->lane_name }}</span>
            <span
              class="
                hero-stats-item--value
                {{@if laneResult.isWin}}
                  hero-lane-result--win
                {{else if laneResult.isLose}}
                  hero-lane-result--lose
                {{/if}}
              ">
                {{ laneResult.result }}
            </span>
          </div> --}}
          <div class="hero-stats-item hero-stats-item--hero-damage">
            <span class="hero-stats-item--alias">Hero Damage</span>
            <span class="hero-stats-item--value">{{ $player->hero_damage }}</span>
          </div>
          <div class="hero-stats-item hero-stats-item--net-worth hero-stats-item--net-worth">
            <span class="hero-stats-item--alias">Net Worth</span>
            <span class="hero-stats-item--value">
              <svg class="networth-gold-image" style="color: rgb(203, 176, 42)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M512 80C512 98.01 497.7 114.6 473.6 128C444.5 144.1 401.2 155.5 351.3 158.9C347.7 157.2 343.9 155.5 340.1 153.9C300.6 137.4 248.2 128 192 128C183.7 128 175.6 128.2 167.5 128.6L166.4 128C142.3 114.6 128 98.01 128 80C128 35.82 213.1 0 320 0C426 0 512 35.82 512 80V80zM160.7 161.1C170.9 160.4 181.3 160 192 160C254.2 160 309.4 172.3 344.5 191.4C369.3 204.9 384 221.7 384 240C384 243.1 383.3 247.9 381.9 251.7C377.3 264.9 364.1 277 346.9 287.3C346.9 287.3 346.9 287.3 346.9 287.3C346.8 287.3 346.6 287.4 346.5 287.5L346.5 287.5C346.2 287.7 345.9 287.8 345.6 288C310.6 307.4 254.8 320 192 320C132.4 320 79.06 308.7 43.84 290.9C41.97 289.9 40.15 288.1 38.39 288C14.28 274.6 0 258 0 240C0 205.2 53.43 175.5 128 164.6C138.5 163 149.4 161.8 160.7 161.1L160.7 161.1zM391.9 186.6C420.2 182.2 446.1 175.2 468.1 166.1C484.4 159.3 499.5 150.9 512 140.6V176C512 195.3 495.5 213.1 468.2 226.9C453.5 234.3 435.8 240.5 415.8 245.3C415.9 243.6 416 241.8 416 240C416 218.1 405.4 200.1 391.9 186.6V186.6zM384 336C384 354 369.7 370.6 345.6 384C343.8 384.1 342 385.9 340.2 386.9C304.9 404.7 251.6 416 192 416C129.2 416 73.42 403.4 38.39 384C14.28 370.6 .0003 354 .0003 336V300.6C12.45 310.9 27.62 319.3 43.93 326.1C83.44 342.6 135.8 352 192 352C248.2 352 300.6 342.6 340.1 326.1C347.9 322.9 355.4 319.2 362.5 315.2C368.6 311.8 374.3 308 379.7 304C381.2 302.9 382.6 301.7 384 300.6L384 336zM416 278.1C434.1 273.1 452.5 268.6 468.1 262.1C484.4 255.3 499.5 246.9 512 236.6V272C512 282.5 507 293 497.1 302.9C480.8 319.2 452.1 332.6 415.8 341.3C415.9 339.6 416 337.8 416 336V278.1zM192 448C248.2 448 300.6 438.6 340.1 422.1C356.4 415.3 371.5 406.9 384 396.6V432C384 476.2 298 512 192 512C85.96 512 .0003 476.2 .0003 432V396.6C12.45 406.9 27.62 415.3 43.93 422.1C83.44 438.6 135.8 448 192 448z" fill="rgb(203, 176, 42)"></path></svg>
              <span class="networth-value">{{ $player->networth }}</span>
            </span>
          </div>
        </div>
        <div class="items">
          <div class="items-normal">
            <div class="@if($items['item_0_img']) items-normal__elem @else item--empty @endif"
              style="background-image: url('{{ $items['item_0_img'] }}')"></div>
            <div class="@if($items['item_1_img']) items-normal__elem @else item--empty @endif"
              style="background-image: url('{{ $items['item_1_img'] }}')"></div>
            <div class="@if($items['item_2_img']) items-normal__elem @else item--empty @endif"
              style="background-image: url('{{ $items['item_2_img'] }}')"></div>
            <div class="@if($items['item_3_img']) items-normal__elem @else item--empty @endif"
              style="background-image: url('{{ $items['item_3_img'] }}')"></div>
            <div class="@if($items['item_4_img']) items-normal__elem @else item--empty @endif"
              style="background-image: url('{{ $items['item_4_img'] }}')"></div>
            <div class="@if($items['item_5_img']) items-normal__elem @else item--empty @endif"
              style="background-image: url('{{ $items['item_5_img'] }}')"></div>
          </div>
          <div class="items-footer">
            <div class="items-backpack">
              <div class="items-backpack__elem @if($items['backpack_0_img']) @else item--empty @endif"
                style="background-image: url('{{ $items['backpack_0_img'] }}')"></div>
              <div class="items-backpack__elem @if($items['backpack_1_img']) @else item--empty @endif"
                style="background-image: url('{{ $items['backpack_1_img'] }}')"></div>
              <div class="items-backpack__elem @if($items['backpack_2_img']) @else item--empty @endif"
                style="background-image: url('{{ $items['backpack_2_img'] }}')"></div>
            </div>
            <div class="@if($items['neutral_0_img']) items-neutral @else item--empty @endif"
              style="background-image: url('{{ $items['neutral_0_img'] }}')"></div>
          </div>
        </div>
      </div>
    </main>

  </div>
</body>

</html>
