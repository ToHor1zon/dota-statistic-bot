<div class="match__wrapper">
    <h2 class="main-title">{{ $match->match_type }}</h2>
    <div class="match">
        <header class="game-header">
            <div class="game-header-stats">
                <div
                    class="game-header-stats-result game-header-stats-result--radiant @if ($match->did_radiant_win === 0) game-header-stats-result--lose @endif">
                    <span class="game-header-stats-result__title">
                        @if ($match->did_radiant_win === 1)
                            WIN
                        @else
                            LOSE
                        @endif
                    </span>
                    <img class="game-header-result-team-icon game-header-result-team-icon--radiant"
                        src="https://cdn.stratz.com/images/dota2/radiant_square.png" alt="radiant">
                </div>

                <span class="game-header-score">
                    {{ $match->radiant_kills_count }}
                </span>
                <span class="match-duration-time">
                    {{ $match->duration_formated }}
                </span>
                <span class="game-header-score">
                    {{ $match->dire_kills_count }}
                </span>

                <div
                    class="game-header-stats-result game-header-stats-result--dire @if ($match->did_radiant_win === 1) game-header-stats-result--lose @endif">
                    <img class="game-header-result-team-icon game-header-result-team-icon--dire"
                        src="https://cdn.stratz.com/images/dota2/dire_square.png" alt="dire">
                    <span class="game-header-stats-result__title">
                        @if ($match->did_radiant_win === 0)
                            WIN
                        @else
                            LOSE
                        @endif
                    </span>
                </div>
            </div>
        </header>
        <main class="main">
            <div class="radiant @if ($match->did_radiant_win === 0) radiant--lose @endif">
                @foreach ($players['radiant'] as $player)
                    <div
                        class="radiant-hero
                        @if ($player->award == 3)
                            award--top-suport
                        @elseif($player->award == 2)
                            award--top-core
                        @elseif($player->award == 1)
                            award--mvp @endif
                    ">
                        <img src="https://cdn.stratz.com/images/dota2/heroes/{{ $player->hero_short_name }}_horz.png"
                            class="radiant-hero__image">

                        <div class="impact__bar">
                            <div
                                class="impact__value @if ($player->imp > 0) impact__value--positive @else impact__value--negative @endif"
                                style="
                                    @if ($player->imp > 0)
                                        right: calc(50% - @if(abs($player->imp) >= 30) 29px @else {{abs($player->imp)}}px @endif);
                                    @else
                                        left: calc(50% - @if(abs($player->imp) >= 30) 29px @else {{abs($player->imp)}}px @endif);
                                    @endif
                                    width: {{ abs($player->imp) }}px;
                                "
                            >
                            </div>
                        </div>
                        <span class="impact-value">{{ $player->imp }}</span>

                    </div>
                @endforeach
            </div>

            <div class="role-icons">

                <div class="role-icons__item">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.792 16.244L.623 20.388a2.107 2.107 0 000 2.992h.002a2.136 2.136 0 003.01 0l4.167-4.142-3.01-2.994z"
                            fill="url(#hilt_134_dark)" fill-opacity="0.7"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.853 10.193c-.373.32-.597.78-.615 1.268-.018.49.17.964.517 1.309l8.53 8.478c.326.327.77.507 1.233.507a1.73 1.73 0 001.228-.51 1.717 1.717 0 00-.003-2.434c-.86-.855-1.857-1.843-1.857-1.843s8.881-7.06 10.836-8.612a1.18 1.18 0 00.43-.776c.17-1.423.668-5.646.845-7.124a.406.406 0 00-.119-.337.414.414 0 00-.34-.116l-6.767.843c-.304.038-.578.19-.77.427L7.134 12.245s-1.087-1.085-1.973-1.962a1.702 1.702 0 00-2.305-.09h-.003zm7.519 4.69l9.922-9.861a.79.79 0 10-1.124-1.116l-9.922 9.863a.782.782 0 000 1.114c.31.31.813.31 1.124 0z"
                            fill="url(#blade_134_dark)"></path>
                        <defs>
                            <linearGradient id="hilt_134_dark" x1="3" y1="18" x2="6"
                                y2="21.75" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#DDD"></stop>
                                <stop offset="1" stop-color="#838383"></stop>
                            </linearGradient>
                            <linearGradient id="blade_134_dark" x1="23.915" y1="9.91042e-8" x2="6.38719"
                                y2="17.6213" gradientUnits="userSpaceOnUse">
                                <stop stop-color="hsl(231,54%,59%)"></stop>
                                <stop offset="1" stop-color="hsl(230,43%,45%)"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="role-icons__item">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M19.262 3.015l-1.148-1.15A1.092 1.092 0 0118.884 0h4.025A1.092 1.092 0 0124 1.09v4.024a1.093 1.093 0 01-1.865.773l-1.152-1.15-1.05 1.051c3.603 4.439 3.448 10.915-.469 15.177l.763 1.271a.65.65 0 01-.165.857c-.31.234-.713.533-1.037.778a.636.636 0 01-.5.119.642.642 0 01-.432-.281c-.4-.598-1.016-1.52-1.376-2.063a1.206 1.206 0 00-.828-.522c-1.857-.26-8.092-1.13-10.479-1.462a1.26 1.26 0 01-1.07-1.073C3.957 15.857 2.877 8.11 2.877 8.11a1.197 1.197 0 00-.519-.825C1.81 6.92.89 6.305.291 5.907a.655.655 0 01-.162-.934c.245-.323.547-.726.778-1.034a.65.65 0 01.856-.167l1.271.762C6.731 1.141 12.088.571 16.34 2.827a.535.535 0 01.126.852L15.094 5.05a.538.538 0 01-.609.107 8.72 8.72 0 00-9.27 1.328l1.35 9.228L19.263 3.015zm-1.4 4.844l-9.576 9.578 9.227 1.347a8.723 8.723 0 00.35-10.925z"
                            fill="url(#bow_arrow_135_dark)"></path>
                        <defs>
                            <linearGradient id="bow_arrow_135_dark" x1="25.0809" y1="-6.25872e-7" x2="1.25351"
                                y2="22.5728" gradientUnits="userSpaceOnUse">
                                <stop stop-color="hsl(187,60%,40%)"></stop>
                                <stop offset="1" stop-color="hsl(188,48%,38%)"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="role-icons__item">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M.75 3.3C.75 1.892 1.84.75 3.187.75H20.81c1.347 0 2.441 1.142 2.441 2.55v7.52a8.265 8.265 0 01-.803 3.56C20.953 17.45 17.43 23.25 12 23.25c-5.432 0-8.957-5.8-10.444-8.878a8.259 8.259 0 01-.799-3.553A2510.5 2510.5 0 01.75 3.3zm14.198 2.2a.509.509 0 00-.014-.482.462.462 0 00-.4-.238h-2.48a.469.469 0 00-.41.25c-.558 1.048-2.711 5.076-3.464 6.484-.054.1-.05.223.004.324.058.1.162.162.274.162h2.196c.169 0 .324.094.414.245.086.151.09.338.01.497-.64 1.242-1.93 3.75-2.646 5.148a.16.16 0 00.044.198c.06.046.144.04.198-.018 1.67-1.815 5.673-6.156 7.095-7.697a.338.338 0 00.061-.357.31.31 0 00-.288-.198h-2.008a.477.477 0 01-.407-.24.514.514 0 01-.011-.49c.49-.958 1.343-2.634 1.832-3.588z"
                            fill="url(#shield_136_dark)"></path>
                        <defs>
                            <linearGradient id="shield_136_dark" x1="12" y1="0.75" x2="12"
                                y2="23.25" gradientUnits="userSpaceOnUse">
                                <stop stop-color="hsl(33,79%,46%)"></stop>
                                <stop offset="1" stop-color="hsl(34,82%,36%)"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="role-icons__item">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.442 18.141l2.167-1.25c.398-.23.898-.219 1.286.03l1.93 1.238a.373.373 0 01.005.63c-1.77 1.183-8 5.211-10.744 5.211-.926 0-7.725-2.034-7.725-2.034v-6.999h2.704c.881 0 1.741.265 2.46.755l1.635 1.117h3.671c.438 0 1.482 0 1.482 1.302 0 1.41-1.14 1.41-1.482 1.41h-5.395a.555.555 0 00-.565.543c0 .3.254.543.565.543h5.75s.82.004 1.473-.56c.414-.359.783-.944.783-1.936z"
                            fill="#DEDEDE"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.399 15.02c0-.583-.494-1.058-1.1-1.058h-2.2c-.606 0-1.099.475-1.099 1.059v6.998c0 .583.493 1.057 1.099 1.057h2.2c.606 0 1.1-.474 1.1-1.057v-6.998z"
                            fill="url(#wrist_137_dark)" fill-opacity="0.7"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M20.895 6.395a.32.32 0 00-.202-.246.336.336 0 00-.32.043c-.91.64-1.942.965-1.942.965.04-3.622-2.211-5.914-5.873-7.13a.51.51 0 00-.541.141.463.463 0 00-.065.537c.833 1.5 1.205 2.868 1.068 4.825 0 0-.924-.426-1.26-1.51a.314.314 0 00-.205-.21.344.344 0 00-.3.043c-3.528 2.588-2.893 10.11 4.131 10.11 5.095 0 5.928-4.594 5.51-7.568zm-5.31-.56a.14.14 0 00-.03-.152.149.149 0 00-.158-.03c-2.764 1.222-3.878 6.061-.325 6.061 3.384 0 2.143-3.47.852-4.149a.111.111 0 00-.116.01.108.108 0 00-.05.106c.065.512-.148.819-.686.779-.209-.812.152-1.83.513-2.624z"
                            fill="url(#flame_137_dark)"></path>
                        <defs>
                            <linearGradient id="wrist_137_dark" x1="2.19928" y1="13.9623" x2="2.19928"
                                y2="23.0759" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#DEDEDE"></stop>
                                <stop offset="1" stop-color="#7B7373"></stop>
                            </linearGradient>
                            <linearGradient id="flame_137_dark" x1="20.1087" y1="-1.17264e-7" x2="10.053"
                                y2="15.0821" gradientUnits="userSpaceOnUse">
                                <stop stop-color="hsl(29,76%,39%)"></stop>
                                <stop offset="1" stop-color="hsl(335,57.99999999999999%,51%)"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="role-icons__item">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.442 17.96l2.167-1.289a1.216 1.216 0 011.286.03l1.929 1.278a.392.392 0 01.005.65c-1.77 1.219-8 5.371-10.743 5.371-.926 0-7.725-2.097-7.725-2.097V14.69h2.704c.883 0 1.741.27 2.46.777l1.635 1.152h3.671c.44 0 1.484 0 1.484 1.342 0 1.453-1.143 1.453-1.484 1.453h-5.395a.564.564 0 00-.565.56c0 .308.254.558.565.558h5.75s.82.006 1.473-.578c.414-.368.783-.972.783-1.993z"
                            fill="#DEDEDE" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.399 14.667c0-.602-.494-1.09-1.1-1.09h-2.2c-.606 0-1.099.488-1.099 1.09v7.214c0 .602.493 1.09 1.099 1.09h2.2c.607 0 1.1-.488 1.1-1.09v-7.214z"
                            fill="url(#wrist_138_dark)" fill-opacity="0.7" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M23.594 10.114a.142.142 0 00.002-.274c-1.165-.402-2.238-1.461-2.635-2.62a.142.142 0 00-.274 0c-.39 1.16-1.443 2.247-2.6 2.63a.141.141 0 00-.003.273c1.158.402 2.21 1.465 2.603 2.617a.142.142 0 00.274 0c.397-1.162 1.468-2.232 2.633-2.626zm-7.54-3.583a.215.215 0 00.158-.208.214.214 0 00-.157-.209c-1.774-.615-3.408-2.227-4.013-3.994a.213.213 0 00-.21-.158.214.214 0 00-.207.16c-.597 1.767-2.2 3.423-3.963 4.005a.216.216 0 00-.004.417c1.765.612 3.369 2.232 3.966 3.988.027.094.111.16.209.16a.214.214 0 00.207-.16c.606-1.77 2.24-3.401 4.014-4.001zm4.87-4.187a.11.11 0 00.08-.106.112.112 0 00-.08-.108c-.91-.314-1.749-1.142-2.058-2.048A.113.113 0 0018.76 0a.113.113 0 00-.108.082c-.306.908-1.128 1.758-2.032 2.055a.11.11 0 00-.082.106.109.109 0 00.08.108c.905.314 1.728 1.145 2.034 2.047a.11.11 0 00.108.08c.05 0 .093-.032.106-.08.31-.91 1.148-1.745 2.058-2.054z"
                            fill="url(#sparks_138_dark)" />
                        <defs>
                            <linearGradient id="wrist_138_dark" x1="2.19928" y1="13.5766" x2="2.19928"
                                y2="22.9711" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#DEDEDE" />
                                <stop offset="1" stop-color="#7B7373" />
                            </linearGradient>
                            <linearGradient id="sparks_138_dark" x1="7.5" y1="0" x2="24"
                                y2="13.5" gradientUnits="userSpaceOnUse">
                                <stop stop-color="hsl(155,31%,48%)" />
                                <stop offset="1" stop-color="hsl(158,78%,28.000000000000004%)" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>

            <div class="dire @if ($match->did_radiant_win === 1) dire--lose @endif">
                @foreach ($players['dire'] as $player)
                    <div
                        class="dire-hero
                        @if ($player->award == 3)
                            award--top-suport
                        @elseif($player->award == 2)
                            award--top-core
                        @elseif($player->award == 1)
                            award--mvp @endif
                    ">
                        <img src="https://cdn.stratz.com/images/dota2/heroes/{{ $player->hero_short_name }}_horz.png"
                            class="dire-hero__image">

                        <div class="impact__bar">
                            <div
                                class="impact__value @if ($player->imp > 0) impact__value--positive @else impact__value--negative @endif"
                                style="
                                    @if ($player->imp > 0)
                                        right: calc(50% - @if(abs($player->imp) >= 30) 29px @else {{abs($player->imp)}}px @endif);
                                    @else
                                        left: calc(50% - @if(abs($player->imp) >= 30) 29px @else {{abs($player->imp)}}px @endif);
                                    @endif
                                    width: {{ abs($player->imp) }}px;
                                "
                            >
                            </div>
                        </div>
                        <span class="impact-value">{{ $player->imp }}</span>

                    </div>
                @endforeach
            </div>
        </main>
    </div>
</div>
