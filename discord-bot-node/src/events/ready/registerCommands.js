const getLocalCommands = require('../../utils/getLocalCommands');
const localCommands = getLocalCommands();

module.exports = async (client) => {
    try {
        await client.application.commands.set(localCommands);
        console.log('----------');
        console.log('Global commands successfully registered!');
        console.log('Command list:');
        console.log(localCommands.map((command, index) => `${++index}. /${command.name}`).join(';\n'));
        console.log('----------');

    } catch (error) {
        console.error(error);
    }
}
