import { PermissionFlagsBits, Client, Interaction, ChatInputApplicationCommandData, ChatInputCommandInteraction, PermissionsBitField, SlashCommandBuilder, TextChannel } from 'discord.js'

import { config } from '../utils/config'
import { Command } from '../interfaces/Command';


export default {
  data: new SlashCommandBuilder()
    .setName("init")
    .setDescription("Initalizing the bot in the selected channel"),
  cooldown: 3,
  async execute(interaction: ChatInputCommandInteraction, input: string) {
    try {
      const url = `http://${config.API_URL}:${config.API_PORT}/api/commands/init`
      const body = {
        "discordServerId": interaction.guild?.id,
        "discordChannelId": interaction.channel?.id,
      }
      await interaction.deferReply({ ephemeral: true });

      const res = await fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(body),
      })

      const foo: any = await res.json()

      await interaction.editReply(foo.message);
    } catch(e) {
      console.log(e)
    }
  }
} as Command;