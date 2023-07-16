import {
    watchAccount,
} from '@wagmi/core'

import {
	connectWallet,
	disconnectWallet,
	getAccountData,
} from '@/modules/wallet';

import {
	toSeparator,
	toTwoDecimals,
	eliptic,
} from '@/modules/utils';

let walletButton = $('.wallet-container .wallet-button .is-wallet-connect');
let walletDisconnected = $('.wallet-container .wallet-button.is-not-connected');
let walletConnected = $('.wallet-container .wallet-button.is-connected');
let walletDisconnectButton = $('.wallet-container .is-wallet-disconnect');
let tokenBalance = $('.wallet-container .balance-value');
let walletAddress = $('.wallet-container .wallet-address');

walletButton.on('click', function(e) {
	e.preventDefault();

	connectWallet();
});

walletDisconnectButton.on('click', async function(e) {
	e.preventDefault();

	await disconnectWallet();
});

async function updateWallet()
{
	let data = await getAccountData();

	if (data.account.isConnected) {
		walletDisconnected.hide();
		walletConnected.show();
		walletAddress.html(eliptic(data.account.address));
	} else {
		walletConnected.hide();
		walletDisconnected.show();
		walletAddress.html('CONNECTED');
	}

    tokenBalance.html(toSeparator(toTwoDecimals(Number(data.balance))));

    setTimeout(updateWallet, 15 * 1000);
}

const unwatch = watchAccount((account) => updateWallet())