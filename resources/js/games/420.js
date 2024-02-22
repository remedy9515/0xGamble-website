import * as wallet from '@/modules/wallet.js';

import {
    getAccount,
    watchAccount,
    getContract,
    prepareWriteContract,
    writeContract,
    waitForTransaction,
} from '@wagmi/core'

import {
	luckyNumber,
	toHumanReadable,
	toSeparator,
	toTwoDecimals,
} from '@/modules/utils'

import {
	contractAddress,
	contractABI,
	getPot,
} from '@/modules/1uck';

import {
	parseUnits,
	formatUnits,
	decodeEventLog,
} from 'viem'

let minLimit = 1;
let maxLimit = 123456789;

var rangeInputId = '#range-input';
var rangeInput = $(rangeInputId);

var rangeSubmitId = '#range-submit-button';
var rangeSubmit = $(rangeSubmitId);

var rangeFormId = '#form-1ucky-number';
var rangeForm = $(rangeFormId);

var randomNumberBlockId = '#random-number-block';
var randomNumberBlock = $(randomNumberBlockId);

var luckyNumberBlockId = '#1ucky-number-block';
var luckyNumberBlock = $(luckyNumberBlockId);

var luckyNumberInputId = '#1ucky-number';
var luckyNumberInput = $(luckyNumberInputId);

var playSubmitId = '#play-submit-button';
var playSubmit = $(playSubmitId);

var randomNumberMessageId = '#random-number-message';
var randomNumberMessage = $(randomNumberMessageId);

var randomNumberMessageSmallId = '#random-number-message-small';
var randomNumberMessageSmall = $(randomNumberMessageSmallId);

var gameLoaderId = '#game-loader';
var gameLoader = $(gameLoaderId);

var error1uckyNumberId = '#error-1ucky-number';
var error1uckyNumber = $(error1uckyNumberId);

const unwatch = watchAccount(account => {
	updateRangeInput(account);
});
updateRangeInput(wallet.getAccountData().account);

async function updatePot()
{
	let value = await getPot();
    $('.potamount span').html(toHumanReadable(value));

    setTimeout(updatePot, 15 * 1000);
}
updatePot();

rangeInput.on('keyup change input', function() {
	validateInputRange();
});

rangeSubmit.on('click', function() {
	generateLuckyNumber();
});

rangeForm.on('submit', function(e) {
	e.preventDefault();
	generateLuckyNumber();
});

playSubmit.on('click', function() {
	playLuckyNumber();
});

// ensures proper limits are in place for the range input based on available balance
async function updateRangeInput(account) {
	lockRangeNumber();
	$(rangeSubmitId+' .indicator').html('LOADING...');

	let balance = wallet.getAccountData().balance;

	if (account !== undefined && account.isConnected) {
		rangeInput.attr('min', minLimit);
		rangeInput.attr('max', balance);
	}
	else {
		rangeInput.attr('min', minLimit);
		rangeInput.attr('max', maxLimit);
	}

	validateInputRange();

	$(rangeSubmitId+' .indicator').html('GENERATE 1UCKY NUMBER');
	unlockRangeNumber()
}

// validates that the range input stays between the set limits
function validateInputRange() {
	var min = parseFloat(rangeInput.attr('min')) || minLimit;
	var max = parseFloat(rangeInput.attr('max')) || maxLimit;

	var currentValue = parseFloat(rangeInput.val());
	var newValue = currentValue

	if (currentValue < min) {
		newValue = min.toFixed(2);
	} else if (currentValue > max) {
		newValue = max.toFixed(2);
	}

	rangeInput.val(newValue);
}

// generates the final number to use as transaction value
async function generateLuckyNumber() {
	if (rangeInput.prop('disabled')) {
		return;
	}

	resetGameState();

	await updateRangeInput(wallet.getAccountData().account);
	const range = parseFloat(rangeInput.val());
	if (isNaN(range) || range < 1) {
		luckyNumberInput.val(0);
		randomNumberMessage.html('Please enter a valid range.');
		disablePlayState();
		return;
	}

	unlockPlayNumber();
	var number = luckyNumber(range);
	luckyNumberInput.val(number);
	randomNumberMessage.html(number);

	enablePlayState();
}

async function playLuckyNumber() {
	let account = getAccount();

	if (!account.isConnected) {
		endGameWithError("Connect your wallet and try again!");
		await wallet.connectWallet();
	}
	else {
		if (luckyNumberInput.prop('disabled')) {
			return;
		}

		let hash = false;
		let data = false;
		
		startGame();

		// send transaction to self
		try	{
			hash = await sendTransactionToSelf(luckyNumberInput.val());
		}
		catch(error) {
			console.error(error)
			handleTransactionToSelfError(error);
			return;
		}

		// get transaction data
		try	{
			data = await getTransactionData(hash);
		}
		catch(error) {
			handleGetTransactionDataError(error);
			return;
		}

		processTransactionResults(data);
	}
}

async function sendTransactionToSelf(tokenAmount) {
	// const value = web3.utils.toWei(tokenAmount, 'ether');
	const value = parseUnits(tokenAmount, 18);
	let account = getAccount();

	const { request } = await prepareWriteContract({
		address: contractAddress,
		abi: contractABI,
		functionName: 'transfer',
		args: [
			account.address,
			value
			],
		account: account.address,
	});

	const { hash } = await writeContract(request);

	return hash;
}

async function getTransactionData(hash) {
	const data = await waitForTransaction({
		confirmations: 1,
		hash: hash,
	});

	return data;
}

// update game states
function lockRangeNumber() {
	rangeInput.prop("disabled", true);
	rangeSubmit.css('cursor', 'not-allowed');
}
function unlockRangeNumber() {
	rangeInput.prop("disabled", false);
	rangeSubmit.css('cursor', 'pointer');
}

function enablePlayState() {
	luckyNumberBlock.show();
}
function disablePlayState() {
	luckyNumberBlock.hide();
}

function lockPlayNumber() {
	luckyNumberInput.prop("disabled", true);
	playSubmit.css('cursor', 'not-allowed');
}
function unlockPlayNumber() {
	luckyNumberInput.prop("disabled", false);
	playSubmit.css('cursor', 'pointer');
}

function lockGameState() {
	lockRangeNumber();
	lockPlayNumber();
}
function unlockGameState() {
	unlockRangeNumber();
	unlockPlayNumber();
}

function resetGameState() {
	updateRangeInput(wallet.account);
	gameLoader.hide();
	error1uckyNumber.hide();
	$(playSubmitId+' .indicator').html('SEND 1UCKY NUMBER');
	randomNumberMessageSmall.html('').hide();
}

function startGame() {
	lockGameState();

	gameLoader.show();
	error1uckyNumber.hide();
	$(playSubmitId+' .indicator').html('GOOD 1UCK!');
}
function endGame() {
	resetGameState();
	unlockGameState();
	updatePot();
}

// process results
function processTransactionResults(data) {
	let result = false;

	if (data.logs === undefined) {
		return result;
	}

	data.logs.forEach(function (log) {

		let decodedLog = decodeEventLog({
			abi: contractABI,
			data: log.data,
			topics: log.topics,
		});

		switch (log.topics[0]) {
			// PotTransferredToHouse
			case '0x7c501ab2a5fadb4e199cf39b6f0e2737de3142ea33bd67e788397e1deab01552':
				result = {
					event: 'PotTransferredToHouse',
					address: decodedLog.args.houseAddress,
					value: formatUnits(decodedLog.args.amount, 18),
				};
				break;
			// PotTransferredToSender
			case '0x4ecd1429b23fed85267ae69909f495ad79bbccfb60b4263a29db9d36201d856d':
				result = {
					event: 'PotTransferredToSender',
					address: decodedLog.args.houseAddress,
					value: formatUnits(decodedLog.args.amount, 18),
				};
				break;
			// PotBurned
			case '0x967209b0d71500a405da13d7695bb47b725d200797e9097864ce31117c4023c7':
				result = {
					event: 'PotBurned',
					value: formatUnits(decodedLog.args.amount, 18),
				};
				break;
			default:
				break;
		}
	});

	if (result === false) {
		handleNoResult();
		return;
	}

	switch (result.event) {
		case 'PotTransferredToHouse':
		case 'PotTransferredToSender':
		case 'PotBurned':
			// call the handler function
			eval('handle'+result.event)(result);
			break;
		default:
			handleNoResult();
			break;
	}
}

// handle results
function handlePotTransferredToHouse(result) {
	let message = 'HOUSE WON! BUMMER...';
	let details = toSeparator(toTwoDecimals(Number(result.value)))+' 1UCK was sent to the house wallet';
	
	endGameWithResults(message, details);
	$(rangeSubmitId+' .indicator').html('PLAY AGAIN?');
}
function handlePotTransferredToSender(result) {
	let message = 'YOU WON! CONGRATULATION!';
	let details = toSeparator(toTwoDecimals(Number(result.value)))+' 1UCK was sent to YOUR wallet';
	
	endGameWithResults(message, details);
	$(rangeSubmitId+' .indicator').html('PLAY AGAIN?');
}
function handlePotBurned(result) {
	let message = 'POT BURNED! WE ALL WIN!';
	let details = toSeparator(toTwoDecimals(Number(result.value)))+' 1UCK was burned';
	
	endGameWithResults(message, details);
	$(rangeSubmitId+' .indicator').html('PLAY AGAIN?');
}
function handleNoResult() {
	let message = 'TRY AGAIN...';
	let details = 'Test your 1UCK with another round';
	
	endGameWithResults(message, details);
	$(rangeSubmitId+' .indicator').html('PLAY AGAIN?');
}
function endGameWithResults(message, details) {
	endGame();
	lockPlayNumber();
	disablePlayState();

	luckyNumberInput.val('');
	randomNumberMessage.html(message);
	randomNumberMessageSmall.html(details).show();
}

// handle errors
function handleTransactionToSelfError(error) {
	endGameWithError('Transaction not submitted. Try again?');
}
function handleGetTransactionDataError(error) {
	endGameWithError("Couldn't get transaction results. Sorry!");
}
function endGameWithError(message) {
	console.error(message);

	endGame();
	
	error1uckyNumber.html(message).show();
	$(playSubmitId+' .indicator').html('TRY AGAIN');
}