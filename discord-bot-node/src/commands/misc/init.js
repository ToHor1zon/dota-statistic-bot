const {
  PermissionFlagsBits,
} = require('discord.js');

module.exports = {
  name: 'init',
  description: 'Initalizing the bot in the selected channel',
  permissions: [PermissionFlagsBits.Administrator],
  callback: async (client, interaction) => {
    try {
      const url = 'http://dsb_php:80/api/commands/init'
      const body = {
        "discordServerId": interaction.guild.id,
        "discordChannelId": interaction.channel.id,
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
};