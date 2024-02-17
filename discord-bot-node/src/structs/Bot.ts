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
  Snowflake
} from "discord.js";
import { readdirSync } from "fs";
import { join } from "path";
import { config } from '../utils/config';
import { Command } from "../interfaces/Command";
import { Logger } from "../utils/logger";
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