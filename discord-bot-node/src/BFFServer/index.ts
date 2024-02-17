import express from 'express'
import { Client } from 'discord.js'

const app = express()
const port = 8989

export default async (discordClient: Client) => {
    app.post('/send-image', async (req:express.Request, res:express.Response) => {
        const payload = await req.body.json()
        console.log(payload);
        // discordClient.sendMessageLogic
        res.send(200)
    })

    app.listen(port, () => {
        console.log(`Example app listening on port ${port}`)
    })
}