import { SlashCommandBuilder, ChatInputApplicationCommandData, ChatInputCommandInteraction } from 'discord.js'
import { Command } from '../interfaces/Command';
import { config } from '../utils/config'

export default {
  data: new SlashCommandBuilder()
    .setName('sign-up')
    .setDescription('Initalizing the bot in the selected channel')
    .addStringOption((option) => option.setName('steam-account-id').setDescription('Your steam account id').setRequired(true)),
  async execute(interaction: ChatInputCommandInteraction, input: string) {
    try {
      const url = `http://${config.API_URL}:${config.API_PORT}/api/commands/sign-up`
      const body = {
        "discordUserName": interaction.user.username,
        "discordUserId": interaction.user.id,
        "discordServerId": interaction.guild?.id,
        "steamAccountId": interaction.options.getString('steam-account-id'),
      }
      await interaction.deferReply({ ephemeral: true });

      const res = await fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(body),
      })

      const result = await res.json()

      await interaction.editReply(result.message);
    } catch(e) {
      console.log(e)
    }
  },
} as Command;