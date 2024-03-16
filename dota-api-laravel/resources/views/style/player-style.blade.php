<style>
.player__wrapper {
    padding: 10px;
    row-gap: 8px;
    background-color: #202225;
    border-radius: 8px;
    display: flex;
    column-gap: 12px;
}

.player__info {    
    display: flex;
    justify-content: space-between;
    width: 100%;
    column-gap: 24px;
}

.section {
    border-radius: 8px;
    background-color: #202225;
    padding: 20px;
}

.player__main {
    width: 100%;
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

.player-header {
    display: flex;
    align-items: center;
    column-gap: 12px;
    margin-bottom: 6px;
}

.player-header__account-name {
    margin: 0;
    font-weight: 500;
    font-size: 24px;
}

.player-header-rank {
    width: 40px;
    height: 40px;
    position: relative;
}

.player-header-rank__medal,
.player-header-rank__stars {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}

.player-header-result {
    margin-left: auto;
    display: flex;
    align-items: center;
    column-gap: 12px;
}

.player-header-result-item {
    font-weight: 500;
    letter-spacing: 0.03em;
}

.player-header-result-item--win {
    color: rgb(58, 182, 107);
}

.player-header-result-item--lose {
    color: rgb(214, 91, 46);
}

.player-header-result-team-icon {
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
    text-transform: capitalize;
}
</style>