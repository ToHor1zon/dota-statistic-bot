@foreach ($players as $player)
    <div class="player__wrapper">
        <div class="hero">
            <div class="hero-img">
                <img class="hero-img__item"
                    src="https://cdn.stratz.com/images/dota2/heroes/{{ $player->hero_short_name }}_horz.png"
                    alt="{{ $player->hero_display_name }}">
                <div class="hero-info">
                    <div class="hero-main">
                        <span class="hero-main__name">{{ $player->hero_display_name }}</span>
                        <span class="hero-main__position">{{ $player->position_name }}</span>
                    </div>
                    <span class="hero-info__level">{{ $player->level }}</span>
                </div>
            </div>
        </div>
        <div class="player__main">
            <header class="player-header">
                {{-- <div class="player-header-rank">
                    <img class="player-header-rank__medal"
                        src="https://cdn.stratz.com/images/dota2/seasonal_rank/medal_{{ substr($player->steamAccount->rank, 0, 1) }}.png" alt="">
                    <img class="player-header-rank__stars"
                        src="https://cdn.stratz.com/images/dota2/seasonal_rank/star_{{ substr($player->steamAccount->rank, 1, 2) }}.png" alt="">
                </div> --}}
                <h1 class="player-header__account-name">
                    {{ $player->steamAccount->name }}
                </h1>

                <div class="player-header-result">
                    <span
                        class="player-header-result-item @if ($player->is_victory) header-result-item--win @else header-result-item--lose @endif">
                        @if ($player->is_victory)
                            Win
                        @else
                            Lost
                        @endif
                    </span>
                    <img class="player-header-result-team-icon"
                        @if ($player->is_radiant) src="https://cdn.stratz.com/images/dota2/radiant_square.png"
            @else
            src="https://cdn.stratz.com/images/dota2/dire_square.png" @endif
                        alt="radiant">
                </div>
            </header>

            <div class="player__info">
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
                    @if($player->outcomes)
                        <div class="hero-stats-item hero-stats-item--lane-result">
                            <span class="hero-stats-item--alias">{{ $player->lane_name }}</span>
                            <span
                                class="
                                    hero-stats-item--value
                                    @if ($player->outcomes['isWin'])
                                        hero-lane-result--win
                                    @else
                                        hero-lane-result--lose
                                    @endif
                                ">
                                {{ $player->outcomes['value'] }}
                            </span>
                        </div>
                    @endif
                    <div class="hero-stats-item hero-stats-item--hero-damage">
                        <span class="hero-stats-item--alias">Hero Damage</span>
                        <span
                            class="hero-stats-item--value">{{ number_format($player->hero_damage, 0, ',', ' ') }}</span>
                    </div>
                    <div class="hero-stats-item hero-stats-item--net-worth hero-stats-item--net-worth">
                        <span class="hero-stats-item--alias">Net Worth</span>
                        <span class="hero-stats-item--value">
                            <svg class="networth-gold-image" style="color: rgb(203, 176, 42)"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M512 80C512 98.01 497.7 114.6 473.6 128C444.5 144.1 401.2 155.5 351.3 158.9C347.7 157.2 343.9 155.5 340.1 153.9C300.6 137.4 248.2 128 192 128C183.7 128 175.6 128.2 167.5 128.6L166.4 128C142.3 114.6 128 98.01 128 80C128 35.82 213.1 0 320 0C426 0 512 35.82 512 80V80zM160.7 161.1C170.9 160.4 181.3 160 192 160C254.2 160 309.4 172.3 344.5 191.4C369.3 204.9 384 221.7 384 240C384 243.1 383.3 247.9 381.9 251.7C377.3 264.9 364.1 277 346.9 287.3C346.9 287.3 346.9 287.3 346.9 287.3C346.8 287.3 346.6 287.4 346.5 287.5L346.5 287.5C346.2 287.7 345.9 287.8 345.6 288C310.6 307.4 254.8 320 192 320C132.4 320 79.06 308.7 43.84 290.9C41.97 289.9 40.15 288.1 38.39 288C14.28 274.6 0 258 0 240C0 205.2 53.43 175.5 128 164.6C138.5 163 149.4 161.8 160.7 161.1L160.7 161.1zM391.9 186.6C420.2 182.2 446.1 175.2 468.1 166.1C484.4 159.3 499.5 150.9 512 140.6V176C512 195.3 495.5 213.1 468.2 226.9C453.5 234.3 435.8 240.5 415.8 245.3C415.9 243.6 416 241.8 416 240C416 218.1 405.4 200.1 391.9 186.6V186.6zM384 336C384 354 369.7 370.6 345.6 384C343.8 384.1 342 385.9 340.2 386.9C304.9 404.7 251.6 416 192 416C129.2 416 73.42 403.4 38.39 384C14.28 370.6 .0003 354 .0003 336V300.6C12.45 310.9 27.62 319.3 43.93 326.1C83.44 342.6 135.8 352 192 352C248.2 352 300.6 342.6 340.1 326.1C347.9 322.9 355.4 319.2 362.5 315.2C368.6 311.8 374.3 308 379.7 304C381.2 302.9 382.6 301.7 384 300.6L384 336zM416 278.1C434.1 273.1 452.5 268.6 468.1 262.1C484.4 255.3 499.5 246.9 512 236.6V272C512 282.5 507 293 497.1 302.9C480.8 319.2 452.1 332.6 415.8 341.3C415.9 339.6 416 337.8 416 336V278.1zM192 448C248.2 448 300.6 438.6 340.1 422.1C356.4 415.3 371.5 406.9 384 396.6V432C384 476.2 298 512 192 512C85.96 512 .0003 476.2 .0003 432V396.6C12.45 406.9 27.62 415.3 43.93 422.1C83.44 438.6 135.8 448 192 448z"
                                    fill="rgb(203, 176, 42)"></path>
                            </svg>
                            <span class="networth-value">{{ number_format($player->networth, 0, ',', ' ') }}</span>
                        </span>
                    </div>
                </div>
                <div class="items">
                    <div class="items-normal">
                        @foreach ($player['items'] as $key => $value)
                            @if (strstr($key, 'item'))
                                <div class="
                                        @if ($value) items-normal__elem
                                        @else item--empty @endif
                                    "
                                    style="background-image: url('{{ $value }}')"></div>
                            @endif
                        @endforeach
                    </div>

                    <div class="items-footer">
                        <div class="items-backpack">
                            @foreach ($player['items'] as $key => $value)
                                @if (strstr($key, 'backpack'))
                                    <div class="items-backpack__elem @if (!$value) item--empty @endif"
                                        style="background-image: url('{{ $value }}')"></div>
                                @endif
                            @endforeach
                        </div>
                        <div class="@if ($player['items']['neutral_0_img']) items-neutral @else item--empty @endif"
                            style="background-image: url('{{ $player['items']['neutral_0_img'] }}')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
