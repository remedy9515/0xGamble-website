import {
    getAccount,
    watchAccount,
    fetchBalance,
    disconnect,
} from '@wagmi/core'

import {
	contractAddress
} from '@/modules/1uck'

let accountData = {};
const unwatch = watchAccount((account) => updateAccountData())

function connectWallet() {
	web3modal.openModal();
}

async function disconnectWallet() {
	await disconnect();
}

async function getAccountData() {
	await updateAccountData();
	return accountData;
}

async function updateAccountData() {
	let account = getAccount();
	let balance = 0;

	if (account !== undefined && account.isConnected) {
		let tokenBalance = await fetchBalance({
			address: account.address,
			token: contractAddress
		});

		balance = tokenBalance.formatted;
	}
	else {
		balance = 0;
	}

	accountData = {
		account: account,
		balance: balance
	}
}

export {
	connectWallet,
	disconnectWallet,
	getAccountData,
}