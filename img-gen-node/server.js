
const express = require('express');
const puppeteer = require('puppeteer');
const bodyParser = require('body-parser');

require('dotenv').config()

const app = express();

const port = process.env.IMG_GEN_SERVER_PORT

app.use(bodyParser.json({ limit: '50mb' }));

app.post('/generate-image', async (req, res) => {
    console.log('Start generation:')

    const reqPayload = req.body.original
    const keys = Object.keys(req.body.original)

    keys.forEach(async (key) => {
        try {
            const [ discordServerId, discordChannelId ] = key.split('_');
            console.log(`for serverId: ${discordServerId} and channelId ${discordChannelId}`)

            const data = reqPayload[key]

            const matchId = data.match.id

            const fileName = `${discordServerId}_${discordChannelId}_${matchId}.png`

            const dataHtml = data.html

            const browser = await puppeteer.launch({
                headless: true,
                executablePath: '/usr/bin/google-chrome',
                // executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome',
                args: [
                    "--no-sandbox",
                    "--disable-gpu",
                ]
            });

            const width = data.size.width
            const height = data.size.height
        
            const page = await browser.newPage();
            await page.addStyleTag({ url: 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap' });
            await page.setViewport({ width, height });
            await page.setContent(dataHtml);
            const imageBuffer = await page.screenshot({ omitBackground: true, clip: { x: 0, y: 0, width, height }});
            await browser.close();

            const imageBlob = new Blob([imageBuffer])
            const formData = new FormData();
            formData.append('image', imageBlob, fileName);

            await fetch(`http://${process.env.BOT_API_URL}:${process.env.BOT_API_PORT}/send-image`, {
                method: 'POST',
                body: formData,
            })
            console.log(`Screenshot ${fileName} taken`);
        } catch (e) {
            console.log(e)
            return res.sendStatus(404)
        }
    })
    
    res.sendStatus(200)
});

app.listen(port, () => {
    console.log(`Listening on port ${port}`);
});