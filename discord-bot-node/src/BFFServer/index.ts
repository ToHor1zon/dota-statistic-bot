import express from 'express'
import { Client } from 'discord.js'
import multer from 'multer'
import { Bot } from '../structs/Bot'

export default async (discordClient: Client, botInstance: Bot) => {
    const app = express()
    const upload = multer();
    const port = 8989

    app.post('/send-image', upload.single('image'), async (req: express.Request, res: express.Response) => {
        const file = req.file

        if (file) {
            const [serverId, channelId, matchId] = file.originalname.split('_')
            const buffer = file.buffer

            botInstance.sendImage(channelId, buffer, file.originalname)
        }

        res.sendStatus(200)
    })

    app.listen(port, () => {
        console.log(`Example app listening on port ${port}`)
    })
}