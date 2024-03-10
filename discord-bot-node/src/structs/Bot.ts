import {
  ActivityType,
  ApplicationCommandDataResolvable,
  ChatInputCommandInteraction,
  Client,
  Collection,
  Events,
  Interaction,
  REST,
  Routes,
  Snowflake,
  TextChannel,
  AttachmentBuilder,
  BufferResolvable 
} from "discord.js";

import { config } from '../utils/config';
import { Command } from "../interfaces/Command";
import { Logger } from "../utils/logger";
import BFFServer from "../BFFServer";

import localCommands from '../commands'
import { PermissionResult, checkPermissions } from "../utils/checkPermission";

export class Bot {
  public readonly prefix = `/`;

  public slashCommands = new Array<ApplicationCommandDataResolvable>();
  public slashCommandsMap = new Collection<string, Command>();

  private readonly logger = new Logger(this.constructor.name);

  public constructor(public readonly client: Client) {
    this.client.login(config.BOT_TOKEN);

    this.client.on("ready", () => {
      this.logger.log(`${this.client.user!.username} ready!`);
      this.registerSlashCommands();
    });

    this.client.on("warn", (info) => this.logger.log(info));
    this.client.on("error", this.logger.error);

    this.registerBFFServer();
    this.onInteractionCreate();
  }

  private async registerSlashCommands() {
    const rest = new REST({ version: "9" }).setToken(config.BOT_TOKEN);

    for (const command of localCommands) {
      this.slashCommands.push(command.data);
      this.slashCommandsMap.set(command.data.name, command);
    }

    await rest.put(Routes.applicationCommands(this.client.user!.id), { body: this.slashCommands });
  }

  private async registerBFFServer() {
    await BFFServer(this.client, this)
    this.logger.log('BFF Server ready!');
  }

  public async sendImage(discordChannelId: string, file: BufferResolvable, fileName: string) {
    const channel = this.client.channels.cache.get(discordChannelId) as TextChannel;;

    if (!channel) return console.error('Invalid channel ID.');

    channel.send({
      files: [{
        attachment: file,
        name: fileName,
      }]
    })
  }

  private async onInteractionCreate() {
    this.client.on(Events.InteractionCreate, async (interaction: Interaction): Promise<any> => {
      if (!interaction.isChatInputCommand()) return;

      const command = this.slashCommandsMap.get(interaction.commandName);

      if (!command) return;

      try {
        const permissionsCheck: PermissionResult = await checkPermissions(command, interaction);

        if (permissionsCheck.result) {
          this.logger.log(`Command "${command.data.name}" is used by ${interaction.user.username}`);
          command.execute(interaction as ChatInputCommandInteraction);
        } else {
          console.log('Ошибка полномочий')
          // throw new MissingPermissionsException(permissionsCheck.missing);
        }
      } catch (error: any) {
        this.logger.error(error);

        if (error.message.includes("permissions")) {
          interaction.reply({ content: error.toString(), ephemeral: true }).catch(this.logger.error);
        } else {
          interaction.reply({ content: 'Ошибка полномочий', ephemeral: true }).catch(this.logger.error);
        }
      }
    });
  }
}