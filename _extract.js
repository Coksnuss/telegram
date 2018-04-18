// API 3.6
// Object.values(jQuery('#available-methods').parent().nextUntil('h3', 'h4').find('a').toArray().map(el => el.id));
const types = [
    // Getting updates
    'update', 'webhookinfo',
    // Available types
    'user', 'chat', 'message', 'messageentity', 'photosize', 'audio', 'document', 'video', 'voice', 'videonote',
    'contact', 'location', 'venue', 'userprofilephotos', 'file', 'replykeyboardmarkup', 'keyboardbutton',
    'replykeyboardremove', 'inlinekeyboardmarkup', 'inlinekeyboardbutton', 'callbackquery', 'forcereply', 'chatphoto',
    'chatmember', 'responseparameters', /*'inputmedia',*/ 'inputmediaphoto', 'inputmediavideo', /*'inputfile',
    'sending-files', 'inline-mode-objects',*/
    // Stickers
    'sticker', 'stickerset', 'maskposition',
    // Inline mode
    'inlinequery', /*'inlinequeryresult',*/ 'inlinequeryresultarticle', 'inlinequeryresultphoto',
    'inlinequeryresultgif', 'inlinequeryresultmpeg4gif', 'inlinequeryresultvideo', 'inlinequeryresultaudio',
    'inlinequeryresultvoice', 'inlinequeryresultdocument', 'inlinequeryresultlocation', 'inlinequeryresultvenue',
    'inlinequeryresultcontact', 'inlinequeryresultgame', 'inlinequeryresultcachedphoto', 'inlinequeryresultcachedgif',
    'inlinequeryresultcachedmpeg4gif', 'inlinequeryresultcachedsticker', 'inlinequeryresultcacheddocument',
    'inlinequeryresultcachedvideo', 'inlinequeryresultcachedvoice', 'inlinequeryresultcachedaudio',
    /*'inputmessagecontent',*/ 'inputtextmessagecontent', 'inputlocationmessagecontent', 'inputvenuemessagecontent',
    'inputcontactmessagecontent', 'choseninlineresult',
    // Payments
    'labeledprice', 'invoice', 'shippingaddress', 'orderinfo', 'shippingoption', 'successfulpayment', 'shippingquery',
    'precheckoutquery',
    // Games
    'game', 'animation', /*'callbackgame',*/ 'gamehighscore',
];
const methods = [
    // Getting updates
    'getupdates', 'setwebhook', 'deletewebhook', 'getwebhookinfo',
    // Available methods
    'getme', 'sendmessage', /*'formatting-options',*/ 'forwardmessage', 'sendphoto', 'sendaudio', 'senddocument',
    'sendvideo', 'sendvoice', 'sendvideonote', 'sendmediagroup', 'sendlocation', 'editmessagelivelocation',
    'stopmessagelivelocation', 'sendvenue', 'sendcontact', 'sendchataction', 'getuserprofilephotos', 'getfile',
    'kickchatmember', 'unbanchatmember', 'restrictchatmember', 'promotechatmember', 'exportchatinvitelink',
    'setchatphoto', 'deletechatphoto', 'setchattitle', 'setchatdescription', 'pinchatmessage', 'unpinchatmessage',
    'leavechat', 'getchat', 'getchatadministrators', 'getchatmemberscount', 'getchatmember', 'setchatstickerset',
    'deletechatstickerset', 'answercallbackquery',
    // Updating messages
     'editmessagetext', 'editmessagecaption', 'editmessagereplymarkup', 'deletemessage',
    // Stickers
    'sendsticker', 'getstickerset', 'uploadstickerfile', 'createnewstickerset', 'addstickertoset',
    'setstickerpositioninset', 'deletestickerfromset',
    // Inline mode
    'answerinlinequery',
    // Payments
    'sendinvoice', 'answershippingquery', 'answerprecheckoutquery',
    // Games
    'sendgame', 'setgamescore', 'getgamehighscores'
];
const dataTypeMapping = {
    Integer: 'int',
    Boolean: 'bool',
    String: 'string',
    Float: 'float',
};
const classTemplate = `<?php

namespace TelegramBot\\types;

/**
 * :DESC:
 */
class :DATATYPE:
{:FIELDS:
}`;
const fieldTemplate = `
    /**
     * @var :TYPE: :DESC:
     */
    public $:FIELD:;`;
const interfaceTemplate = `<?php

namespace TelegramBot;

/**
 * :DESC:
 */
interface TelegramApiInterface
{:METHODS:
}`;
const prototypeTemplate = `
    /**
     * :DESC:
     * :PARAMSDOC::OPTPARAMSDOC:
     */
    :PROTOTYPE:
`;
const toCamelCase = str => str.replace(/[-_]([a-z])/g, g => g[1].toUpperCase());
const convertDataType = datatypes => {
    datatypes = datatypes.split(' or ');
    for (let idx in  datatypes) {
        const datatype = datatypes[idx];

        // TODO: 'Float number'
        if (datatype.startsWith('Array of ')) {
            let realDt = datatype.substr('Array of '.length);
            if (realDt in dataTypeMapping)
                datatypes[idx] = dataTypeMapping[realDt] + '[]';
            else
                datatypes[idx] = realDt + '[]';

            continue;
        }
        if (datatype in dataTypeMapping)
            datatypes[idx] = dataTypeMapping[datatype]
    }

    return datatypes.join('|');
}

for (let type of types) {
    let fields = [];

    const heading = jQuery('h4 > a#' + type).parent();
    const description = heading.nextAll('p').first();
    const dataTable = heading.nextUntil('h4', 'table').first();

    dataTable.find('tr').slice(1).each((i, tr) => {
        let [field, type, description] = jQuery(tr).find('td').map((i, el) => jQuery(el).text()).toArray();
        field = toCamelCase(field);
        type = convertDataType(type);
        description = description.replace(/[‘’]/g, "'");

        fields.push(fieldTemplate
            .replace(':TYPE:', type)
            .replace(':DESC:', description)
            .replace(':FIELD:', field));
    });

    console.log(classTemplate
        .replace(':DESC:', description.text())
        .replace(':DATATYPE:', heading.text())
        .replace(':FIELDS:', fields.join('\n')));
}

let prototypes = [];
for (let method of methods) {
    const heading = jQuery('h4 > a#' + method).parent();
    const description = heading.nextAll('p').first();
    const dataTable = heading.nextUntil('h4', 'table').first();
    const params = [];
    const optParams = [];

    dataTable.find('tr').slice(1).each((i, tr) => {
        let [param, type, required, pDescription] = jQuery(tr).find('td').map((i, el) => jQuery(el).text()).toArray();
        let camelParam = toCamelCase(param);
        type = convertDataType(type);
        required = required === 'Yes';
        pDescription = pDescription.replace(/[‘’]/g, "'");

        if (required) {
            const docString = '     * @param :TYPE: $:PARAM: :DESC:'
                .replace(':TYPE:', type)
                .replace(':PARAM:', camelParam)
                .replace(':DESC:', pDescription);

            params.push([camelParam, type, pDescription, docString]);
        } else {
            const docString = '     * - :PARAM: (:TYPE:):\n     *   :DESC:'
                .replace(':PARAM:', param)
                .replace(':TYPE:', type)
                .replace(':DESC:', pDescription);
            optParams.push([param, type, pDescription, docString]);
        }
    });

    prototypes.push(prototypeTemplate
        .replace(':DESC:', description.text())
        .replace(':PARAMSDOC:', params.length > 0 ? '\n' + params.map(p => p[3]).join('\n') : '')
        .replace(':OPTPARAMSDOC:', optParams.length > 0 ? '\n     * @param array $params Optional params:\n' + optParams.map(p => p[3]).join('\n') : '')
        .replace(':PROTOTYPE:', 'public function ' + heading.text() + '('
            + params.map(p => '$' + p[0]).join(', ')
            + (params.length > 0 && optParams.length > 0 ? ', ' : '')
            + (optParams.length > 0 ? '$params = []' : '') + ');'));

}

$('<pre></pre>')
    .text(interfaceTemplate
        .replace(':DESC:', 'Telegram Bot API')
        .replace(':METHODS:', prototypes.join('')))
    .appendTo(jQuery('#gamehighscore'));
