import {
	getPot,
	getBurnedTokens,
} from '@/modules/1uck';

import { toHumanReadable } from '@/modules/utils';

async function updatePot()
{
	let value = await getPot();
    $('section.pot-details .1uck-pot').html(toHumanReadable(value));

    setTimeout(updatePot, 15 * 1000);
}

updatePot();