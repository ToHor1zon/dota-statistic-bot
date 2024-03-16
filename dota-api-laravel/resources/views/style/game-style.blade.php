<style>

.match {
    padding: 8px 8px 24px;
    grid-template-columns: 1fr 1fr;
    background-color: #202225;
    border-radius: 8px;
}

.main-title {
    display: block;
    width: fit-content;
    font-weight: 300;
    font-size: 34px;
    padding: 0 36px;
    background-color: #202225;
    border-radius: 8px 8px 0 0;
    margin: 0 auto;
}

.match-duration-time {
    align-self: flex-start;
    padding-top: 8px;
}

.game-header {
    margin-bottom: 24px;
}

.game-header-score {
    font-size: 48px;
    font-weight: 800;
}

.game-header-stats {
    display: flex;
    justify-content: center;
    align-items: center;
    column-gap: 24px;
}

.game-header-stats-result {
    font-size: 32px;
    font-weight: 600;

    display: flex;
    align-items: center;
    column-gap: 8px;
    padding: 6px;
    border-radius: 8px;
}

.game-header-stats-result--lose {
    opacity: 60%;
}

.game-header-stats-result--radiant {
    background-color: #317832;
}

.game-header-stats-result--dire {
    background-color: #9B2D30;
}

.game-header-result-team-icon {
    border-radius: 4px;
}

.game-header-stats-result__title {
    text-transform: uppercase;
}

.game-header-result-team-icon {
    width: 36px;
}

.main {
    display: flex;
    flex-direction: column;
    align-items: center;
    row-gap: 16px;
}

.radiant,
.dire {
    display: flex;
    justify-content: flex-start;
    column-gap: 8px;

    padding: 8px;
    padding-top: 18px;
    border-radius: 16px;
}

.radiant {
    background-color: #317832;
}

.dire {
    background-color: #9B2D30;
}

.radiant--lose .radiant-hero__image,
.dire--lose .dire-hero__image {
    opacity: 60%;
}

.radiant-hero,
.dire-hero {
    position: relative;
    height: 95px;
    width: 170px;
    border-radius: 8px;
}

.radiant-hero::after,
.dire-hero::after {
    position: absolute;
    display: inline-block;
    bottom: -16px;
    left: 50%;
    transform: translate(-50%);
    width: max-content;
    padding: 2px 12px;
    font-weight: 700;
    font-size: 16px;
    border-radius: 8px;
    border: 1px solid #ffffff;
}


.impact__bar {
    overflow: hidden;
    position: absolute;
    border-radius: 4px;
    width: 60px;
    height: 8px;
    background-color: hsl(0deg 0% 0% / 20%);
    top: -14px;
    left: 40%;
    transform: translateX(-50%);
    z-index: 1;
}

.impact__bar::after {
    content: '';
    top: 0;
    display: block;
    position: absolute;
    left: calc(50% - 1px);
    width: 2px;
    height: 8px;
    background: #fff;
}

.impact__value {
    position: absolute;
    top: 1px;
    height: 6px;
    max-width: 29px;
}

.impact__value--positive {
    background: linear-gradient(135deg, rgb(255 252 38), rgb(188 153 0), rgb(255 252 38));
    border-radius: 0 3px 3px 0;
}

.impact__value--negative {
    border-radius: 2px 0 0 2px;
    background-color: hsl(0deg 0% 100% / 30%);
}

.impact-value {
    position: absolute;
    top: -17px;
    left: 105px;
    z-index: 1;
    font-size: 14px;
    font-weight: bold;
}

.award--top-suport::after {
    content: 'TOP SUPPORT';
    background-color: #A35A00;
}

.award--top-core::after {
    content: 'TOP CORE';
    background-color: #296E6B;
}

.award--mvp::after {
    content: 'MVP';
    background-color: #800080;
}

.radiant-hero__image,
.dire-hero__image {
    width: 100%;
    height: 100%;
    border-radius: 8px;
}

.role-icons {
    display: flex;
    justify-content: center;
    column-gap: 8px;
}

.role-icons__item {
    display: flex;
    justify-content: center;
    width: 170px;
    height: 32px;
}
</style>
