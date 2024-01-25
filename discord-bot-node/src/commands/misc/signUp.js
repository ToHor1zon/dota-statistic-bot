const {
  ApplicationCommandOptionType,
  PermissionFlagsBits,
} = require('discord.js');

module.exports = {
  name: 'sign-up',
  description: 'Registering new user and steam account',
  // devOnly: Boolean,
  // testOnly: Boolean,
  options: [
    {
      name: 'steam-account-id',
      description: 'Your steam account id',
      required: true,
      type: ApplicationCommandOptionType.String,
    },
  ],

  callback: async (client, interaction) => {
    try {
      const url = 'http://nginx:80/api/sign-up'
      const body = {
        "discordUserName": interaction.user.username,
        "discordUserId": interaction.user.id,
        "steamAccountId": interaction.options.getString('steam-account-id')
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
console.log(result.message);
      await interaction.editReply(result.message);
    } catch(e) {
      console.log(e)
    }
  },
};