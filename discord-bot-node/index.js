const { Client, Collection, GatewayIntentBits  } = require('discord.js');

const client = new Client({ intents: [GatewayIntentBits.Guilds] });

require('dotenv').config();
console.log(123);

const { DISCORD_BOT_TOKEN } = process.env;


client.login(DISCORD_BOT_TOKEN);