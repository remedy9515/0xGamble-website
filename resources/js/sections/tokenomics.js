import {
	getTotalSupply,
	getBurnedTokens,
} from '@/modules/1uck';

import { toHumanReadable } from '@/modules/utils';

async function updateTotalSupply()
{
	let value = await getTotalSupply();
    $('section.tokenomics .1uck-totalSupply').html(toHumanReadable(value));

    setTimeout(updateTotalSupply, 15 * 1000);
}

async function updateBurnedTokens()
{
	let value = await getBurnedTokens();
    $('section.tokenomics .1uck-burnedTokens').html(toHumanReadable(value));

    setTimeout(updateBurnedTokens, 15 * 1000);
}

updateTotalSupply();
updateBurnedTokens();