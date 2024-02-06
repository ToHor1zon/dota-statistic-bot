require('dotenv').config();

const { Client, IntentsBitField } = require('discord.js');
const eventHandler = require('./src/handlers/eventHandler');

const client = new Client({
  intents: [
    IntentsBitField.Flags.Guilds,
    IntentsBitField.Flags.GuildMembers,
    IntentsBitField.Flags.GuildMessages,
    IntentsBitField.Flags.MessageContent,
  ],
});

eventHandler(client);


client.login(process.env.DISCORD_BOT_TOKEN);