import "dotenv/config";
import { Config } from "../interfaces/Config";

let config: Config;

try {
  config = require("../config.json");
} catch (error) {
  config = {
    BOT_TOKEN: process.env.DISCORD_BOT_TOKEN || '',
    BOT_CLIENT_ID: process.env.DISCORD_BOT_CLIENT_ID || '',
    API_URL: process.env.API_URL || '',
    API_PORT: process.env.API_PORT || '8080',
    BFF_SERVER_PORT: process.env.BFF_SERVER_PORT || '8020',
  };
}

export { config };